<?php
class Controler
{
    var $endpoint = 'http://localhost/msApi';
    var $endpointmongo = "http://23.23.183.202:3000";
    function getConsultas()
    {
        $url = $this->endpoint . "/consultas";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($ch, CURLOPT_HEADER, false);
        $response = curl_exec($ch);
        if (curl_errno($ch))
            echo curl_errno($ch);
        else
            $decode = json_decode($response, true);

        curl_close($ch);
        return $decode;
    }

    function getConsultasPaciente($nombre)
    {
        $url = $this->endpoint . "/consultas/pac/'" . $nombre . "'";
        // echo $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($ch, CURLOPT_HEADER, false);
        $response = curl_exec($ch);
        if (curl_errno($ch))
            echo  "</br>" . curl_errno($ch);
        else
            $decode = json_decode($response, true);

        curl_close($ch);
        return $decode;
    }
    
    function getPacientesporDoctor($nombre)
    {
        $url = $this->endpoint . "/consultas/doc/'" . $nombre . "'";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($ch, CURLOPT_HEADER, false);
        $response = curl_exec($ch);
        if (curl_errno($ch))
            echo  "</br>" . curl_errno($ch);
        else
            $decode = json_decode($response, true);

        curl_close($ch);
        return $decode;
    }

    function getRecetas()
    {
        $url = $this->endpoint . '/recetas';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($ch, CURLOPT_HEADER, false);
        $response = curl_exec($ch);
        if (curl_errno($ch))
            echo curl_errno($ch);
        else
            $decode = json_decode($response, true);

        curl_close($ch);
        return $decode;
    }

    function getMedicamentos()
    {
        $url = $this->endpoint . '/kpi1';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($ch, CURLOPT_HEADER, false);
        $response = curl_exec($ch);
        if (curl_errno($ch))
            echo curl_errno($ch);
        else
            $decode = json_decode($response, true);

        curl_close($ch);
        return $decode;
    }

    function addConsulta($id, $diagnostico)
    {
        $curl = curl_init();
        $url = $this->endpoint . '/consultas/atencion/' . $id;
        // echo $url;
        $fields = array(
            "diagnostico" => $diagnostico
        );
        $fields_string = json_encode($fields);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
        $data = curl_exec($curl);
        curl_close($curl);
    }

    function addReceta($idConsulta, $recomendacion)
    {
        $curl = curl_init();
        $url = $this->endpoint . '/recetas';
        // echo $url;
        $fields = array(
            "recomendacion" => $recomendacion,
            "idconsulta" => $idConsulta
        );
        $fields_string = json_encode($fields);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
        $data = curl_exec($curl);
        curl_close($curl);
    }

    function getRecetasCantidad()
    {
        $url = $this->endpoint . '/recetas/cantidad';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($ch, CURLOPT_HEADER, false);
        $response = curl_exec($ch);
        if (curl_errno($ch))
            echo curl_errno($ch);
        else
            $decode = json_decode($response, true);
        curl_close($ch);
        return $decode;
    }

    function addMedicamento($nombre, $cantidad, $indicacion, $idreceta)
    {
        $curl = curl_init();
        $url = $this->endpoint . '/medicamento';
        // echo $url;
        $fields = array(
            "nombre" => $nombre,
            "cantidad" => $cantidad,
            "indicacion" => $indicacion,
            "idreceta" => $idreceta
        );
        $fields_string = json_encode($fields);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
        $data = curl_exec($curl);
        curl_close($curl);
    }

    function getSalas()
    {
        $url = $this->endpoint . "/sala/libre";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($ch, CURLOPT_HEADER, false);
        $response = curl_exec($ch);
        if (curl_errno($ch))
            echo curl_errno($ch);
        else
            $decode = json_decode($response, true);

        curl_close($ch);
        return $decode;
    }

    function addInternacion($fechaini, $fechafin, $cantdias, $doctor, $idsala, $idconsulta)
    {
        $curl = curl_init();
        $url = $this->endpoint . '/internacion';
        // echo $url;
        $fields = array(
            "fechaini" => $fechaini,
            "fechafin" => $fechafin,
            "cantdias" => $cantdias,
            "doctor" => $doctor,
            "idsala" => $idsala,
            "idconsulta" => $idconsulta
        );
        $fields_string = json_encode($fields);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
        $data = curl_exec($curl);
        curl_close($curl);
    }

