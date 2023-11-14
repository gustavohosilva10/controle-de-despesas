<?php

namespace App\Http\Controllers;

use App\Interfaces\ExpensesRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Requests\ExpensesRequest; 

class ExpensesController extends Controller
{
    private ExpensesRepositoryInterface $expensesRepository;

    public function __construct(ExpensesRepositoryInterface $expensesRepository) 
    {
        $this->expensesRepository = $userexpensesRepositoryRepository;
    }

    public function create(ExpensesRequest $request):JsonResponse
    {
        return $this->expensesRepository->login($request);
    }

    public function delete(int $id): JsonResponse
    {
        return $this->expensesRepository->delete($id);
    }

    public function update(ExpensesRequest $request):JsonResponse
    {
        return $this->expensesRepository->register($request);
    }

    public function show():JsonResponse
    {
        return $this->expensesRepository->show();
    }
   
}
