<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorStoreRequest;
use App\Http\Requests\ProfessorUpdateRequest;
use App\Models\User;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessorStoreRequest $request)
    {
        try {
            $dataform = $request->validated();
            $professor = User::query()->create($dataform);
            return response($professor);
        }catch (\Exception $e){
            return response($e->getMessage(),400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessorUpdateRequest $request, User $user)
    {
        try {
            $dataform = $request->validated();
            $user->update($dataform);
            return response($user);
        }catch (\Exception $e){
            return response($e->getMessage(),400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response(null,204);
        }catch (\Exception $e){
            return response($e->getMessage(),400);
        }
    }
}
