<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory()->count(2)->create()->each(function ($customer) {
            // Customer factory が作成したデータそれぞれに対して実行
            Report::factory()->count(2)->make()->each(function ($report) use ($customer) {
                // use で外側のスコープの $customer をうけとり、
                // $customer のhasMany リレーション先として$report を設定し保存
                $customer->reports()->save($report);
            });
        });
    }
}