<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiAlumnosController extends Controller
{
    public function index()
    {
        $alumnos = [
            [
                'nombre' => 'Carlos Morales',
                'matricula' => '19216291'
            ],
            [
                'nombre' => 'Pablo Rosas',
                'matricula' => '19216012'
            ],
            [
                'nombre' => 'Eduardo Echeverría',
                'matricula' => '19216294'
            ]
        ];

        return response()->json($alumnos);
    }
}
