<?php

namespace App\Services;

use App\Repositories\Interfaces\FloorInterface;
use App\Services\Interfaces\FloorServiceInterface;

class FloorService implements FloorServiceInterface
{
    protected $roomRepository;

    public function __construct(FloorInterface $roomRepository)
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
