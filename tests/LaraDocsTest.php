<?php

namespace Birhanu\Laradocs\Tests;

use Birhanu\Laradocs\LaraDocs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LaraDocsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_generates_api_documentation()
    {
        $laraDocs = new LaraDocs();
        $laraDocs->generate();

        $this->assertFileExists(storage_path('app/laradocs/api-docs.json'));
    }
}