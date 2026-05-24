<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_application_boots(): void
    {
        $this->assertNotNull($this->app);
        $this->assertTrue($this->app->isBooted());
    }
}
