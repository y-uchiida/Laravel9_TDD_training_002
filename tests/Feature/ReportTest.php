<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportTest extends TestCase
{
    /** @test */
    public function api_customersにGETメソッドでアクセスできる()
    {
        // テスト対象の処理を実行
        $response = $this->get('api/customers');

        // 検証
        $response->assertOk();
    }
}