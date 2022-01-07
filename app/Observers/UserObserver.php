<?php

namespace App\Observers;

use App\Models\Bitacora;
use App\Models\DetalleBitacora;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $log = new Bitacora();
        $log->nombre = $user->name;
        $log->correo = $user->email;
        $log->fecha_hora = Carbon::now();
        $log->user_id = $user->id;
        $log->save();
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $log = new DetalleBitacora();
        $log->event = "Usuario"." ".$user->name." "."actualizado";
        $log->nombre = auth()->user()->name;
        $log->correo = auth()->user()->email;
        $log->fecha_accion = Carbon::now();
        $log->bitacora_id= Auth::user()->id;
        $log->save();
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $log = new DetalleBitacora();
        $log->event = "Elimino usuario"." ".$user->name;
        $log->nombre = auth()->user()->name;
        $log->correo = auth()->user()->email;
        $log->fecha_accion = Carbon::now();
        $log->bitacora_id= Auth::user()->id;
        $log->save();
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
