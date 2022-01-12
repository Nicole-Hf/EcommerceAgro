<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Backup\BackupDestination\Backup;

class BackupController extends Controller
{
    public function index()
    {        
        return view('backup.index', );
    }
}
