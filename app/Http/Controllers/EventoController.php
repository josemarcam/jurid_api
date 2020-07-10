<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;

class EventoController extends Controller
{
    private $evento;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Evento $evento)
    {
        $this->evento = $evento;
    }

    public function index(){
        return $this->evento::orderBy('updated_at', 'desc')->paginate(10);
    }
    public function checkCreator($id){
        $user = auth()->user();
        return ($user["id"] == $id) ? true : false ;
    }
    public function show_id($evento){
        return $this->evento->findOrFail($evento);
    }
    public function show_showman(Request $request){
        return $this->evento->where('showman',$request["showman"])->get();
    }
    public function show_description(Request $request){
        return $this->evento->where('description',$request["description"])->get();
    }
    public function store(Request $request){
        $user = auth()->user();
        $request['creator'] = $user["id"];
        $this->evento->create($request->all());
        return response()->json(['data'=>['message'=>'Evento Criado com sucesso!']]);
    }
    public function update($evento, Request $request){
        $evento = $this->evento->findOrFail($evento);
        if ($this->checkCreator($evento["creator"])) {
            $evento->update($request->all());
            return response()->json(['data'=>['message'=>'Evento Atualizado com sucesso!']]);
        }
            return response()->json(['data'=>['message'=>'Este evento nao pertence a voce!']]);
    }
    public function destroy($evento){
        $evento = $this->evento->findOrFail($evento);
        if ($this->checkCreator($evento["creator"])) {
            $evento->delete();
            return response()->json(['data'=>['message'=>'Evento Atualizado com sucesso!']]);
        }
        return response()->json(['data'=>['message'=>'Este evento nao pertence a voce!']]);
    }
    //
}
