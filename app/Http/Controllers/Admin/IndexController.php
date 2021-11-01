<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Musica;
use App\Models\Artista;
use App\Models\Compra;

class IndexController extends Controller
{
    public function index()
    {
        $data = [
            'info' => [
                'compras' => Compra::count(),
                'albuns' => Album::count(),
                'musicas' => $this->getMusicas(),
                'artistas' => Artista::count(),
            ]
        ];

        return view('admin.home.index', $data);
    }

    private function getMusicas()
    {
        $data = [];
        $album = new Album();
        $todasMusicas = Musica::select('*')->orderByDesc('id')->get();
        $index = 0;
        foreach ($todasMusicas as $musica) {
            $data[$index] = [
                'id' => $musica->id,
                'nome' => $musica->nome
            ];

            $infoSingle = $album->getSingleInfo($musica->album);
            $data[$index]['artista'] = $infoSingle->artista;
            $data[$index]['genero'] = $infoSingle->genero;

            $index++;
            if($index == 10) break;
        }

        return $data;
    }
}
