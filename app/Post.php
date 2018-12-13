<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'texto','profissao','cursos','autor','categoria'
    ];
}
