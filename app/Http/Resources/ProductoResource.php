<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'product_id' => $this->id,
            'product_nombre' => $this->nombre,
            'product_description' =>$this->descripcion,
            'product_price' => number_format($this->precio,2),
            'product_imagen' => $this->imagen,
            'product_stock' => $this->stock,
            'product_empresa' => $this->empresa_id, // one category
            'product_subcategoria' => $this->subcategoria_id,    // has many tag
            'product_categoria' => $this->categoria,
        ];
    }
}
