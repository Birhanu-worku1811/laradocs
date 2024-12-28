# LaraDocs # [Published](https://packagist.org/packages/birhanu/laradocs)
# Team Members
- Ararsa Derese ETS0152/13
- Birhanu Worku ETS0279/13
- Biruk Mesfin ETS0290/13
- Bisrat Kebere ETS0306/13
- Biyaol Mesay ETS0309/13

LaraDocs is a Laravel package that generates API documentation for your Laravel application. It provides both JSON and HTML formats for the documentation, making it easy to integrate and use.

## Features

- Automatically generates API documentation for your Laravel application.
- Provides both JSON and HTML formats for the documentation.
- Customizable HTML output with a modern, attractive design.
- Easy to set up and use.

## Installation

1. **Install the package via Composer:**

    ```bash
    composer require birhanu/laradocs
    ```

2. **Publish the configuration and view files:**

    ```bash
    php artisan vendor:publish --provider="Birhanu\Laradocs\LaradocsServiceProvider" --tag="config"
    php artisan vendor:publish --provider="Birhanu\Laradocs\LaradocsServiceProvider" --tag="views"
    ```

3. **Add the service provider to your `config/app.php` file (if not using auto-discovery):**

    ```php
    'providers' => [
        // Other service providers...
        Birhanu\Laradocs\LaradocsServiceProvider::class,
    ],
    ```

## Configuration

The configuration file `config/laradocs.php` allows you to customize the behavior of the package. Here are some of the key options:

- `enabled`: Enable or disable the package.
- `api_prefix`: The prefix for the API documentation routes.
- `default_format`: The default format for the documentation (`json` or `html`).
- `output_format`: The format for the generated documentation files (`json` or `yaml`).
- `output_path`: The path where the generated documentation files will be saved.
- `html_output`: Enable or disable HTML output.

## Usage
**Access the documentation:**

    - JSON format: `http://your-app-url/api-docs/json`
    - HTML format: `http://your-app-url/api-docs`

## Customization

You can customize the HTML output by editing the Blade view file located at `resources/views/vendor/laradocs/custom-ui.blade.php`.

## Testing

To run the tests, use the following command:

```bash
phpunit
```

## License

LaraDocs is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
