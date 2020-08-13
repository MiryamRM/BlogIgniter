    <!-- Main content -->
    <section class="content pt-3">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card bg-light">
                        <div class="card-header">
                            <h3>Mis Tareas</h3>
                        </div>
                        <div class="card-body">

                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>fecha</th>
                                        <th>archivos</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($tareas as $a) {
                                        echo "<tr><th>" . $a->tarea_id . "</th>
                                            <th>" . $a->nombre . "</th>
                                            <th>" . $a->descripcion . "</th>
                                            <th>" . $a->fecha . "</th>";
                                        if ($a->archivo != "") {
                                            echo "<th>
                                                        <a href=" . base_url() . "uploads/" . $a->archivo . " download>Descargar</a>
                                                    </th>";
                                        } else {
                                            echo "<th>No hay archivos</th>";
                                        }
                                        echo "<th>
                                                <button href='' class='btn btn-danger text-white eliminar' id=''>Eliminar 
                                                    <i class='fas fa-trash-alt'></i>
                                                </button>
                                            </th></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>