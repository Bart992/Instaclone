<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="https://use.fontawesome.com/9f9abd6d60.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>InstaClone</title>
</head>
<body>
<div class="header">
    <div class="logo">
        <h1><i class="fa fa-instagram" aria-hidden="true"></i> Instaclone</h1>
    </div>

    <div class="menu">
        <ul>
            <li><a href="./index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li><a href="./inloggen.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
            <li><a href="./registreren.php"><i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
            <li><a href="./foto_uploaden.php"><i class="fa fa-camera" aria-hidden="true"></i></a></li>
        </ul>
    </div>
    </div>

    <div class="body-wrap">
  <div class="registreren">
    <h2><span style="letter-spacing: 3px;">REGISTREREN</span></h2>
    <form method="post" action="process_registreren.php">
      Gebruikersnaam:
        <p><input class="logininput" type="text2" name="username" placeholder="Vul hier je gebruikersnaam in" required/>
      <p>E-mailadres:
        <p><input class="mailinput" type="email" name="mailadres" placeholder="Vul hier je e-mailadres in" required/>
      <p>Wachtwoord:
        <p><input class="wachtwoordinput" type="password" name="wachtwoord" placeholder="Vul hier je Wachtwoord in" required/>
      <p>Herhaal Wachtwoord:
        <p><input class="wachtwoordinput" type="password" name="wachtwoord" placeholder="Herhaal je Wachtwoord" required/>
        <p><label><span style="font-size: 15px; margin-bottom: 12px;"><input class="checkbox" type="checkbox" required>Ik ga akkoord met de voorwaarden</span></label>
        <p><input type="submit" name="submit" value="Registreren"/>

    </form>
  </div>
