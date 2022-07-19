<?php

namespace App\Services;

use App\Repositories\Interfaces\RoomTypeRepositoryInterface;
use App\Services\Interfaces\RoomTypeServiceInterface;

class RoomTypeService implements RoomTypeServiceInterface
{
    protected $roomtypeRepository;

    public function __construct(RoomTypeRepositoryInterface $roomtypeRepository)
    {
        $this->roomtypeRepository = $roomtypeRepository;
    }

    public function getAll($request)
    {
        return $this->roomtypeRepository->getAll($request);
    }
    public function findById($id)
    {
        return $this->roomtypeRepository->findById($id);
    }

    public function create($request)
    {
       $roomtype = $this->roomtypeRepository->create($request); 
       return $roomtype; 
    }

    public function update($request, $id)
    {
        return $this->roomtypeRepository->update($request, $id);
    }

    public function destroy($id)
    {
        // $roomtype = $this->roomtypeRepository->findById($id);
        // $this->roomtypeRepository->destroy($roomtype);
        // return $roomtype;
        return $this->roomtypeRepository->destroy($id);
    }

    public function trashedItems()
    {
        return $this->roomtypeRepository->trashedItems();
    }

    public function restore($id)
    {
        return $this->roomtypeRepository->restore($id);
    }
    public function force_destroy($id)
    {
        return $this->roomtypeRepository->force_destroy($id);
    }

}