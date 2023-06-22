<?php
class Controler
{
    var $endpoint = 'http://localhost/msApi';
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
        $url = $this->endpoint . "/consultas/pac/'".$nombre."'";
        // echo $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($ch, CURLOPT_HEADER, false);
        $response = curl_exec($ch);
        if (curl_errno($ch))
             echo  "</br>".curl_errno($ch);
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

    function addReceta($idConsulta,$recomendacion)
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

    function addMedicamento($nombre,$cantidad,$indicacion,$idreceta)
    {
        $curl = curl_init();
        $url = $this->endpoint . '/medicamento';
        // echo $url;
        $fields = array(
            "nombre"=> $nombre,
            "cantidad"=> $cantidad,
            "indicacion"=> $indicacion,
            "idreceta"=> $idreceta
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
    $idReceta = intval($res->getRecetasCantidad()) ;
    if ($_GET['med1']!='' && $_GET['cant1']!='' && $_GET['ind1']!='') {
        $res->addMedicamento($_GET['med1'],$_GET['cant1'],$_GET['ind1'],$idReceta+1);
    }
    if ($_GET['med2']!='' && $_GET['cant2']!='' && $_GET['ind2']!='') {
        $res->addMedicamento($_GET['med2'],$_GET['cant2'],$_GET['ind2'],$idReceta+1);
    }
    if ($_GET['med3']!='' && $_GET['cant3']!='' && $_GET['ind3']!='') {
        $res->addMedicamento($_GET['med3'],$_GET['cant3'],$_GET['ind3'],$idReceta+1);
    }
    header("Location: http://localhost/hospital_parcial2/mis-consultas.php");
}
