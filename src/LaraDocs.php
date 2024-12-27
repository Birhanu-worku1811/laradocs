<?php

namespace Birhanu\Laradocs;

use Illuminate\Support\Facades\Route;
use ReflectionClass;
use ReflectionMethod;

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

    public function generate()
    {
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

    protected function generateHtml(array $docs)
    {
        $htmlContent = view('laradocs::custom-ui', ['docs' => $docs])->render();
        file_put_contents($this->outputPath . "/api-docs.html", $htmlContent);
    }

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
        $action = $route->getActionName();
        if (strpos($action, '@') !== false) {
            list($controller, $method) = explode('@', $action);
            $reflection = new ReflectionMethod($controller, $method);
            $docComment = $reflection->getDocComment();
            return $this->parseDocCommentForParameters($docComment);
        }
        return [];
    }

    protected function getRouteDescription($route)
    {
        $action = $route->getActionName();
        if (strpos($action, '@') !== false) {
            list($controller, $method) = explode('@', $action);
            $reflection = new ReflectionMethod($controller, $method);
            $docComment = $reflection->getDocComment();
            return $this->parseDocCommentForDescription($docComment);
        }
        return 'No description available.';
    }

    protected function getRouteReturn($route)
    {
        $action = $route->getActionName();
        if (strpos($action, '@') !== false) {
            list($controller, $method) = explode('@', $action);
            $reflection = new ReflectionMethod($controller, $method);
            $docComment = $reflection->getDocComment();
            return $this->parseDocCommentForReturn($docComment);
        }
        return 'No return value specified.';
    }

    protected function parseDocCommentForParameters($docComment)
    {
        $parameters = [];
        if ($docComment) {
            preg_match_all('/@param\s+([^\s]+)\s+\$([^\s]+)\s+(.*)/', $docComment, $matches, PREG_SET_ORDER);
            foreach ($matches as $match) {
                $parameters[$match[2]] = $match[3];
            }
        }
        return $parameters;
    }

    protected function parseDocCommentForDescription($docComment)
    {
        if ($docComment) {
            preg_match('/\*\s+(.*)/', $docComment, $match);
            if (isset($match[1])) {
                return $match[1];
            }
        }
        return 'No description available.';
    }

    protected function parseDocCommentForReturn($docComment)
    {
        if ($docComment) {
            preg_match('/@return\s+([^\s]+)\s+(.*)/', $docComment, $match);
            if (isset($match[2])) {
                return $match[2];
            }
        }
        return 'No return value specified.';
    }
}