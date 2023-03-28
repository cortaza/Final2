<?php

namespace App\Http\Controllers;

use App\Models\Competencia;
use App\Models\Semana;
use App\Models\Semanabasura;
use Illuminate\Http\Request;

class SemanaController extends Controller
{
    public function index()
    {
        $semana=Semana::all();
        $semanaba=Semanabasura::all();
        $competencia=Competencia::all();
        return view('popupwindows/diassemana', compact('semana','semanaba','competencia'));
    }

    public function create()
    {
        //
    }

    public function restore(Request $request)
    {
        //
    }

    public function edit(Semana $semana)
    {
        //
    }

    public function destroy(Semana $semana)
    {
        //
    }
}
