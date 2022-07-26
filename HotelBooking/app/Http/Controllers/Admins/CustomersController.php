<?php

namespace App\Http\Controllers\Admins;

use App\Http\Requests\StoreCustomersRequest;
use App\Models\Customers;
use App\Services\Interfaces\CustomerServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $customerService;
    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->customerService = $customerService;
    }


    public function index(Request $request)
    {
        // dd(trans('translation.hello'));
        $customers = $this->customerService->getAll($request);
        $params = [
            "customers" => $customers,
        ];
        return view('admin.customers.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomersRequest $request)
    {
        try {
            $customer = $this->customerService->create($request);
            return redirect()->route('customers.index')->with('success', ' Thêm khách hàng ' . $request->name . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('customers.index')->with('error', ' Thêm khách hàng ' . $request->name . ' không thành công ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customers,$id)
    {
        $customer = $this->customerService->findById($id);
        $params = [
            'customer' => $customer,
        ];
        return view('admin.customers.edit',$params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomersRequest  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        try {
            $this->customerService->update($request, $id);

            return redirect()->route('customers.index')->with('success', 'Sửa thông tin khách hàng' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('customers.index')->with('error', 'Sửa thông tin khách hàng' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $customer = $this->customerService->destroy($id);
            return redirect()->route('customers.index')->with('success', ' Xóa thông tin khách hàng thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('customers.index')->with('error', 'Xóa thông tin khách hàng không thành công');
        }
    }

    public function trashedItems()
    {
        // dd($request);
        $customers = $this->customerService->trashedItems();
        // dd($items);
        $params = [
            'customers' => $customers,
        ];
        return view('admin.customers.trash', $params);
    }

    public function restore($id)
    {
        try {
            $this->customerService->restore($id);
            return redirect()->route('customers.trash')->with('success', 'Khôi phục thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('customers.trash')->with('success', 'Khôi phục thành công');
        }
    }

    public function force_destroy($id)
    {
        try {
            $customer = $this->customerService->force_destroy($id);

            return redirect()->route('customers.trash')->with('success', 'Xóa' . ' ' . $customer->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('customers.trash')->with('error', 'Xóa' . ' ' . $customer->name . ' ' .  'không thành công');
        }
    }
}
