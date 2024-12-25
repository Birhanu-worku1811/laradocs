<?php

namespace Birhanu\Laradocs;

use Illuminate\Support\Facades\Route;

class LaraDocs
{
    protected $outputPath;
    protected $outputFormat;

    public function __construct()
    {
        $this->outputPath = config('laradocs.output_path', storage_path('app/laradocs'));
        $this->outputFormat = config('laradocs.output_format', 'json');
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
            'info' => 'LaraDocs API Documentation',
            'routes' => $this->getRoutes()
        ];

        file_put_contents($this->outputPath . "/api-docs." . $this->outputFormat, json_encode($docs, JSON_PRETTY_PRINT));
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
                'method' => implode('|', $route->methods()),
                'uri' => $route->uri(),
                'action' => $route->getActionName(),
            ];
        }
        return $routes;
    }
}