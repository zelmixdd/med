<?php 
$appointmentId = $_REQUEST['id'];


?>

<div style="display:flex; flex-direction; row">
    <div style="flex-grow:1;">
    <h1>Zaloguj się</h1>
    <form action="appointment.php" method="POST">
        <label for="pesel">PESEL</label>
        <input type="text" name="pesel" id="pesel">
        <label for="pesel">Numer telefonu</label>
        <input type="text" name="phone" id="phone">
        <input type="hidden" name="appointmentID" value="<?php echo $appointmentid; ?>">
        <input type="submit" value="Zaloguj się">
    </form>
</div>
    <div style="flex-grow:1;"><h1>Zarejestruj się</h1></div>
    <form action="appointment.php" method="POST">
        <label for="firstName">Imię</label>
        <input type="text" name="firstName" id="firstName">
        <label for="lastName">Nazwisko</label>
        <input type="text" name="lastName" id="lastName">
        <label for="pesel">PESEL</label>
        <input type="text" name="pesel" id="pesel">
        <label for="pesel">Numer telefonu</label>
        <input type="text" name="phone" id="phone">
        <input type="hidden" name="appointmentID" value="<?php echo $appointmentid; ?>">
        <input type="submit" value="Zaloguj się">
</div>