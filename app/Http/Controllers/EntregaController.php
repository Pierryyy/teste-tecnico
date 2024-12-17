<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transportadora;
use App\Models\Entrega;

class EntregaController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->all();
        $transportadoras = Transportadora::with('entregas')->filtrar($filters)->get();
        $transportadorasFilter = Transportadora::all();
        return view('entregas.index', compact('transportadoras', 'transportadorasFilter'));
    }
    public function show($id)
    {
        $entrega = Entrega::findOrFail($id);

        return view('entregas.show', compact('entrega'));
    }

    public function create() {}

    public function save(Request $request) {}


    public function edit($id) {}

    public function update(Request $request, $id) {}

    public function delete($id) {}
}
