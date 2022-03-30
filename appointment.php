<?php

if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName'])){
    $q->prepare("INSERT INTO patient VALUES (NULL, ?, ?, ?, ?)");
    $q->bind_param("ssss", $_REQUEST['firstName'], $_REQUEST['lastName'], $_REQUEST['phone'], $_REQUEST['pesel']);
    $q->execute();
    $patientId = $db->insert_id;
    $q->prepare("INSERT INTO patientappointment VALUES (NULL, ?, ?,)");
    $q->bind_param("ii",  $patientId, $appointmentId);
    $q->execute();
}   else {
    $q = $db->prepare("SELECT  * FROM patient WHERE pesel = ?");
    $q->bind_param("s", $_REQUEST['pesel']);
    $q->execute();
    $patientResult = $q->get_result();
    $patient = $patientResult->fetch_assoc();
    $patientId = $patient['id'];
    $q->prepare("INSERT INTO patientappointment VALUES (NULL, ?, ?, ?");
    $q->bind_param("ii", $patientId, $appointmentId);
    $q->execute();
}
$db = new mysqli("localhost", "root", "", "med");
$appointmentId = $_REQUEST['id'];
$q = $db->prepare("SELECT * FROM appointment WHERE id = ?");
$q->bind_param("i", $appointmentId);
if($q && $q->execute()) {
    //mamy tylko jedno takie spotkanie
    $appointment = $q->get_result()->fetch_assoc();
    $appointmentDate = $appointment['date'];
    $appointmentTimestamp = strtotime($appointmentDate);
    echo "Zapis na wizytę w terminie ".date("j.m H:i", $appointmentTimestamp)."<br>";
}
if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName']) 
            && $_REQUEST['phone']) {
                //zapisujemy na wizytę
    $q->prepare("INSERT INTO patient VALUES (NULL, ?, ?, ?)");
    $q->bind_param("sss", $_REQUEST['firstName'], $_REQUEST['lastName'], $_REQUEST['phone']);
    $q->execute();
    $patientId = $db->insert_id;
    $q->prepare("INSERT INTO patientappointment VALUES (NULL, ?, ?)");
    $q->bind_param("ii",  $patientId, $appointmentId);
    $q->execute();
    echo "Zapisano na wizytę!";
}
