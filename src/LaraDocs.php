<?php

namespace Birhanu\Laradocs;

use Illuminate\Support\Facades\Route;

class LaraDocs
{
    protected $outputPath;
    protected $outputFormat;
    protected $htmlOutput;

    public function __construct()
    {
        $this->outputPath = config('laradocs.output_path', storage_path('app/laradocs'));
        $this->outputFormat = config('laradocs.output_format', 'json');
        $this->htmlOutput = config('laradocs.html_output', false);
    }

    /**
     * Generate the API documentation
     *
     * @return void
     */
    public function generate()
    {
        // Ensure the output directory exists
        if (!is_dir($this->outputPath)) {
            mkdir($this->outputPath, 0755, true);
        }

        $docs = [
            'info' => [
                'title' => 'LaraDocs API Documentation',
                'description' => 'This is the API documentation for the LaraDocs package.',
                'version' => '1.0.0',
            ],
            'routes' => $this->getRoutes()
        ];

        file_put_contents($this->outputPath . "/api-docs." . $this->outputFormat, json_encode($docs, JSON_PRETTY_PRINT));

        if ($this->htmlOutput) {
            $this->generateHtml($docs);
        }
    }

    /**
     * Generate the HTML documentation
     *
     * @param array $docs
     * @return void
     */
    protected function generateHtml(array $docs)
    {
        $htmlContent = view('laradocs::custom-ui', ['docs' => $docs])->render();
        file_put_contents($this->outputPath . "/api-docs.html", $htmlContent);
    }

    /**
     * Get all routes in the Laravel app
     *
     * @return array
     */
    protected function getRoutes()
    {
        $routes = [];
        foreach (Route::getRoutes() as $route) {
            $routes[] = [
                'uri' => $route->uri(),
                'methods' => implode('|', $route->methods()),
                'parameters' => $this->getRouteParameters($route),
                'description' => $this->getRouteDescription($route),
                'return' => $this->getRouteReturn($route),
            ];
        }
        return $routes;
    }

    protected function getRouteParameters($route)
    {
        // Example implementation, you may need to customize this based on your app
        return [
            'id' => 'The ID of the resource',
            'name' => 'The name of the resource',
        ];
    }

    protected function getRouteDescription($route)
    {
        // Example implementation, you may need to customize this based on your app
        return 'This route does something important.';
    }

    protected function getRouteReturn($route)
    {
        // Example implementation, you may need to customize this based on your app
        return 'Returns a JSON object with the resource details.';
    }
}