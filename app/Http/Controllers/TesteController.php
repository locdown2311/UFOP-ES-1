<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function alocacao()
    {
        return view('alocacao');
    }
    public function perfil()
    {
        return view('perfil');
    }
    public function criaTurma()
    {
        return view('criaturma');
    }
}
