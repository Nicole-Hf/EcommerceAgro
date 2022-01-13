<?php

namespace App\Exports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClienteExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Cliente::join("carritos", "carritos.cliente_id", "=", "clientes.id")
            ->join("pedidos_pagos", "pedidos_pagos.carrito_id", "=", "carritos.id")
            ->select('clientes.nombre')->distinct()->get();
    }

    public function headings(): array
    {
        return [
            'NOMBRE'
        ];
    }
}