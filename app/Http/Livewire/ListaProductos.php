<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Producto;

class ListaProductos extends Component
{
     use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $term;
    public function render()
    {
        return view('livewire.lista-productos',[
            'productos' =>Producto::when($this->term,function($query,$term){
return $query->where('nombre','LIKE',"%$term%");
            })->paginate(3),
        ]);
    }
}