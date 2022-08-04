<?php

namespace App\Services;

use App\Repositories\Interfaces\RoomBookInterface;
use App\Services\Interfaces\RoomBookServiceInterface;

class RoomBookService implements RoomBookServiceInterface
{
    protected $roomBookRepository;

    public function __construct(RoomBookInterface $roomBookRepository)
    {
        $this->roomBookRepository = $roomBookRepository;
    }

    public function getAll($request)
    {
        return $this->roomBookRepository->getAll($request);
    }

    public function create($request)
    {
        $this->roomBookRepository->create($request);
    }

    public function update($request, $id)
    {
        $course = $this->roomBookRepository->findById($id);
        $this->roomBookRepository->update($request, $course);
    }

    public function findById($id)
    {
        return $this->roomBookRepository->findById($id);
    }

    public function destroy($id)
    {
        $course = $this->roomBookRepository->findById($id);
        $this->roomBookRepository->destroy($course);
    }

    public function trashedItems()
    {
        return $this->roomBookRepository->trashedItems();
    }

    public function restore($id)
    {
        return $this->roomBookRepository->restore($id);
    }

    public function force_destroy($id)
    {
        return $this->roomBookRepository->force_destroy($id);
    }


}
