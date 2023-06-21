<?php

function getConsultas()
{
    $url = 'http://localhost:3001/consultas';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    // curl_setopt($ch, CURLOPT_HEADER, false);
    $response = curl_exec($ch);
    if (curl_errno($ch))
        echo curl_errno($ch);
    else
        $decode = json_decode($response,true);

    curl_close($ch);
    return $decode;
}

function getRecetas()
{
    $url = 'http://localhost:3001/recetas';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    // curl_setopt($ch, CURLOPT_HEADER, false);
    $response = curl_exec($ch);
    if (curl_errno($ch))
        echo curl_errno($ch);
    else
        $decode = json_decode($response,true);

    curl_close($ch);
    return $decode;
}
