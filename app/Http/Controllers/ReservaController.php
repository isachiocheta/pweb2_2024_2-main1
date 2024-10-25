<?php
namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return view('reserva.list', compact('reservas'));
    }

    public function create()
    {
        return view('reserva.form');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'cliente_id' => 'required|integer',
            'pacote_id' => 'required|integer',
            'data_reserva' => 'required|date',
            'quantidade_pessoas' => 'required|integer',
            'status' => 'required|string|max:50',
        ]);

        Reserva::create($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva criada com sucesso!');
    }

    public function edit(Reserva $reserva)
    {
        return view('reserva.form', compact('reserva'));
    }

    public function update(Request $request, Reserva $reserva)
    {

        $request->validate([
            'cliente_id' => 'required|integer',
            'pacote_id' => 'required|integer',
            'data_reserva' => 'required|date',
            'quantidade_pessoas' => 'required|integer',
            'status' => 'required|string|max:50',
        ]);

        $reserva->update($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva atualizada com sucesso!');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva excluída com sucesso!');
    }
}
