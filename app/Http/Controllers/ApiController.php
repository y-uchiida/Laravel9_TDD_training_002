<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Customer の一覧を返す
     *
     * @return JsonResponse
     */
    public function getCustomers(): JsonResponse
    {
        $customers = Customer::query()->select(['id', 'name'])->get();
        return response()->json($customers);
    }
}