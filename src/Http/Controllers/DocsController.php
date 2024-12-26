<?php

namespace Birhanu\Laradocs\Http\Controllers;

use Birhanu\Laradocs\LaraDocs;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;

class DocsController extends Controller
{
    protected $laraDocs;

    public function __construct(LaraDocs $laraDocs)
    {
        $this->laraDocs = $laraDocs;
    }

    /**
     * Display the generated HTML API documentation.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHtmlDocs()
    {
        $this->laraDocs->generate();

        $htmlDocsPath = storage_path('app/laradocs/api-docs.html');
        if (file_exists($htmlDocsPath)) {
            return response()->file($htmlDocsPath);
        }

        return response()->json(['message' => 'HTML documentation not found.'], 404);
    }

    /**
     * Display the generated JSON API documentation.
     *
     * @return \Illuminate\Http\Response
     */
    public function showJsonDocs()
    {
        $this->laraDocs->generate();

        $jsonDocsPath = storage_path('app/laradocs/api-docs.json');
        if (file_exists($jsonDocsPath)) {
            return response()->file($jsonDocsPath);
        }

        return response()->json(['message' => 'JSON documentation not found.'], 404);
    }
}