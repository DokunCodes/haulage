<?php


include_once("Crud.php");

$crud = new Crud();

if (isset($_POST["fullname"])) {

    $fullname = $crud->escape_string($_POST['fullname']);
    $email = $crud->escape_string($_POST['email']);
    $phone = $crud->escape_string($_POST['phone']);
    $height = $crud->escape_string($_POST['height']);
    $width = $crud->escape_string($_POST['width']);
    $depth = $crud->escape_string($_POST['depth']);
    $weight = $crud->escape_string($_POST['weight']);
    $origin = $crud->escape_string($_POST['origin']);
    $origin_lat = $crud->escape_string($_POST['originLat']);
    $origin_lng = $crud->escape_string($_POST['originLng']);
    $desc = $crud->escape_string($_POST['description']);
    $package = $crud->escape_string($_POST['package']);
    $destination = $crud->escape_string($_POST['destination']);
    $destLat = $crud->escape_string($_POST['destLat']);
    $destLng = $crud->escape_string($_POST['destLng']);


    $track = $crud->generateTrackingNo();


            if ($crud->execute("INSERT INTO orders VALUES ($track,'$fullname','$email','$phone','$height','$width','$depth','$weight','$desc','$origin','$origin_lat','$origin_lng','$destination','$destLat','$destLng','$package',NOW())") != false) {

                echo json_encode(array("success", $track));
            }
            else echo $crud->getError();




}
