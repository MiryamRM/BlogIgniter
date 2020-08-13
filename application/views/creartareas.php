    <!-- Main content -->
    <section class="content pt-3">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card bg-light">
                        <div class="card-header">
                            <h3>Tareas</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-panel">
                                <form class="form-horizontal style-form" method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nombre tarea</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name='nombre'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name='descripcion'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Fecha de finalizacion</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="fecha">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Archivos adjuntos</label>
                                        <div class="col-sm-10">
                                            <input class="form-control"  type="file" name="archivo">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Curso</label>
                                        <div class="col-sm-10">
                                            <select name="curso">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Guardar</button>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>