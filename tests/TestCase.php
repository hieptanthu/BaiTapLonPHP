<?php

namespace Tests;

use App\Models\category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function sss()
    {
        // Gửi yêu cầu HTTP GET tới URL đã định tuyến
        $categoryInstance = new Category();
        $categoryInstance->onCategory();
        return $categoryInstance;
    }
}
