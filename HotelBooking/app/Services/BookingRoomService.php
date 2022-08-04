<?php

namespace App\Services;

use App\Repositories\Interfaces\BookingRoomInterface;
use App\Services\Interfaces\BookingRoomServiceInterface;


class BookingRoomService implements BookingRoomServiceInterface
{
    protected $bookingRoomRepository;

    public function __construct(BookingRoomInterface $bookingRoomRepository)
    {
        $this->bookingRoomRepository = $bookingRoomRepository;
    }

    public function getAll($request)
    {
        return $this->bookingRoomRepository->getAll($request);
    }

    public function create($request)
    {
        return $this->bookingRoomRepository->create($request);

    }

    public function update($request, $id)
    {
        return $this->bookingRoomRepository->update($request, $id);
    }

    public function findById($id)
    {
        return $this->bookingRoomRepository->findById($id);
    }

    public function destroy($id)
    {
        return $this->bookingRoomRepository->destroy($id);
    }

    public function trashedItems()
    {
        return $this->bookingRoomRepository->trashedItems();
    }

    public function restore($id)
    {
        return $this->bookingRoomRepository->restore($id);
    }

    public function force_destroy($id)
    {
        return $this->bookingRoomRepository->force_destroy($id);
    }

    public function getAllBookRoom($id)
    {
        return $this->bookingRoomRepository->getAllBookRoom($id);
    }

    public function addRoom($request)
    {

        return $this->bookingRoomRepository->addRoom($request);
    }
}
