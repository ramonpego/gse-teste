<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoStoreRequest;
use App\Http\Requests\AlunoUpdateRequest;
use App\Models\Aluno;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Aluno::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoStoreRequest $request)
    {
        try {
            $dataform = $request->validated();
            $aluno = Aluno::query()->create($dataform);
            return response($aluno);
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Aluno $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        return response($aluno);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Aluno $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(AlunoUpdateRequest $request, Aluno $aluno)
    {
        try {
            $dataform = $request->validated();
            $aluno->update($dataform);
            return response($aluno);
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Aluno $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        try {
            $aluno->delete();
            return response(null, 204);
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
    }
}
