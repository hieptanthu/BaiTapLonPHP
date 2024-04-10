<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class datatesst extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        
        $response = $this->get('/categories');

        $response->assertStatus(200);
    }
}
