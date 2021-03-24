<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }

    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class, 'turmas')->withPivot('nome');
    }


    /**
     * "Emulando" um relacionamento hasManyThrough ja que nao e possivel faze-lo com relacionamento n:m
     * @return \Illuminate\Support\Collection
     */
    public function getAlunosAttribute()
    {
        return $this->turmas()
            ->with('alunos')
            ->get()
            ->pluck('alunos')->flatten();

    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
