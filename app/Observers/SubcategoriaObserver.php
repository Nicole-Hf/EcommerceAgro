<?php

namespace App\Observers;

use App\Models\DetalleBitacora;
use App\Models\Subcategoria;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SubcategoriaObserver
{
    /**
     * Handle the Subcategoria "created" event.
     *
     * @param  \App\Models\Subcategoria  $subcategoria
     * @return void
     */
    public function created(Subcategoria $subcategoria)
    {
        if(!empty(auth()->user())){
            $log = new DetalleBitacora();
            $log->event = "Subcategoria"." ".$subcategoria->nombre." "."creado";
            $log->nombre = auth()->user()->name;
            $log->correo = auth()->user()->email;
            $log->fecha_accion = Carbon::now();
            $log->bitacora_id= Auth::user()->id;  
            $log->save();
            } 
    }

    /**
     * Handle the Subcategoria "updated" event.
     *
     * @param  \App\Models\Subcategoria  $subcategoria
     * @return void
     */
    public function updated(Subcategoria $subcategoria)
    {
        $log = new DetalleBitacora();
        $log->event = "Subcategoria"." ".$subcategoria->nombre." "."modificado";
        $log->nombre = auth()->user()->name;
        $log->correo = auth()->user()->email;
        $log->fecha_accion = Carbon::now();
        $log->bitacora_id= Auth::user()->id;  
        $log->save();
    }

    /**
     * Handle the Subcategoria "deleted" event.
     *
     * @param  \App\Models\Subcategoria  $subcategoria
     * @return void
     */
    public function deleted(Subcategoria $subcategoria)
    {
        $log = new DetalleBitacora();
        $log->event = "Subcategoria"." ".$subcategoria->nombre." "."eliminado";
        $log->nombre = auth()->user()->name;
        $log->correo = auth()->user()->email;
        $log->fecha_accion = Carbon::now();
        $log->bitacora_id= Auth::user()->id;  
        $log->save();
    }

    /**
     * Handle the Subcategoria "restored" event.
     *
     * @param  \App\Models\Subcategoria  $subcategoria
     * @return void
     */
    public function restored(Subcategoria $subcategoria)
    {
        //
    }

    /**
     * Handle the Subcategoria "force deleted" event.
     *
     * @param  \App\Models\Subcategoria  $subcategoria
     * @return void
     */
    public function forceDeleted(Subcategoria $subcategoria)
    {
        //
    }
}
