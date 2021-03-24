<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmaRequest;
use App\Models\Disciplina;
use App\Models\Turma;

class DisciplinaTurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function index(Disciplina $disciplina)
    {
        return response($disciplina->turmas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TurmaRequest $request
     * @param \App\Models\Disciplina $disciplina
     * @return \Illuminate\Http\Response
     */
    public function store(TurmaRequest  $request, Disciplina $disciplina)
    {
        try {
            $dataform = $request->validated();
            $turma = $disciplina->turmas()->create($dataform);
            return response($turma,201);
        }catch (\Exception $e){
            return response($e->getMessage(),400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function show(Turma $turma)
    {
        return response($turma);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TurmaRequest $request
     * @param \App\Models\Turma $turma
     * @return \Illuminate\Http\Response
     */
    public function update(TurmaRequest  $request, Turma $turma)
    {
        try {
            $dataform = $request->validated();
            $turma->update($dataform);
            return response($turma);
        }catch (\Exception $e){
            return response($e->getMessage(),400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @param  \App\Models\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turma $turma)
    {
        try {
            $turma->delete();
            return response(null,204);
        }catch (\Exception $e){
            return response($e->getMessage(),400);
        }
    }
}
