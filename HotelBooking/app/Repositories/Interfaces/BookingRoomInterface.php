<?php

namespace App\Repositories\Interfaces;

interface BookingRoomInterface extends RepositoryInterface
{
   public function trashedItems();
   public function restore($id);
   public function force_destroy($id);
}
