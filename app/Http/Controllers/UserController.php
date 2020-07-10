<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    private $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(){
        return $this->user->paginate(10);
    }
    // public function show($evento){
    //     return $this->evento->findOrFail($evento);
    // }
    // public function store(Request $request){
    //     $this->evento->create($request->all());
    //     return response()->json(['data'=>['message'=>'Evento Criado com sucesso!']]);
    // }
    // public function update($evento, Request $request){
    //     $evento = $this->evento->findOrFail($evento);
    //     $evento->update($request->all());
    //     return response()->json(['data'=>['message'=>'Evento Atualizado com sucesso!']]);
    // }
    // public function destroy($evento){
    //     $evento = $this->evento->findOrFail($evento);
    //     $evento->delete();
    //     return response()->json(['data'=>['message'=>'Evento Deletado com sucesso!']]);
    // }
    //
}
