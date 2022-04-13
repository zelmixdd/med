
<?php
$db = new mysqli("localhost", "root", "", "med");
$appointmentId = $_REQUEST['appointmentId'];
$q = $db->prepare("SELECT * FROM appointment WHERE id = ?");
$q->bind_param("i", $appointmentId);
if($q && $q->execute()) {

    $appointment = $q->get_result()->fetch_assoc();
    $appointmentDate = $appointment['date'];
    $appointmentTimestamp = strtotime($appointmentDate);
    echo "Zapis na wizytę w terminie ".date("j.m H:i", $appointmentTimestamp)."<br>";
}

if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName'])) {

    $q->prepare("INSERT INTO patient VALUES (NULL, ?, ?, ?, ?)");
    $q->bind_param("ssss", $_REQUEST['firstName'], $_REQUEST['lastName'], 
                    $_REQUEST['phone'], $_REQUEST['pesel']);
    $q->execute();
    $patientId = $db->insert_id;
    $q->prepare("INSERT INTO patientappointment VALUES (NULL, ?, ?)");
    $q->bind_param("ii", $patientId, $appointmentId);
    $q->execute();
    echo "Zapisano na wizytę!";
} else {

    $q = $db->prepare("SELECT * FROM patient WHERE pesel = ?");
    $q->bind_param("s", $_REQUEST['pesel']);
    $q->execute();
    $patientResult = $q->get_result();
    if($patientResult->num_rows == 1) {
        
        $patient = $patientResult->fetch_assoc();
        $patientId = $patient['id'];
        $q->prepare("INSERT INTO patientappointment VALUES (NULL, ?, ?)");
        $q->bind_param("ii", $patientId, $appointmentId);
        $q->execute();
        echo "Zapisano na wizytę!";
    } else {
        echo "Nie ma takiego pacjenta!";
    }
    
}

?>

<?php

$db = new mysqli("localhost", "root", "", "med");
$appointmentId = $_REQUEST['id'];
$q = $db->prepare("SELECT * FROM appointment WHERE id = ?");
$q->bind_param("i", $appointmentId);
if($q && $q->execute()) {
    $appointment = $q->get_result()->fetch_assoc();
    $appointmentDate = $appointment['date'];
    $appointmentTimestamp = strtotime($appointmentDate);
    echo "Zapis na wizytę w terminie ".date("j.m H:i", $appointmentTimestamp)."<br>";
}
if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName']) 
            && $_REQUEST['phone']) {
    $q->prepare("INSERT INTO patient VALUES (NULL, ?, ?, ?)");
    $q->bind_param("sss", $_REQUEST['firstName'], $_REQUEST['lastName'], $_REQUEST['phone']);
    $q->execute();
    $patientId = $db->insert_id;
    $q->prepare("INSERT INTO patientappointment VALUES (NULL, ?, ?)");
    $q->bind_param("ii", $appointmentId, $patientId);
    $q->execute();
    echo "Zapisano na wizytę!";
} else { 
    ?>
        <form action="appointment.php">
        Imię: <input type="text" name="firstName">
        Nazwisko: <input type="text" name="lastName">
        Telefon: <input type="text" name="phone">
        <input type="hidden" value="<?php echo $appointmentId ?>" name="id">
        <input type="submit" value="Zapisz wizytę">
        </form>
    <?php

}
?>
