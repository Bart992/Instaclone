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
  <div class="uploaden">
    <h2><span style="letter-spacing: 3px;">UPLOADEN</span></h2>
    <p><img src="test-img.png" id="preview" alt="PreviewImage" style="height: 150px"/>
    <p><span style="line-height: 50px;">Upload hier een foto om met anderen te delen.</span>


      <form enctype="multipart/form-data" method="post" action="#" id="upload-form">
      <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
      <label class="upload">
      <input type="file" accept=".png, .jpg, .jpeg" name="image" onchange="readURL(this);" />
      <span><i class="fa fa-upload" aria-hidden="true"></i>  Foto uploaden </span>
      </label>
      <label class="upload2" for="description">Omschrijving (Max 140 tekens)</label>
      <textarea name="description" id="description"></textarea>
      <input type="submit" name="submit" value="Uploaden &#xf093;"  />
      </form>

  <?php


        if(isset($_POST['submit'])) {
            require_once('connectvars.php');
           $dbc = mysqli_connect(HOST,USER,PASS,DBNAME) or die ('Error connecting');



           $description = mysqli_real_escape_string($dbc,trim($_POST['description']));
           $target = 'images/' . time() . $_FILES['image']['name'];
           $temp = $_FILES['image']['tmp_name'];
           if(!empty($description)){
               if(move_uploaded_file($temp,$target)){
                   echo '<br>Gelukt<br>';
                   $query = "INSERT INTO image VALUES (0,NOW(),'$description','$target','Bart')";
                   $result = mysqli_query($dbc,$query) or die ('Error querying.');
               }else{
                   echo '<br> Mislukt';}

               }
           }



  ?>


  </div>
  </div>

<script src="script.js"></script>

</body>
</html>
