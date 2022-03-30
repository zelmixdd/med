<?php
if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName'])) {
    $db = new mysqli("localhost", "root", "", "med");
    $_q = $db->prepare("INSERT INTO staff VALUES(NULL, ?, ?)");
    $_q->bind_param("ss", $_REQUEST['firstName'], $_REQUEST['lastName']);
    if($q->execute()) {
        echo "dodaj nowy personel";
    }
    else {
        echo '<form action="addStaff.php" method="post">
        <label for="firstName">Imię</label>
        <input type="text" name="firstName" id="firstName">
        <label for="lastName">Nazwisko</label>
        <input type="text" name="lastName" id="lastName">
        <input type="submit" value="dodaj nowy personel">
        </form>
        ';
    }
}







