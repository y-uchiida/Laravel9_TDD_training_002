<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Customer;
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
    public function api_customersが返すjsonが仕様通りのプロパティを持っている()
    {
        $response = $this->get('api/customers');
        $expectedKeys = ['id', 'name'];
        $customer = $response->json()[0];
        $this->assertSame($expectedKeys, array_keys($customer));
    }

    /** @test */
    public function api_customersが返すjsonに含まれるデータの件数がデータベースに登録されているデータの件数と一致する()
    {
        $record_count = Customer::count();
        $response = $this->get('api/customers');
        $response_count = count($response->json());
        $this->assertSame($record_count, $response_count);
    }

    /** @test */
    public function api_customersにPOSTメソッドでアクセスできる()
    {
        $response = $this->post('api/customers');
        $response->assertOk();
    }

    /** @test */
    public function api_customersへのPOSTリクエストで顧客データが追加できる()
    {
        $customerName = 'new customer name';
        $data = ['name' => $customerName];
        $this->postJson('api/customers', $data);
        $this->assertDatabaseHas('customers', $data);
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