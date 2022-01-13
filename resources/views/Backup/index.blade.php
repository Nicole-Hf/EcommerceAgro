@extends('layouts.main',['activePage'=>'backup','titlePage'=>'Backup'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-left">
                <?php
                   function runfunction(){
                       $cmd = shell_exec('cd C:\Users\Duawn\Documents\GitHub\EcommerceAgro && php artisan backup:run --only-db && clear' );
                       echo "<pre>$cmd</pre>";
                       
                   }
                    if(isset($_GET['run'])){
                        runfunction();
                    }
                    ?>
                <a class="btn btn-outline-success btn-success" href='?run=true'>
                    Crear Backup
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{--Header--}}
                    <div class="card-header card-header-success">
                        <h4 class="card-title"> Listado de Backup </h4>
                    </div>
                    {{--Body--}}
                    <div class="card-body">
                        {{--tabla--}}
                        <div class="table-responsive">
                            <table class="table">
                                {{--Cabecera de Tabla--}}
                                <thead class="text-primary text-success">
                                <th>Copias de respaldo</th>                                
                                </thead>
                            </table>
                        </div>
                                
                                    <div class="card-body">
                                        <div class="row">
                                            <?php
                                             $directorio = 'C:\Users\Duawn\Documents\GitHub\EcommerceAgro\storage\app\agroshop/';
                                                
                                             if ($dir = opendir($directorio)) {
                                                    while ($archivo = readdir($dir)) {
                                                        if ($archivo != '.' && $archivo != '..') {                                                           
                                                            $ruta = $directorio.$archivo;
                                                            echo '<b>'."Archivos: ".'<b>'."<br>";
                                                            echo "<a href='$ruta' target='_blank'>$archivo</a><br>";
                                                                                                                                                                                    
                                                          
                                                        }
                                                        
                                                    }
                                                }
                                            ?>

                                        </div>

    
                                    </div>
                               
                               
                            
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
