<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmaRequest;
use App\Models\Turma;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Turma::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TurmaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TurmaRequest $request)
    {
        try {
            $dataform = $request->validated();
            $turma = Turma::query()->create($dataform);
            return response($turma);
        }catch (\Exception $e){
            return response($e->getMessage(),400);
        }
    }

    /**
     * Display the specified resource.
     *
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
    public function update(TurmaRequest $request, Turma $turma)
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
