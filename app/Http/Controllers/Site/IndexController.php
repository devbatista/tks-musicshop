<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Album;
use App\Models\Musica;
use App\Models\Compra;
use App\Models\Genero;

class IndexController extends Controller
{
    public function index(Album $album, Request $request)
    {
        $genero = $request->only('genero');
        $genero = (count($genero) ? intval($genero['genero']) : 0);

        $data = [
            'album' => $album->getAllByGenero($genero),
            'musicas' => Musica::all(),
            'generos' => Genero::all(),
        ];

        foreach ($data['album'] as $key => $value) {
            $value->capa = asset(Storage::url('capa/' . $value->capa));
        }

        return view('site.index', ['data' => $data, 'generoSelect' => $genero]);
    }

    public function pucharse(Request $request, Compra $compra)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'album' => 'required',
            'nome' => 'required|string',
            'cpf' => 'required|string|cpf',
            'forma_pagamento' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('index')->withErrors($validator);
        }

        if ($data['forma_pagamento'] != '1' && $data['forma_pagamento'] != '2') {
            return redirect()->route('index')->withErrors(['FormaDePagamento' => 'Insira uma forma de pagamento válida']);
        }

        $compra->nome = $data['nome'];
        $compra->cpf = $data['cpf'];
        $compra->album = intval($data['album']);
        $compra->pagamento = intval($data['forma_pagamento']);
        $compra->save();

        return redirect()->route('index')->with(['success' => 'Álbum comprado com sucesso']);
    }
}
