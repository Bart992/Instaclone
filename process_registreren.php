<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registreren | InstaClone</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/0eb2251b78.js"></script>
</head>
<body>
<div class="body-background">
  <div class="login">
    <h2><span style="letter-spacing: 3px;">REGISTRATIE BEVESTIGING</span></h2>

    <?php
      include "connectvars.php";

      $dbc = mysqli_connect(HOST,USER,PASS,DBNAME) or die('Er is een fout opgetreden tijdens het verbinden met de Database!');

      if (!isset($_POST['submit'])) {
        echo 'Sorry, je hoort hier niet te zijn <p>';
        echo '<a href="registreren.php">Klik hier om een account aan te maken.</a>';
        exit();
      }

      $username = mysqli_real_escape_string($dbc,trim($_POST['username']));

      if (isset($_POST['submit'])){
      $check=mysqli_query($dbc,"SELECT * FROM users WHERE username='$username'");
      $checkrows=mysqli_num_rows($check);

     if($checkrows>0) {
        echo 'Een account met gebruikersnaam <strong>'. $username . '</strong> bestaat al.
              <p><a href="registreren.php">Klik hier om een ander account aan te maken</a>';
        exit();
     } else {


      $mailadres = mysqli_real_escape_string($dbc,trim($_POST['mailadres']));
      $wachtwoord = mysqli_real_escape_string($dbc,trim($_POST['wachtwoord']));
      $hashed_wachtwoord = hash('sha512', $wachtwoord);

      $random_number = rand(1000, 9999);
      $hashcode = hash('sha512', $random_number);

      $query = "INSERT INTO users
                VALUES (0,'$username','$hashed_wachtwoord','$mailadres','$hashcode',0)";
      $result = mysqli_query($dbc,$query) or die ('Error inserting user.');


      $to = $_POST ['mailadres'];
      $subject = 'Instaclone activatie';
      $msg = '
        <html>
        <head>
          <title>Instaclone account activatie</title>
          <style>
            body {margin: 0 auto; font-family: sans-serif; background: #E6E6E6; color: #000; text-align: center;}
            table.logo {margin: 50px auto; text-align: center;}
            table.content {margin: 0 auto; text-align: center;}
            a {color: #c13584; text-decoration: none;}
          </style>
        </head>

        <body style="margin: 0 auto; font-family: sans-serif; background: #E6E6E6; color: #000; text-align: center;">
          <table class="logo" cellspacing="0" style="background: #fff; width: 600px; padding: 25px; border-radius: 8px;">
          </table>

          <table class="content" cellspacing="0" style="background: #fff; width: 600px; height: 750px; padding: 25px; border-radius: 8px;">
            <tr>
              <p><p><p><p><span style="font-size: 20px;">Welkom bij Instaclone <strong><span style="color: #c13584;">'. $username .'</span></strong></span>
              <p>Om je account te activeren moet je op de onderstaande link klikken</p>
              <a href="http://22683.hosts.ma-cloud.nl/bewijzenmap/p1.3/bap/Instaclone/verify_registreren.php?mailadres=' . $mailadres . '&hashcode=' . $hashcode . '">Klik hier om je e-mail te bevestigen</a>
            </tr>
          </table>

        </body>
        </html>
        ';

      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= 'From: 22683@ma-web.nl' . "\r\n";
      $headers .= '' . "\r\n";

      if (mail($to, $subject, $msg, $headers))
      {
        echo ('<p>Er is een bevestigingsmail verzonden naar <span style="color: #f77737;"><strong>' . $mailadres . '</strong></span><p>Volg daar de instructies om je accountregistratie te voltooien</p>');
      }
      else {
        echo ('<p>Er is een fout opgetreden tijdens het verzenden van de mail. <a href="registreren.php">Probeer het hier opnieuw.</a>');
      }


    }
    };

    ?>

  </div>
</div>

</body>
</html>
