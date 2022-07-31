<?php

namespace App\Repositories\Interfaces;

interface BookingRoomInterface extends RepositoryInterface
{
    public function getAllBookRoom($id);

    public function addRoom($request);
}
