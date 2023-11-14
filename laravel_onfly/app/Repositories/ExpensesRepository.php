<?php

namespace App\Repositories;

use App\Interfaces\ExpensesRepositoryInterface;
use App\Models\User;
use App\Models\Expenses;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Auth\AuthInterface;
use Illuminate\Support\Facades\Mail;


class ExpensesRepository implements ExpensesRepositoryInterface 
{
    public function create($request)
	{
        $data = Expenses::create($request);
       
        if ($data) {
            $this->mail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Despesa cadastrada com sucesso!'
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Houve erros ao processar sua solicitação'
        ], 400);
  	} 

    private function mail($request): void
    {
        $sendMail = [
            'title' => 'Controle de Despesas',
            'body' => 'informação'
        ];
        Mail::to($request->email)->send(new sendMail($request));
    }

    public function delete($id)
    {
        $delete = Expenses::findOrFail($id);
        
        if($delete){
            $delete->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Despesa deletada com sucesso!'
            ], 200);
        }
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


}