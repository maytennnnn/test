<?php

require_once '../BaseModel.php';

if (isset($_POST["region"])) {

    $result = array(
        'message' => 'Запись внесена в БД',
    	'region'  => $_POST["region"],
    	'date'    => $_POST["date"],
    	'courier' => $_POST["courier"]
    ); 

    $db = new BaseModel();
    $courier = BaseModel::getidcourier($result["courier"]);
    $region  = BaseModel::getidregion($result["region"]);

    $arrive = BaseModel::settrips($region, $result["date"], $courier, $result["region"]);
    $result['arrival'] = $arrival;
    echo json_encode($result); 
}