    function login($username, $imagen_path)
    {
        $curl = curl_init();
        $url = $this->endpointmongo . '/login';
        $img = new CURLFile($imagen_path);
        $fields = array(
            "usuario" => $username,
            "foto" => $img
        );
        // $fields_string = json_encode($fields);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
        $response = curl_exec($curl);
        if (curl_errno($curl))
            echo curl_errno($curl);
        else
            $decode = json_decode($response, true);

        curl_close($curl);
        return $decode;
    }

    function registro($nombre,$email,$usuario,$imagen_path)
    {
        $curl = curl_init();
        $url = $this->endpointmongo . '/pacientes';
        $img = new CURLFile($imagen_path);
        $fields = array(
            "nombre" => $nombre,
            "email" => $email,
            "usuario" => $usuario,
            "tipo" => "Paciente",
            "foto" => $img,
        );
        // $fields_string = json_encode($fields);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
        $response = curl_exec($curl);
        if (curl_errno($curl))
            echo curl_errno($curl);
        else
            $decode = json_decode($response, true);

        curl_close($curl);
        return $decode;
    }

    function getDoctores()
    {
        $url = $this->endpointmongo . "/doctores";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($ch, CURLOPT_HEADER, false);
        $response = curl_exec($ch);
        if (curl_errno($ch))
            echo curl_errno($ch);
        else
            $decode = json_decode($response, true);

        curl_close($ch);
        return $decode;
    }

    function sacar_ficha($nombrePaciente,$nombreDoctor,$fecha,$hora)
    {
        $curl = curl_init();
        $url = $this->endpointmongo . '/fichas';
        $fields = array(
            "nombrePaciente" => $nombrePaciente,
            "nombreDoctor" => $nombreDoctor,
            "numero" => 1,
            "fecha" => $fecha,
            "hora" => $hora
        );
        $fields_string = json_encode($fields);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
        $response = curl_exec($curl);
        if (curl_errno($curl))
            echo curl_errno($curl);
        else
            $decode = json_decode($response, true);

        curl_close($curl);
        return $decode;
    }
    
    function registrarConsulta($fecha, $hora,$doctor,$paciente)
    {
        $curl = curl_init();
        $url = $this->endpoint . '/consultas';
        // echo $url;
        $fields = array(
            "fecha" => $fecha,
            "hora" => $hora,
            "diagnostico" => null,
            "doctor" => $doctor,
            "paciente" => $paciente
        );
        $fields_string = json_encode($fields);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
        $data = curl_exec($curl);
        curl_close($curl);
    }
}

if (isset($_GET['btn_regConsulta'])) {
    $res = new Controler;
    $res->addConsulta($_GET['id'], $_GET['diagnostico']);
    $res->addReceta($_GET['id'], $_GET['recomend']);
    $cantidad = $res->getRecetasCantidad();
    $idReceta = intval($cantidad[0]["cantidad"]);
    if ($_GET['med1'] != '' && $_GET['cant1'] != '' && $_GET['ind1'] != '') {
        $res->addMedicamento($_GET['med1'], $_GET['cant1'], $_GET['ind1'], $idReceta);
    }
    if ($_GET['med2'] != '' && $_GET['cant2'] != '' && $_GET['ind2'] != '') {
        $res->addMedicamento($_GET['med2'], $_GET['cant2'], $_GET['ind2'], $idReceta);
    }
    if ($_GET['med3'] != '' && $_GET['cant3'] != '' && $_GET['ind3'] != '') {
        $res->addMedicamento($_GET['med3'], $_GET['cant3'], $_GET['ind3'], $idReceta);
    }
    header("Location: http://localhost/hospital_parcial2/mis-consultas.php");
}

if (isset($_GET['reg_internacion'])) {
    $res = new Controler;
    // echo $_GET["id"];
    // echo "</br>";   
    // echo $_GET["fecha"];
    // echo "</br>";
    // echo $_GET["idsala"];
    $res->addInternacion($_GET["fecha"], null, null, "Ana Contreras", $_GET["idsala"], $_GET["id"]);

    header("Location: http://localhost/hospital_parcial2/mis-consultas.php");
}
if (isset($_GET['btn_sacarficha'])) {
    session_start();
    $res = new Controler;
    $newDate = date("d-m-Y", strtotime($_GET["fecha"])); 
    echo $_GET["hora"];
    echo $_GET["doctor"];
    echo $_SESSION["nombre"];
    $res->sacar_ficha($_SESSION["nombre"],$_GET["doctor"],$newDate,$_GET["hora"]);
    $res->registrarConsulta($newDate, $_GET["hora"],$_GET["doctor"],$_SESSION["nombre"]);
    header("Location: http://localhost/hospital_parcial2/mis-consultas.php");
}


