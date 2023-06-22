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
                        <!-- TU CONTENIDO -->
                        <form method="GET" action="controller/cconsultas.php">
                            <input type="text" class="form-control" name="id" hidden value='<?php echo $_GET["id"] ?>'>
                            <div class="form-group">
                                <label class="form-label">Paciente</label>
                                <input type="text" class="form-control" readonly
                                placeholder="paciente" value='<?php echo rawurldecode($_GET["paciente"]); ?>'>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Diagnostico</label>
                                <input type="text" class="form-control" name="diagnostico" placeholder="diagnostico">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Recomendacion</label>
                                <input type="text" class="form-control" name="recomend" placeholder="recomendacion">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="form-label">Medicamento</label>
                                    <input type="text" class="form-control" name="med1" placeholder="medicamento">
                                    <input type="text" class="form-control" name="med2" placeholder="medicamento">
                                    <input type="text" class="form-control" name="med3" placeholder="medicamento">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" name="cant1" placeholder="cantidad">
                                    <input type="number" class="form-control" name="cant2" placeholder="cantidad">
                                    <input type="number" class="form-control" name="cant3" placeholder="cantidad">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label">Indicacion</label>
                                    <input type="text" class="form-control" name="ind1" placeholder="indicacion">
                                    <input type="text" class="form-control" name="ind2" placeholder="indicacion">
                                    <input type="text" class="form-control" name="ind3" placeholder="indicacion">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <button type="submit" name="btn_regConsulta"  class="btn btn-primary waves-effect">
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