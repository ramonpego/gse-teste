<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfessorDisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        /**
         * Esta relacao pode ser meio que gambiarra nao ficou claro na minha cabeca
         * mas a tabela ```turmas``` pode funcionar como uma tabela pivot neste caso
         * e voce consegue acessar todas as disciplinas do professor mesmo que cada uma necessitara de uma turma
         */
        return response($user->disciplinas);
    }

}
