<?php

return [
    'enabled' => true,
    'api_prefix' => 'api-docs',
    'default_format' => 'json', // Or 'html'
    'output_format' => 'json', // Output format: json or yaml
    'output_path' => storage_path('app/laradocs'), // Path to save the generated docs
];