<?php

namespace App\Interfaces;

interface ExpensesRepositoryInterface {
    
    public function create(array $request);
    public function update(int $id, array $request);
    public function show();
    public function delete(int $id);
}