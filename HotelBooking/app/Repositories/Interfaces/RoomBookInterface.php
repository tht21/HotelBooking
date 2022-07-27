<?php

namespace App\Repositories\Interfaces;

interface RoomBookInterface extends RepositoryInterface
{
    public function trashedItems();

    public function restore($id);

    public function force_destroy($id);
}
