<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compra;

class ComprasController extends Controller
{
    public function index(Compra $compras)
    {
        $compras = $compras->getAll();

        return view('admin.compras.index', ['compras' => $compras]);
    }
}
