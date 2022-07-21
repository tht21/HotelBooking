<?php

namespace App\Repositories\Eloquent;

use App\Models\Customers;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\CustomerInterface;
use Illuminate\Support\Facades\Log;

class CustomerRepository extends EloquentRepository implements CustomerInterface
{
    public function getModel()
    {
        return Customers::class;
    }
    public function getAll($request)
    {
        $customers = $this->model->select('*');
        if (isset($request->name) && $request->name) {
            $name = $request->name;
            $customers->where('name', 'LIKE', '%' . $name . '%');
        }
        return $customers->orderBy('id', 'desc')->paginate(10);
    }

    public function destroy($id)
    {
        $customers = $this->model->find($id);
        try {
            $customers->delete();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $customers;
    }

    public function create($request)
    {
        $customers = $this->model;
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->phone = $request->phone;
        $customers->address = $request->address;
        $customers->cmnd = $request->cmnd;
        try {
            $customers->save();

            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $customers;
    }


    public function update($request, $id)
    {
        $customers = $this->model->find($id);
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->phone = $request->phone;
        $customers->address = $request->address;
        $customers->cmnd = $request->cmnd;
        try {
            $customers->save();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $customers;
    }

    public function trashedItems()
    {
        $query = $this->model->onlyTrashed();
        $query->orderBy('id', 'desc');
        $customers = $query->paginate(10);
        return $customers;
    }

    public function restore($id)
    {
        $customer = $this->model->withTrashed()->find($id);
        try {
            $customer->restore();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $customer;

    }

    public function force_destroy($id)
    {
        
        try {
            $customer = $this->model->withTrashed()->find($id);
     
            $customer->forceDelete();
           
            return $customer;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
       
    }
}
