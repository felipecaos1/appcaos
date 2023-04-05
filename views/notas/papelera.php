
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Papelera <span class="h5 mb-0 font-weight-bold text-gray-800">(<?=helper::getNoTareas('papelera')?>)</span></h1>
        <a href="#"  class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                class="fas fa-trash fa-sm text-white"></i> Vaciar papelera</a>
    </div>


    <!-- Content Row tablero de notas-->

    <div class="row">

        <?php while($tarea = $lista_tareas->fetch_object()):?>
        <!-- Tarjeta de notas -->
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <?=$tarea->titulo?>
                            <br>
                            <span class="text-gray-600"><small>Id: <?=$tarea->id?></small></span>
                        </h6>
                        <br>
                        
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Opciones:</div>
                                <a class="dropdown-item text-danger " href="<?=BASE_URL?>tarea/eliminar&id=<?=$tarea->id?>">Eliminar</a>
                                <!-- <a class="dropdown-item" href="#">Another action</a> -->
                                <!-- <div class="dropdown-divider"></div> -->
                                <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                    <?=$tarea->descripcion?> 
                    </div>

                    <div class="card-footer">
                    <?=$tarea->cat_nombre?> 
                    </div>
                
                </div>
            </div>
        <!-- Fin de tarjeta -->
        <?php endwhile;?>

    </div>


</div>


<!-- /.container-fluid -->