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
          <li><a href="./process_uitloggen.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
          <li><a href="./registreren.php"><i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
          <li><a href="./foto_uploaden.php"><i class="fa fa-camera" aria-hidden="true"></i></a></li>
      </ul>
    </div>
    </div>



      <div class="body-wrap">


      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="searchterm" class="searchbar" placeholder="&#xf002; Typ hier je zoekopdracht..." required/>
        <input type="submit" name="submit_search" style="display: none">
      </form>



      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <select name="sorteermenu" onchange="this.form.submit();">
          <option value="">Sorteren</option>
          <option value="date_asc">Datum Oplopend</option>
          <option value="date_desc">Datum Aflopend</option>
          <option value="descr_asc">Beschrijving Oplopend</option>
          <option value="descr_desc">Beschrijving Aflopend</option>
          <option value="random">Random</option>
        </select>
      </form>


<?php

            require_once('connectvars.php');

            $column = 'id';
            $order = 'DESC';


            $dbc = mysqli_connect(HOST,USER,PASS,DBNAME) or die ('Error');

            if(isset($_POST['submit_search'])) {
              $searchterm = mysqli_real_escape_string($dbc, trim($_POST['searchterm']));
              $searchterm = '%' . $searchterm . '%';
            } else {
              $searchterm = '%';
            }



            if (isset($_POST['sorteermenu'])){
              switch($_POST['sorteermenu']){
                case 'date_asc': $column = 'date';
                                $order = 'ASC';
                                break;

                case 'date_desc': $column = 'date';
                                $order = 'DESC';
                                break;

                case 'descr_asc': $column = 'description';
                                $order = 'ASC';
                                break;

                case 'descr_desc': $column = 'description';
                                $order = 'DESC';
                                break;

                case 'random':     $column = 'rand()';
                                $order = '';
                                break;
              }
            }



            $query = "SELECT * FROM image WHERE description LIKE '$searchterm' ORDER BY $column $order";






            $result = mysqli_query($dbc, $query) or die ('Error querying');
            while ($row = mysqli_fetch_array($result)) {
                $target = $row['target'];
                $date = $row['date'];
                $username = $row['username'];
                $description = $row['description'];
                echo '<div class="posts">';
                echo 'Geüpload door: ' . $username . '<br>' . '<br>' . 'Geüpload op: ' . $date . '<br>' . '<br>';
                echo '<img src="' . $target . '" /><br>';
                echo '<br>' . $description . '<br>' . '<br>' . '</div>';
            }
            mysqli_close($dbc);

  ?>





      </div>






  </body>
</html>
