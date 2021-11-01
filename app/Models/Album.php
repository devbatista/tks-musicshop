<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Album extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'albuns';

    public function getAll($paginate = 10, $album = true, $ajax = false)
    {
        if (!$paginate && !$album && !$ajax) {
            $retorno = DB::table('albuns as a')
                ->select('a.id', 'a.nome as titulo', 't.nome as artista', 'g.nome as genero', 'a.preco', 'a.capa')
                ->join('artistas as t', 't.id', '=', 'a.artista')
                ->join('generos as g', 'g.id', '=', 'a.genero')
                ->first();
        } else if ($album && !$paginate) {
            $retorno = DB::table('albuns as a')
                ->select('a.id', 'a.nome as titulo', 't.nome as artista', 'g.nome as genero', 'a.preco', 'a.capa')
                ->join('artistas as t', 't.id', '=', 'a.artista')
                ->join('generos as g', 'g.id', '=', 'a.genero')
                ->where(['a.id' => $album])
                ->first();
        } else if ($ajax) {
            $retorno = DB::table('albuns as a')
                ->select('a.id', 'a.nome as titulo', 't.nome as artista', 'g.nome as genero', 'a.preco', 'a.capa')
                ->join('artistas as t', 't.id', '=', 'a.artista')
                ->join('generos as g', 'g.id', '=', 'a.genero')
                ->get();
        } else {
            $retorno = DB::table('albuns as a')
                ->select('a.id', 'a.nome as titulo', 't.nome as artista', 'g.nome as genero', 'a.preco', 'a.capa')
                ->join('artistas as t', 't.id', '=', 'a.artista')
                ->join('generos as g', 'g.id', '=', 'a.genero')
                ->paginate($paginate);
        }

        return $retorno;
    }

    public function getSingleInfo($album)
    {
        $retorno = $this->getAll(false, $album, false);
        return $retorno;
    }

    public function getAllByGenero($genero)
    {
        if ($genero) {
            $retorno = DB::table('albuns as a')
                ->select('a.id', 'a.nome as titulo', 't.nome as artista', 'g.nome as genero', 'a.preco', 'a.capa')
                ->join('artistas as t', 't.id', '=', 'a.artista')
                ->join('generos as g', 'g.id', '=', 'a.genero')
                ->where(['genero' => $genero])
                ->paginate(10);
        } else {
            $retorno = DB::table('albuns as a')
                ->select('a.id', 'a.nome as titulo', 't.nome as artista', 'g.nome as genero', 'a.preco', 'a.capa')
                ->join('artistas as t', 't.id', '=', 'a.artista')
                ->join('generos as g', 'g.id', '=', 'a.genero')
                ->paginate(10);
        }

        return $retorno;
    }
}
