<?php

namespace Tests\Feature;
use App\Models\category;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function sss()
    {
        // Gửi yêu cầu HTTP GET tới URL đã định tuyến
        $categoryInstance = new Category();
        $categoryInstance->onCategory();
        return $categoryInstance;
    }
}
