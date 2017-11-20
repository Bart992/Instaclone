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
  <div class="login">
    <h2><span style="letter-spacing: 3px;">INLOGGEN</span></h2>
    <form method="post" action="process_inloggen.php">
      Gebruikersnaam:
        <p><input class="logininput" type="text2" name="text" placeholder="Vul hier je gebruikersnaam in" required/>
      <p>Wachtwoord:
        <p><input class="logininput" type="password" name="password" placeholder="Vul hier je wachtwoord in" minlength=5 required/>
        <p><input type="submit" name="submit" value="Inloggen"/>
    </form>

  </div>
</div>
