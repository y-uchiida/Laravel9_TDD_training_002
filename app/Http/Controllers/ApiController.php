<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    /**
     * Customer の一覧を返す
     *
     * @return JsonResponse
     */
    public function getCustomers(CustomerService $customerService): JsonResponse
    {
        $customers = $customerService->getCustomers();
        return response()->json($customers);
    }

    /**
     * リクエストされたデータでcustomers にレコードを追加する
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function storeCustomer(Request $request): JsonResponse
    {
        $this->validate($request, [
            'name' => ['required', 'min:1'],
        ]);
        $customer = new Customer();
        $customer->name = $request->json('name');
        $customer->save();
        return response()->json(['id' => $customer->id, 'name' => $customer->name], 200);
    }

    public function getCustomer()
    {
    }
    public function updateCustomer()
    {
    }
    public function deleteCustomer()
    {
    }
    public function getReports()
    {
    }
    public function storeReport()
    {
    }
    public function getReport()
    {
    }
    public function updateReport()
    {
    }
    public function deleteReport()
    {
    }
}