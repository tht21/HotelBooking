<?php

namespace App\Services\Interfaces;

interface  RoomServiceInterface extends Service
{
    public function trashedItems();

    public function restore($id);

    public function force_destroy($id);
}
