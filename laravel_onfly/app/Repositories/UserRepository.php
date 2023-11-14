<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Interfaces\Auth\AuthInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class UserRepository implements UserRepositoryInterface 
{
    public function __construct(){
        auth()->setDefaultDriver('api'); 
    }

    public function login($request)
	{
   
        $token = \JWTAuth::attempt($request->only('email', 'password'));
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não autorizado',
            ], 401);
        }
        
        $user = Auth::user();

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
  	} 

    public function register($request)
    {
        $data = $request->all();
		$data['password'] = Hash::make($data['password']);
		
        User::create($data);
        
        if($data){
			return response()->json([
                'status' => 'success',
                'message' => 'Usuário criado com sucesso'
            ], 200);
		}

        return response()->json([
            'status' => 'error',
            'message' => 'Houve erros ao processar sua solicitação'
        ], 400);
    }

    
    public function show()
    {
        $data = Auth::user();

        if($data){
            return response()->json($data);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Houve erros ao processar sua solicitação'
        ], 400);
    }

    public function logout()
    {
        $user = auth()->logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Logout realizado. Seu token está inativo'
        ], 200);
        
    }

}