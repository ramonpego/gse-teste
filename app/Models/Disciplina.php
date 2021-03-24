<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];


    public function professores()
    {
        return $this->belongsToMany(User::class, 'turmas')->withPivot('nome');
    }

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }


}
