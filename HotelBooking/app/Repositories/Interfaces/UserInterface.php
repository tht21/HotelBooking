<?php

namespace App\Repositories\Interfaces;


interface UserInterface extends RepositoryInterface
{
    public function trashedItems();

    public function restore($id);

    public function force_destroy($id);
}
