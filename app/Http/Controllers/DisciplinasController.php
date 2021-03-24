<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisciplinaRequest;
use App\Models\Disciplina;

class DisciplinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Disciplina::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param DisciplinaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplinaRequest $request)
    {
        try {
            $dataform = $request->validated();
            $disciplina = Disciplina::query()->create($dataform);
            return response($disciplina,201);
        }catch (\Exception $e){
            return response($e->getMessage(),400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disciplina  $disciplinas
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplina $disciplina)
    {
        return response($disciplina);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param DisciplinaRequest $request
     * @param Disciplina $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(DisciplinaRequest $request, Disciplina $disciplina)
    {
        try {
            $disciplina->update($request->all());
            return response($disciplina,201);
        }catch (\Exception $e){
            return response($e->getMessage(),400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disciplina  $disciplinas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disciplina $disciplinas)
    {
        try {
            $disciplinas->delete();
            return response(null,204);
        }catch (\Exception $e){
            return response($e->getMessage(),400);
        }
    }
}
