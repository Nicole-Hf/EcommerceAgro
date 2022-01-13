<?php

namespace App\Observers;

use App\Models\Categoria;
use App\Models\DetalleBitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoriaObserver
{
    /**
     * Handle the Categoria "created" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function created(Categoria $categoria)
    {
        if(!empty(auth()->user())){
            $log = new DetalleBitacora();
            $log->event = "Categoria"." ".$categoria->nombre." "."creado";
            $log->nombre = auth()->user()->name;
            $log->correo = auth()->user()->email;
            $log->fecha_accion = Carbon::now();
            $log->bitacora_id= Auth::user()->id;  
            $log->save();
            } 
    }

    /**
     * Handle the Categoria "updated" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function updated(Categoria $categoria)
    {
        
            $log = new DetalleBitacora();
            $log->event = "Categoria"." ".$categoria->nombre." "."modificado";
            $log->nombre = auth()->user()->name;
            $log->correo = auth()->user()->email;
            $log->fecha_accion = Carbon::now();
            $log->bitacora_id= Auth::user()->id;  
            $log->save();
            
    }

    /**
     * Handle the Categoria "deleted" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function deleted(Categoria $categoria)
    {
        $log = new DetalleBitacora();
        $log->event = "Categoria"." ".$categoria->nombre." "."eliminado";
        $log->nombre = auth()->user()->name;
        $log->correo = auth()->user()->email;
        $log->fecha_accion = Carbon::now();
        $log->bitacora_id= Auth::user()->id;  
        $log->save();
    }

    /**
     * Handle the Categoria "restored" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function restored(Categoria $categoria)
    {
        //
    }

    /**
     * Handle the Categoria "force deleted" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function forceDeleted(Categoria $categoria)
    {
        //
    }
}
