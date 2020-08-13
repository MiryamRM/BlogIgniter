    <!-- Main content -->
    <section class="content pt-3">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card bg-light">
                        <div class="card-header">
                            <h3>LISTADO ALUMNOS</h3>
                        </div>
                        <div class="card-body">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Curso</th>
                                        <th>Usuario</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($alumnos as $a) {
                                            echo "<tr id='rowalumno$a->alumno_id'><th>" . $a->alumno_id . "</th>
                                            <th>" . $a->nombre . "</th>
                                            <th>" . $a->apellidos . "</th>
                                            <th>" . $a->curso . "</th>
                                            <th>" . $a->user . "</th>
                                            <th>
                                                <button href='' class='btn btn-danger text-white eliminar' id='alumno-$a->alumno_id'>Eliminar 
                                                    <i class='fas fa-trash-alt'></i>
                                                </button>
                                            </th></tr>";
                                        } 
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Curso</th>
                                        <th>Usuario</th>
                                        <th>Opciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    
    <script>
        $('.eliminar').click(function(){
            var idalumno = this.id;
            var res = idalumno.split('-');
            var id = res[1];
            console.log(id);
            $.post('<?php echo base_url()?>welcome/eliminaralumno',{
                idalumno:id
            }).done(function(data){
                $('#rowalumno'+id).fadeOut();
            });
        })
        
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        /* $(document).ready(function() {
            $('#alumnos').DataTable({
                columnDefs: [{
                    targets: [0],
                    orderData: [0, 1]
                }, {
                    targets: [1],
                    orderData: [1, 0]
                }, {
                    targets: [4],
                    orderData: [4, 0]
                }]
            });
        }); */
    </script>