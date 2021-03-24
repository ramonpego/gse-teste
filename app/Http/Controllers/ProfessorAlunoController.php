<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfessorAlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return response($user->alunos);
    }


}
