<!DOCTYPE html>
<html lang="en" class="material-style layout-fixed">

<head>
    <?php include "components/head.html"; ?>
</head>

<body>
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <?php include "components/menu-lateral.html"; ?>
            <div class="layout-container">
                <?php include "components/nav-top.html"; ?>
                <div class="layout-content">
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <?php
                        include "controller/cconsultas.php";
                        $response = getConsultas();
                        // echo ($res[0]["fecha"]);
                        ?>
                        <!-- TU CONTENIDO -->
                        <form>
                            <div class="form-group">
                                <label class="form-label">Paciente</label>
                                <select class="custom-select">
                                    <option>Seleccione un paciente</option>
                                    <?php foreach ($response as $value) { ?>
                                        <option><?php echo $value['paciente']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Diagnostico</label>
                                <input type="text" class="form-control" placeholder="diagnostico">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Recomendacion</label>
                                <input type="text" class="form-control" placeholder="recomendacion">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="form-label">Medicamento</label>
                                    <input type="text" class="form-control" placeholder="medicamento">
                                    <input type="text" class="form-control" placeholder="medicamento">
                                    <input type="text" class="form-control" placeholder="medicamento">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label">Cantidad</label>
                                    <input type="text" class="form-control" placeholder="cantidad">
                                    <input type="text" class="form-control" placeholder="cantidad">
                                    <input type="text" class="form-control" placeholder="cantidad">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label">Indicacion</label>
                                    <input type="text" class="form-control" placeholder="indicacion">
                                    <input type="text" class="form-control" placeholder="indicacion">
                                    <input type="text" class="form-control" placeholder="indicacion">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect">
                                Registrar Consulta
                            </button>
                            <!-- TU CONTENIDO -->
                        </form>
                    </div>
                    <?php include "components/footer.html"; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include "components/scrips.html"; ?>
</body>

</html>