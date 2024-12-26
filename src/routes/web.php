<?php
use Birhanu\Laradocs\Http\Controllers\DocsController;

Route::get('api-docs', [DocsController::class, 'showHtmlDocs']);
Route::get('api-docs/json', [DocsController::class, 'showJsonDocs']);