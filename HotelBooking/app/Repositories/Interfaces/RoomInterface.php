<?php

namespace App\Repositories\Interfaces;

interface RoomInterface extends RepositoryInterface
{
   public function trashedItems();
   public function restore($id);
   public function force_destroy($id);

    public function getAllByRoomType($id);
}
