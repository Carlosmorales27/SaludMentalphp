<?php
include_once "vistas/topbar.php";
?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Lista de Encuestados</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="text-dark table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Folio</th>
                                            <th>Edad</th>
                                            <th>Género</th>
                                            <th>Estado Civil</th>
                                            <th>Cantidad de hijos</th>
                                            <th>Municipio</th>
                                            <th>Tiempo en Yucatán</th>
                                            <th>Nivel Ideacion Suicida</th>
                                            <th>Nivel Depresion</th>
                                            <th>Nivel Ansiedad</th>
                                            <th>Nivel Estres</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Folio</th>
                                            <th>Edad</th>
                                            <th>Género</th>
                                            <th>Estado Civil</th>
                                            <th>Cantidad de hijos</th>
                                            <th>Municipio</th>
                                            <th>Tiempo en Yucatán</th>
                                            <th>Nivel Ideacion Suicida</th>
                                            <th>Nivel Depresion</th>
                                            <th>Nivel Ansiedad</th>
                                            <th>Nivel Estres</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        include_once("Conexion.php");

                                        $slq = "SELECT * FROM datos_generales_appsi";
                                        $row;    
                                        $encuestados = $conexion->query($slq);

                                        if ($encuestados->num_rows >0) {
                                            while ($row = $encuestados->fetch_assoc()) {
                                            }
                                        }
                                        foreach ($encuestados as $row): ?>
                                        <tr>
                                            <td class="text-dark"><?php echo $row["folio"];?></td>
                                            <td class="text-dark"><?php echo  $row["edad"];?></td>
                                            <td class="text-dark"><?php echo  $row["genero"];?></td>
                                            <td class="text-dark"><?php echo  $row["edo_civil"];?></td>
                                            <td class="text-dark"><?php echo  $row["cantidad_hijos"];?></td>
                                            <td class="text-dark"><?php echo  $row["municipio"];?></td>
                                            <td class="text-dark"><?php echo  $row["tiempo_en_yuc"];?> años</td>
                                            <?php 
                                        $color_celda_c;
                                        $color_celda_d;
                                        $color_celda_a;
                                        $color_celda_e;    
                                        
                                        switch ($row["columbia"]) {
                                            case '0':
                                                $color_celda_c = "blue";
                                                break;
                                            case '1':
                                                $color_celda_c = "green";
                                                break;
                                            case '2':
                                                $color_celda_c = "yellow";
                                                break;    
                                                case '3':
                                                    $color_celda_c = "red";
                                                    break;
                                        }

                                        switch ($row["dass_21_depresion"]) {
                                            case '0':
                                                $color_celda_d = "blue";
                                                break;
                                            case '1':
                                                $color_celda_d = "green";
                                                break;
                                            case '2':
                                                $color_celda_d = "yellow";
                                                break;    
                                                case '3':
                                                    $color_celda_d= "orange";
                                                    break;
                                                case '4':
                                                    $color_celda_d = "red";
                                                    break;
                                        }
                                        switch ($row["dass_21_ansiedad"]) {
                                            case '0':
                                                $color_celda_a = "blue";
                                                break;
                                            case '1':
                                                $color_celda_a = "green";
                                                break;
                                            case '2':
                                                $color_celda_a = "yellow";
                                                break;    
                                                case '3':
                                                    $color_celda_a = "orange";
                                                    break;
                                                case '4':
                                                    $color_celda_a = "red";
                                                    break;
                                        }
                                        switch ($row["dass_21_estres"]) {
                                            case '0':
                                                $color_celda_e = "blue";
                                                break;
                                            case '1':
                                                $color_celda_e = "green";
                                                break;
                                            case '2':
                                                $color_celda_e = "yellow";
                                                break;    
                                                case '3':
                                                    $color_celda_e = "orange";
                                                    break;
                                                case '4':
                                                    $color_celda_e = "red";
                                                    break;
                                        }
                                        ?>
                                            <td class="text-dark" style="background-color: <?php echo $color_celda_c;?>"><?php echo  $row["columbia"];?></td>
                                            <td class="text-dark" style="background-color: <?php echo $color_celda_d;?>"><?php echo $row["dass_21_depresion"];?></td>
                                            <td class="text-dark" style="background-color: <?php echo $color_celda_a;?>"><?php echo  $row["dass_21_ansiedad"];?></td>
                                            <td class="text-dark" style="background-color: <?php echo $color_celda_e;?>"><?php echo $row["dass_21_estres"];?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                     </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


<? 
include_once "vistas/footer.php";

?>



</html>