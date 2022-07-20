<?php

namespace App\Services;

use App\Repositories\Interfaces\CustomerInterface;
use App\Services\Interfaces\CustomerServiceInterface;

class CustomerService implements CustomerServiceInterface
{
    protected $customerRepository;

    public function __construct(CustomerInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAll($request)
    {
        return $this->customerRepository->getAll($request);
    }
    
    public function findById($id)
    {
        return $this->customerRepository->findById($id);
    }

    public function create($request)
    {
       $customer = $this->customerRepository->create($request); 
       return $customer; 
    }

    public function update($request, $id)
    {
        return $this->customerRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->customerRepository->destroy($id);
    }

    public function trashedItems()
    {
        return $this->customerRepository->trashedItems();
    }

    public function restore($id)
    {
        return $this->customerRepository->restore($id);
    }
    public function force_destroy($id)
    {
        return $this->customerRepository->force_destroy($id);
    }

}