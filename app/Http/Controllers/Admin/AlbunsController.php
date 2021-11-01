<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Artista;
use App\Models\Genero;
use App\Models\Album;
use App\Models\Musica;

class AlbunsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Album $albuns)
    {
        $albuns = $albuns->getAll();

        foreach ($albuns as $index => $value) {
            $albuns[$index]->capa = asset(Storage::url('capa/' . $albuns[$index]->capa));
        }

        return view('admin.albuns.index', ['albuns' => $albuns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.albuns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // Faz a validação de todos os campos
        $validator = Validator::make($data, [
            'titulo' => 'required|string',
            'musicas' => 'required',
            'artista' => 'required|string',
            'capa' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'genero' => 'required|string',
            'preco' => 'required|regex:/^\d+(\,\d{1,2})?$/'
        ]);

        // Se houver qualquer tipo de erro de validação, será retornado uma mensagem de erro
        if ($validator->fails()) {
            return redirect()->route('albuns.create')->withErrors($validator)->withInput();
        }

        // Altera o formato do preço para que o DB aceite
        $data['preco'] = str_replace(',', '.', $data['preco']);

        // Isere as informações de Artista, Gênero e Album no DB
        $artista = Artista::where(['nome' => $data['artista']])->first();
        if (!$artista) {
            $data['artista'] = $this->addArtista($data);
        } else {
            $data['artista'] = $artista->id;
        }

        $genero = Genero::where(['nome' => $data['genero']])->first();
        if(!$genero) {
            $data['genero'] = $this->addGenero($data);
        } else {
            $data['genero'] = $genero->id;
        }
        
        $data['album'] = $this->addAlbum($data);

        // Atualiza o campo "capa" caso o admin tenha inserido alguma imagem
        if (isset($data['capa'])) {
            $image = $data['album'] . '.' . $data['capa']->extension();
            $data['capa']->storeAs('public/capa', $image);
            $data['capa'] = $image;
            Album::where(['id' => $data['album']])->update(['capa' => $data['capa']]);
        } else {
            $data['capa'] = 'disco.jpg';
            Album::where(['id' => $data['album']])->update(['capa' => $data['capa']]);
        }

        // Separa todas as músicas em array para inserir no banco
        $data['musicas'] = explode("\r\n", $data['musicas']);
        $this->addMusicas($data);

        return redirect()->route('albuns.index')->with(['success' => 'Álbum criado com sucesso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function addArtista($data)
    {
        $artista = new Artista();
        $artista->nome = $data['artista'];
        $artista->save();

        return $artista->id;
    }

    private function addGenero($data)
    {
        $genero = new Genero();
        $genero->nome = $data['genero'];
        $genero->save();

        return $genero->id;
    }

    private function addAlbum($data)
    {
        $album = new Album();
        $album->nome = $data['titulo'];
        $album->artista = $data['artista'];
        $album->genero = $data['genero'];
        $album->preco = $data['preco'];
        $album->save();

        return $album->id;
    }

    private function addMusicas($data)
    {
        foreach ($data['musicas'] as $musica) {
            $musicas = new Musica();
            $musicas->nome = $musica;
            $musicas->album = $data['album'];
            $musicas->save();
        }
    }

    public function getAlbuns(Album $albuns)
    {
        $albuns = $albuns->getAll(false);
        return $albuns;
    }
}
