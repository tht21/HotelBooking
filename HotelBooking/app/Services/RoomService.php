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
        $this->roomRepository->create($request);
    }

    public function update($request, $id)
    {
        $course = $this->roomRepository->findById($id);
        $this->roomRepository->update($request, $course);
    }

    public function findById($id)
    {
        return $this->roomRepository->findById($id);
    }

    public function destroy($id)
    {
        $course = $this->roomRepository->findById($id);
        $this->roomRepository->destroy($course);
    }


}
