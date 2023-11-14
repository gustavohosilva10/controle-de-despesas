<?php

use Illuminate\Http\Request;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Requests\LoginUserRequest; 
use App\Http\Requests\RegisterUserRequest;

class AuthController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function login(LoginUserRequest $request):JsonResponse
    {
        return $this->userRepository->login($request);
    }

    public function register(RegisterUserRequest $request):JsonResponse
    {
        return $this->userRepository->register($request);
    }

    public function show():JsonResponse
    {
        return $this->userRepository->show();
    }

    public function logout(): JsonResponse
    {
        return $this->userRepository->logout();
    }
}
