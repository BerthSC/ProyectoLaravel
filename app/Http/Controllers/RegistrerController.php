<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrerController extends Controller
{
   
    public function RegistrarEjidos(){
        return "Parcela registrada";

    }

    public function EliminarEjido(){
        return "Parcela eliminada";
    }

    public function ActualizarUsuario(){
        return "Parcela actualizada";
    }

    public function MostrarUsuario(){
        return "Mostrar parcela";
    }
}
