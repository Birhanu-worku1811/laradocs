<?php

namespace Birhanu\Laradocs\Http\Controllers;

use Birhanu\Laradocs\LaraDocs;
use Illuminate\Routing\Controller; // Import the base Controller class
use Illuminate\Http\Response;

class DocsController extends Controller
{
    protected $laraDocs;

    public function __construct(LaraDocs $laraDocs)
    {
        $this->laraDocs = $laraDocs;
    }

    /**
     * Display the generated API documentation.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->laraDocs->generate();

        $docsPath = storage_path('app/laradocs/api-docs.' . config('laradocs.output_format'));
        if (file_exists($docsPath)) {
            return response()->file($docsPath);
        }

        return response()->json(['message' => 'Documentation not found.'], 404);
    }
}