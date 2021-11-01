<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Compra extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getAll()
    {
        $retorno = DB::table('compras as c')
        ->select('c.id', 'c.nome', 'c.cpf', 'a.nome as album', 'f.tipo_pagamento as pagamento', 'a.preco as valor')
        ->join('albuns as a', 'c.album', '=', 'a.id')
        ->join('forma_pagamento as f', 'c.pagamento', '=', 'f.id')
        ->get();

        return $retorno;
    }
}
