<?php

namespace App\Services\Interfaces;

interface BookingRoomServiceInterface extends Service
{
   public function trashedItems();
   public function restore($id);
   public function force_destroy($id);

    public function addRoom($request);

    public function getAllBookRoom($id);
}
