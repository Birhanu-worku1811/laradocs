<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API Documentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h3 {
            text-align: center;
        }
        .route {
            margin-bottom: 20px;
        }
        .route-method {
            font-weight: bold;
        }
        .route-uri {
            color: #007BFF;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>{{ $docs['info']['title'] }}</h1>
    <p>{{ $docs['info']['description'] }}</p>
    <h2>Version: {{ $docs['info']['version'] }}</h2>
    <h3>Routes</h3>
    @foreach ($docs['routes'] as $route)
        <div class="route">
            <div class="route-method">{{ $route['method'] }}</div>
            <div class="route-uri">{{ $route['uri'] }}</div>
            <div class="route-action">{{ $route['action'] }}</div>
        </div>
    @endforeach
</div>
</body>
</html>