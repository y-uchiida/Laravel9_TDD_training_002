<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function getCustomers()
    {
        return Customer::query()->select(['id', 'name'])->get();
    }
}