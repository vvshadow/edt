
<!DOCTYPE html>
<html>
<head>
  <title>Supprimer l'objectif</title>
  <link rel="stylesheet" type="text/css" href="supobj.css">

<body>

<?php
  session_start();
  $bdd = new PDO("mysql:host=127.0.0.1;dbname=edt", "root", "");
 if(isset($_SESSION['id']))
{
  $getid = intval($_GET['id']);

  
  $requser = $bdd->prepare('SELECT * FROM obj WHERE id = ?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();

  $sql = $bdd->query("DELETE FROM obj WHERE id ='$getid'");
  if($sql)
  {
      echo "";
  }
?>
<div align="left">
   <a href="myobj.php"><img src="img/retour.png" height="50px"width="50px"></a>
 </div></div>
 <div align="center">
  <div class="wrapper">
    <div class="typing-demo">
<h1> L'objectif '"<?php echo $userinfo["objectif"]?>" à bien était supprimer</h1>
</div></div>
 <?php
 } else{
      header("location : index.php");
  }
   ?>

</div>
</head>
 </body>
 </html>