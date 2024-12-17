<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transportadora;

class TransportadoraController extends Controller
{
    public function index()
    {
        $transportadoras = Transportadora::with('entregas')->get();

        return view('transportadoras.index', compact('transportadoras'));
    }
}
