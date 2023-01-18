<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportTest extends TestCase
{
    // テスト実行時にデータベースの初期化を行う
    use RefreshDatabase;

    // テスト実行時のセットアップを行う
    // 処理内容を記述する前に、必ず親クラスのsetUp() を呼び出しておくこと
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'TestDataSeeder']);
    }

    /** @test */
    public function api_customersにGETメソッドでアクセスできる()
    {
        // テスト対象の処理を実行
        $response = $this->get('api/customers');

        // 検証
        $response->assertOk();
    }

    /** @test */
    public function api_customersへGETリクエストするとJSONが返却される()
    {
        $response = $this->get('api/customers');
        // assertJson の引数を空にしておけば、Jsonかどうかだけ判定できる
        $response->assertJson([]);
    }

    /** @test */
    public function api_customersにPOSTメソッドでアクセスできる()
    {
        $response = $this->post('api/customers');
        $response->assertOk();
    }

    /** @test */
    public function api_customers_customer_idにGETメソッドでアクセスできる()
    {
        $response = $this->get('api/customers/1');
        $response->assertOk();
    }

    /** @test */
    public function api_customers_customer_idにPUTメソッドでアクセスできる()
    {
        $response = $this->put('api/customers/1');
        $response->assertOk();
    }

    /** @test */
    public function api_customers_customer_idにDELETEメソッドでアクセスできる()
    {
        $response = $this->delete('api/customers/1');
        $response->assertOk();
    }

    /** @test */
    public function api_reportsにGETメソッドでアクセスできる()
    {
        $response = $this->get('api/reports');
        $response->assertOk();
    }

    /** @test */
    public function api_reportsにPOSTメソッドでアクセスできる()
    {
        $response = $this->post('api/reports');
        $response->assertOk();
    }

    /** @test */
    public function api_reports_report_idにGETメソッドでアクセスできる()
    {
        $response = $this->get('api/reports/1');
        $response->assertOk();
    }

    /** @test */
    public function api_reports_report_idにPUTメソッドでアクセスできる()
    {
        $response = $this->put('api/reports/1');
        $response->assertOk();
    }

    /** @test */
    public function api_reports_report_idにDELETEメソッドでアクセスできる()
    {
        $response = $this->delete('api/reports/1');
        $response->assertOk();
    }
}