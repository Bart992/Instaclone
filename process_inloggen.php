<?php
session_start();


include "connectvars.php";

$dbc = mysqli_connect(HOST,USER,PASS,DBNAME) or die('Er is een fout opgetreden tijdens het verbinden met de Database!');

if (mysqli_connect_errno())
{
echo 'MySQLi Connection was not established: ' . mysqli_connect_error();
}

if(isset($_POST['submit'])){
$_SESSION['username'] = $_POST['username'];

$username = mysqli_real_escape_string($dbc,$_POST['username']);
$wachtwoord = mysqli_real_escape_string($dbc,$_POST['wachtwoord']);
$hashed_password = hash('sha512', $wachtwoord);

$sel_user = "SELECT * FROM users WHERE username='$username' AND wachtwoord='$hashed_password'" or die('Er is een fout opgetreden tijdens het communiceren met de Database!');

$run_user = mysqli_query($dbc, $sel_user);
$check_user = mysqli_num_rows($run_user);

if($check_user > 0){

$_SESSION['username']=$username;
echo "<script>window.open('index.php','_self')</script>";
}

else {
echo "<script>alert('Gebruikersnaam of wachtwoord is incorrect, probeer het opnieuw!')
      window.open('inloggen.php','_self')</script>";
}

}

?>
