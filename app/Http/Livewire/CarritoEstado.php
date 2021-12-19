<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CarritoProducto;

class CarritoEstado extends Component
{
    public $cantidad = 0;
    public $total = 0;
    public $items;

    public function carritoCliente()
    {
        $idUser = auth()->user()->id;
        $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
        $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->first();

        $resultado = CarritoProducto::join("productos", "productos.id", "=", "carritos_productos.producto_id")
            ->select("carritos_productos.*", "productos.nombre", "productos.imagen", "productos.precio")
            ->get();


        $items = array();
        $resultado->each(function ($item) use (&$items) {
            $items[] = $item;
            \Cart::add([
                'idCarrito' => $item->carrito_id,
                'id' => $item->id,
                'name' => $item->nombre,
                'price' => $item->precio,
                'quantity' => $item->cantidad,
                'attributes' => array(
                    'image' => $item->imagen,
                )

            ]);
        });
    }

    public function getCantidad()
    {
        if (auth()->check()) {
            $idUser = auth()->user()->id;
            $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
            $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->first();
            $resultado = CarritoProducto::join("productos", "productos.id", "=", "carritos_productos.producto_id")
                // ->select("carritos_productos.*", "productos.nombre", "productos.imagen", "productos.precio")
                ->where("carritos_productos.carrito_id", $carrito->id)->sum('carritos_productos.cantidad');
            $this->cantidad = $resultado;
        }
    }

    public function getItems()
    {
        if (auth()->check()) {
            $idUser = auth()->user()->id;
            $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
            $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->first();

            $resultado = CarritoProducto::join("productos", "productos.id", "=", "carritos_productos.producto_id")
                ->select("carritos_productos.*", "productos.nombre", "productos.imagen", "productos.precio")
                ->where("carritos_productos.carrito_id", $carrito->id)->get();

            $this->items = $resultado;
        }
    }

    public function getTotal()
    {
        if (auth()->check()) {
            $idUser = auth()->user()->id;
            $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
            $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->first();
            $resultado = CarritoProducto::join("productos", "productos.id", "=", "carritos_productos.producto_id")
                // ->select("carritos_productos.*", "productos.nombre", "productos.imagen", "productos.precio")
                ->where("carritos_productos.carrito_id", $carrito->id)->sum('carritos_productos.subtotal');
            $this->total = $resultado;
        }
    }

    public function removeItem($id)
    {
        $result2 = CarritoProducto::where('id', $id)->delete();
        $this->emitTo('carrito', 'refreshCarrito');
    }

    public function addItem($id, $cantidad, $precio)
    {

        $resultado = CarritoProducto::select("carritos_productos.*")->where('id', $id)->first();

        $resultado->update([
            'cantidad' => $resultado->cantidad + $cantidad,
            'subtotal' => ((float)$resultado->cantidad + $cantidad) * (float)$precio
        ]);
        $this->dispatchBrowserEvent('input-cantidad', ['id' => $id, 'cantidad' =>  $resultado->cantidad]);
        $this->emitTo('carrito', 'refreshCarrito');
    }

    public function removeItemProd($id, $cantidad, $precio)
    {
        $resultado = CarritoProducto::select("carritos_productos.*")->where('id', $id)->first();
        if (($resultado->cantidad) > 1) {
            $resultado->update([
                'cantidad' => $resultado->cantidad + $cantidad,
                'subtotal' => ((float)$resultado->cantidad + $cantidad) * (float)$precio
            ]);

            $this->dispatchBrowserEvent('inputDec-cantidad', ['id' => $id, 'cantidad' =>  $resultado->cantidad]);
            $this->emitTo('carrito', 'refreshCarrito');
        }
    }


    public function render()
    {
        $this->getCantidad();
        $this->getItems();
        $this->getTotal();
        return view('livewire.carrito-estado');
    }
}