<?php
use Birhanu\Laradocs\Http\Controllers\DocsController;

Route::get('api-docs', [DocsController::class, 'index']);
