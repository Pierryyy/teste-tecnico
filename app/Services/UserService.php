<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use App\Validators\UserValidatorInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $userRepository;
    private $userValidator;

    public function __construct(UserRepositoryInterface $userRepository, UserValidatorInterface $userValidator)
    {
        $this->userRepository = $userRepository;
        $this->userValidator = $userValidator;
    }

    public function register(array $data)
    {
        $this->userValidator->validate($data);

        $data['password'] = Hash::make($data['password']);

        return $this->userRepository->create($data);
    }
}
