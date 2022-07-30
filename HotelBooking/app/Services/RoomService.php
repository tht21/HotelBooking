<?php

namespace App\Services;

use App\Repositories\Interfaces\RoomInterface;
use App\Services\Interfaces\RoomServiceInterface;

class RoomService implements RoomServiceInterface
{
    protected $roomRepository;

    public function __construct(RoomInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function getAll($request)
    {
        return $this->roomRepository->getAll($request);
    }

    public function create($request)
    {
        return $this->roomRepository->create($request);

    }

    public function update($request, $id)
    {
        return $this->roomRepository->update($request, $id);
    }

    public function findById($id)
    {
        return $this->roomRepository->findById($id);
    }

    public function destroy($id)
    {
        return $this->roomRepository->destroy($id);
    }

    public function trashedItems()
    {
        return $this->roomRepository->trashedItems();
    }

    public function restore($id)
    {
        return $this->roomRepository->restore($id);
    }

    public function force_destroy($id)
    {
        return $this->roomRepository->force_destroy($id);
    }

    public function getAllByRoomType($id)
    {
        return $this->roomRepository->getAllByRoomType($id);
    }

}
