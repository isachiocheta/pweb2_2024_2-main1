<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\CategoriaFormacao;
use Illuminate\Http\Request;
use Storage;

class ClienteController extends Controller
{
    function index()
    {
        $dados = cliente::All();

        return view('cliente.list', [
            'dados' => $dados
        ]);
    }

    function create()
    {
        $categorias = CategoriaFormacao::All();

        return view('cliente.form',[
            'categorias'=> $categorias,
        ]);
    }

    function store(Request $request)
    {

        $request->validate(
            [
                'nome' => 'required|max:130|min:3',
                'cpf' => 'required|max:14',
                'telefone' => 'required|max:20',
                'categoria_id',
                'imagem',
            ],
            [
                'nome.required' => " O :attribute é obrigatório",
                'nome.max' => " O máximo de caracteres para :attribute é 130",
                'nome.min' => " O mínimo de caracteres para :attribute é 3",
                'cpf.required' => " O :attribute é obrigatório",
                'cpf.max' => " O máximo de caracteres para :attribute é 14",
                'telefone.required' => " O :attribute é obrigatório",
                'telefone.max' => " O máximo de caracteres para :attribute é 20",
                'imagem.image'=>'Deve ser enviado uma imagem',
                'imagem.mimes'=>'A imagem deve ser da extesão PNG,JPEG ou JPG',
                ]
        );

        $data = $request->all();
        $imagem = $request->file('imagem');

        if($imagem){
            $nome_arquivo=
            date('YmdHis').".".$imagem->getClientOriginalExtension();
            $diretorio = "imagem/cliente/";

            $imagem->storeAs($diretorio,
                $nome_arquivo,'public');

            $data['imagem'] = $diretorio.$nome_arquivo;
        }


        cliente::create($data);

        return redirect('cliente');
    }

    function edit($id)
    {
        $dado = cliente::find($id);

        $categorias = CategoriaFormacao::All();

        return view('cliente.form', [
            'dado' => $dado,
            'categorias'=>$categorias,
        ]);
    }

    function update(Request $request, $id)
    {

        $request->validate(
            [
                'nome' => 'required|max:130|min:3',
                'cpf' => 'required|max:14',
                'telefone' => 'required|max:20',
            ],
            [
                'nome.required' => " O :attribute é obrigatório",
                'nome.max' => " O máximo de caracteres para :attribute é 130",
                'nome.min' => " O mínimo de caracteres para :attribute é 3",
                'cpf.required' => " O :attribute é obrigatório",
                'cpf.max' => " O máximo de caracteres para :attribute é 14",
                'telefone.required' => " O :attribute é obrigatório",
                'telefone.max' => " O máximo de caracteres para :attribute é 20",
                ]
        );

        $data = $request->all();
        $imagem = $request->file('imagem');

        if($imagem){
            $nome_arquivo=
            date('YmdHis').".".$imagem->getClientOriginalExtension();
            $diretorio = "imagem/cliente/";

            $imagem->storeAs($diretorio,
                $nome_arquivo,'public');

            $data['imagem'] = $diretorio.$nome_arquivo;
        }

        cliente::updateOrCreate(
            ['id' => $id],
            $data
        );

        return redirect('cliente');
    }

    public function destroy($id)
{
    $cliente = Cliente::findOrFail($id);
    if ($cliente->imagem && Storage::exists($cliente->imagem)) {
        Storage::delete($cliente->imagem);
    }

    $cliente->delete();

    return redirect()->route('cliente.index')->with('success', 'Cliente excluído com sucesso!');
}

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = cliente::where(
                $request->tipo,
                'like',
                "%$request->valor%"

            )->get();
        } else {
            $dados = cliente::All();
        }
        return view('cliente.list', ['dados' => $dados]);
    }


}
