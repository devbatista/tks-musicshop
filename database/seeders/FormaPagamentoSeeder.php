<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormaPagamento;

class FormaPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormaPagamento::create([
            'id' => 1,
            'tipo_pagamento' => 'Débito'
        ]);

        FormaPagamento::create([
            'id' => 2,
            'tipo_pagamento' => 'Crédito'
        ]);
    }
}
