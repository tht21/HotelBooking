<?php 
namespace App\Repositories\Interfaces;
use App\Repositories\Interfaces\RepositoryInterface;

interface RoomTypeRepositoryInterface extends RepositoryInterface {
   public function trashedItems();
   public function restore($id);
   public function force_destroy($id);
}