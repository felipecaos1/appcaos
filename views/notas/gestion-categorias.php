
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categorías</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus fa-sm text-white-50"></i> Nueva Categoria</a>
    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Añadir categoría</h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <form class="user" action="<?=BASE_URL?>categorias/guardar" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                            id="exampleInputEmail" aria-describedby="emailHelp"
                            placeholder="Categoría" name='nombre'>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Añadir">
                    
                </form>  
                </div>
            
            </div>
        </div>
        <div class="col-xl-8 col-lg-8">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de categorías</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php while($cat = $lista_categorias->fetch_object()):?>
                                            <tr>
                                                <td><?=$cat->id?></td>
                                                <td><?=$cat->nombre?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <a class="" href="<?=BASE_URL?>categorias/edit&id=<?=$cat->id?>">
                                                                <i class="fas fa-fw fa-edit"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-2">
                                                            <a class="" data-toggle="modal" data-target="#exampleModal" style="color:#cb3234;cursor:pointer" onClick="id_delete('<?=BASE_URL?>categorias/delete&id=<?=$cat->id?>')">
                                                                <i class="fas fa-fw fa-trash"></i>
                                                            </a>
                                                            
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoría</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de eliminar la categoria?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <a type="button" href="" class="btn btn-primary" id="confir">Eliminar</a>
                                </div>
                                </div>
                            </div>
                            </div>
            
            </div>
        </div>
    </div

</div>