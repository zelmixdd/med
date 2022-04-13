<?php
$db = new mysqli("localhost", "root", "", "med");
$q = $db->prepare("SELECT id, firstName, lastName FROM staff");
$q->execute();
$staffResult = $q->get_result();
?>
<form action="addAppointments.php">
    <label for="staffId">Wybierz lekarza:</label>
    <select name="staffId" id="staffId">
        <?php
            while($staffRow = $staffResult->fetch_assoc()) {
                $staffId = $staffRow['id'];
                $staffFirstName = $staffRow['firstName'];
                $staffLastName = $staffRow['lastName'];

                echo "<option value=\"$staffId\">$staffFirstName $staffLastName</option>";
            }
        ?>
        
    </select><br>
    <label for="startTime">Data początkowa:</label>
    <input type="datetime-local" name="startTime" id="startTime"><br>
    <label for="endTime">Data końcowa:</label>
    <input type="datetime-local" name="endTime" id="endTime"><br>
    <label for="interval">Interwał (min):</label>
    <input type="number" name="interval" id="interval" value="15"><br>
    <input type="submit" value="Rozpisz wizyty">
</form>

<?php
<<<<<<< HEAD
//sprawdz czy dostałeś komplet z formularza
=======

>>>>>>> a5612c5bdb0763362a562970a066ec142e3af68c
if(isset($_REQUEST['staffId']) && isset($_REQUEST['startTime']) && isset($_REQUEST['endTime']) && isset($_REQUEST['interval'])) {
    $staffId = $_REQUEST['staffId'];
    $startTime = strtotime($_REQUEST['startTime']);
    $endTime = strtotime($_REQUEST['endTime']);
<<<<<<< HEAD
    $interval = $_REQUEST['interval']*60; //interval w sekundach
=======
    $interval = $_REQUEST['interval']*60;
    
>>>>>>> a5612c5bdb0763362a562970a066ec142e3af68c
    $q = $db->prepare("INSERT INTO appointment VALUES (NULL, ?, ?)");
    for($i = $startTime; $i < $endTime; $i += $interval) {
        $date = date("Y-m-d H:i:s", $i);
        $q->bind_param("is", $staffId, $date);
        $q->execute();
    }
}
<<<<<<< HEAD

=======
>>>>>>> a5612c5bdb0763362a562970a066ec142e3af68c
?>