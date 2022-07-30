<?php

namespace App\Services;

use App\Repositories\Interfaces\CheckoutInterface;
use App\Services\Interfaces\CheckoutServiceInterface;

class CheckoutService implements CheckoutServiceInterface
{
    protected $checkoutRepository;

    public function __construct(CheckoutInterface $checkoutRepository)
    {
        $this->checkoutRepository = $checkoutRepository;
    }

    public function getAll($request)
    {
        return $this->checkoutRepository->getAll($request);
    }
    public function findById($id)
    {
        return $this->checkoutRepository->findById($id);
    }

    public function create($request)
    {
       $checkout = $this->checkoutRepository->create($request); 
       return $checkout; 
    }

    public function update($request, $id)
    {
        return $this->checkoutRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->checkoutRepository->destroy($id);
    }
}