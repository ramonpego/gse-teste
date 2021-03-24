<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $fillable = ['nome','email','data_nascimento'];

    public function turmas()
    {
        return $this->belongsToMany(Turma::class);
    }

}
