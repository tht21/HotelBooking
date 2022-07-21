<?php

namespace App\Services;

use App\Repositories\Interfaces\UserInterface;
use App\Services\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll($request)
    {
        return $this->userRepository->getAll($request);
    }

    public function findById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function create($request)
    {
        $user = $this->userRepository->create($request);
        return $user;
    }

    public function update($request, $id)
    {
        $userGroup = $this->userRepository->findById($id);
        $this->userRepository->update($request, $userGroup);
        return $userGroup;
    }

    public function destroy($id)
    {
        $userGroup = $this->userRepository->findById($id);
        $this->userRepository->destroy($userGroup);
        return $userGroup;

    }

    public function trashedItems()
    {

        return $this->userRepository->trashedItems();

    }

    public function restore($id)
    {

        return $this->userRepository->restore($id);

    }

    public function force_destroy($id)
    {

        return $this->userRepository->force_destroy($id);

    }

}
