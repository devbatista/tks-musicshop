<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Reuest;
use App\Models\Album;
use App\Models\Musica;

class MusicasController extends Controller
{
    public function getMusics(Album $albuns)
    {
        $data = [
            'musicas' => Musica::all(),
            'albuns' => $albuns->getAll(false, false, true),
        ];
        
        return $data;
    }
}
