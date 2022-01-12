<?php

namespace App\Observers;

use App\Models\Bitacora;
use App\Models\DetalleBitacora;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; 

class ProductoObserver
{
    /**
     * Handle the Producto "created" event.
     *
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    public function created(Producto $producto)
    {
      if(!empty(auth()->user())){
      $log = new DetalleBitacora();
      $log->event = "Producto"." ".$producto->nombre." "."creado";
      $log->nombre = auth()->user()->name;
      $log->correo = auth()->user()->email;
      $log->fecha_accion = Carbon::now();
      $log->bitacora_id= Auth::user()->id;  
      $log->save();
      } 

    }

    /**
     * Handle the Producto "updated" event.
     *
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    public function updated(Producto $producto)
    {
        $log = new DetalleBitacora();
        $log->event = "Producto"." ".$producto->nombre." "."modificado";
        $log->nombre = auth()->user()->name;
        $log->correo = auth()->user()->email;
        $log->fecha_accion = Carbon::now();
        $log->bitacora_id= Auth::user()->id;
        $log->save();
    }

    /**
     * Handle the Producto "deleted" event.
     *
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    public function deleted(Producto $producto)
    {
     $log = new DetalleBitacora();
     $log->event = "Producto"." ".$producto->nombre." "."eliminado";
     $log->nombre = auth()->user()->name;
     $log->correo = auth()->user()->email;
     $log->fecha_accion = Carbon::now();
     $log->bitacora_id= Auth::user()->id;
     $log->save();
    }

    /**
     * Handle the Producto "restored" event.
     *
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    public function restored(Producto $producto)
    {
        //
    }

    /**
     * Handle the Producto "force deleted" event.
     *
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    public function forceDeleted(Producto $producto)
    {
        //
    }
}
