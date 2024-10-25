<?php

namespace App\Http\Controllers;

use App\Models\Pacote;
use App\Models\CategoriaFormacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PacoteController extends Controller
{
    public function index(Request $request)
{
    $valor = $request->input('valor');
    
    $dados = !empty($valor) 
        ? Pacote::where('nome', 'like', "%$valor%")
                ->orWhere('destino', 'like', "%$valor%")
                ->get()
        : Pacote::all();

    return view('pacote.list', [
        'dados' => $dados, 
        'valor' => $valor 
    ]);
}
public function show($id)
{
    $pacote = Pacote::findOrFail($id);
    return view('pacote.show', compact('pacote'));
}

    public function create()
    {
        $categorias = CategoriaFormacao::all();

        return view('pacote.form', [
            'categorias' => $categorias,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|string|max:255',
                'destino' => 'required|string|max:255',
                'data_inicio' => 'required|date',
                'data_fim' => 'required|date',
                'preco' => 'required|numeric',
                'imagem' => 'nullable|image|mimes:png,jpeg,jpg',
            ],
            [
                'nome.required' => " O :attribute é obrigatório",
                'nome.max' => " O máximo de caracteres para :attribute é 255",
                'destino.required' => " O :attribute é obrigatório",
                'data_inicio.required' => " A data de início é obrigatória",
                'data_fim.required' => " A data de fim é obrigatória",
                'preco.required' => " O preço é obrigatório",
            ]
            
        );

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo = date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/pacote/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        Pacote::create($data);

        return redirect()->route('pacotes.index')->with('success', 'Pacote criado com sucesso!'); 
    }

    public function edit($id)
    {
        $dado = Pacote::find($id); 

        if (!$dado) {
            return redirect()->route('pacotes.index')->with('error', 'Pacote não encontrado.');
        }

        $categorias = CategoriaFormacao::all();

        return view('pacote.form', [
            'dado' => $dado,
            'categorias' => $categorias,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nome' => 'required|string|max:255',
                'destino' => 'required|string|max:255',
                'data_inicio' => 'required|date',
                'data_fim' => 'required|date',
                'preco' => 'required|numeric',
                'imagem' => 'nullable|image|mimes:png,jpeg,jpg',
            ],
            [
                'nome.required' => " O :attribute é obrigatório",
                'nome.max' => " O máximo de caracteres para :attribute é 255",
                'destino.required' => " O :attribute é obrigatório",
                'data_inicio.required' => " A data de início é obrigatória",
                'data_fim.required' => " A data de fim é obrigatória",
                'preco.required' => " O preço é obrigatório",
            ]
        );

        $pacote = Pacote::find($id);
        if (!$pacote) {
            return redirect()->route('pacotes.index')->with('error', 'Pacote não encontrado.');
        }

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {

            if ($pacote->imagem) {
                Storage::disk('public')->delete($pacote->imagem);
            }
            
            $nome_arquivo = date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/pacote/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        $pacote->update($data); 

        return redirect()->route('pacotes.index')->with('success', 'Pacote atualizado com sucesso!'); // Redireciona para a lista de pacotes
    }

    public function destroy($id)
    {
        $pacote = Pacote::findOrFail($id); 

        if (isset($pacote->imagem)) {
            Storage::disk('public')->delete($pacote->imagem);
        }

        $pacote->delete(); 

        return redirect()->route('pacotes.index')->with('success', 'Pacote excluído com sucesso!'); // Redireciona para a lista de pacotes
    }

    public function search(Request $request)
{
    $valor = $request->input('valor');

    $dados = Pacote::when($valor, function ($query, $valor) {
        return $query->where('nome', 'like', "%$valor%")
                     ->orWhere('destino', 'like', "%$valor%");
    })->get();

    return view('pacote.list', compact('dados'));
}

    

}
