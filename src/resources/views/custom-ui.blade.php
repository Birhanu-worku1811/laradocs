<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API Documentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #32329f;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
        }
        .route {
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .route-uri {
            color: #007BFF;
            font-size: 1.2em;
            margin-bottom: 5px;
        }
        .route-parameters, .route-description, .route-return {
            margin-left: 20px;
            margin-bottom: 10px;
        }
        .route-parameters ul {
            list-style-type: none;
            padding: 0;
        }
        .route-parameters li {
            background: #f9f9f9;
            padding: 5px;
            margin-bottom: 5px;
            border: 1px solid #ddd;
        }
        .route-parameters strong, .route-description strong, .route-return strong {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>{{ $docs['info']['title'] }}</h1>
    <p>{{ $docs['info']['description'] }}</p>
    <h2>Version: {{ $docs['info']['version'] }}</h2>
</div>
<div class="container">
    <h3>Routes</h3>
    @foreach ($docs['routes'] as $route)
        <div class="route">
            <div class="route-uri">{{ $route['uri'] }}</div>
            <div class="route-parameters">
                <strong>Parameters:</strong>
                <ul>
                    @foreach ($route['parameters'] as $param => $description)
                        <li>{{ $param }}: {{ $description }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="route-description">
                <strong>Description:</strong>
                <p>{{ $route['description'] }}</p>
            </div>
            <div class="route-return">
                <strong>Return:</strong>
                <p>{{ $route['return'] }}</p>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>