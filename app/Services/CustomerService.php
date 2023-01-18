<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

class CustomerService
{
    /**
     * Customer の一覧を返す
     *
     * @return Collection
     */
    public function getCustomers(): Collection
    {
        return Customer::query()->select(['id', 'name'])->get();
    }

    /**
     * customers にレコードを追加する
     *
     * @param string $name
     * @return Customer
     */
    public function addCustomer(string $name): Customer
    {
        $customer = new Customer();
        $customer->name = $name;
        $customer->save();
        return $customer;
    }
}