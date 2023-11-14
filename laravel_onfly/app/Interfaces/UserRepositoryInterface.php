<?php

namespace App\Interfaces;

interface UserRepositoryInterface {
    
    public function login(array $request);
    public function register(array $request);
    public function show();
    public function logout();
}