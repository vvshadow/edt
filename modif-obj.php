

<?php
session_start();
 $bdd = new PDO("mysql:host=127.0.0.1;dbname=edt", "root", "");
 if(isset($_SESSION['id']))
{
  $getid = intval($_GET['id']);

  
  $requser = $bdd->prepare('SELECT * FROM obj WHERE id = ?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();

  if(isset($_POST['formconnect'])) {
if(isset($_POST["prenom"]) AND !empty($_POST["prenom"])) {

$prenom = htmlspecialchars($_POST['prenom']);
  $requser = $bdd->prepare('UPDATE obj SET prenom = ? WHERE id = ?');
  $requser->execute(array($prenom, $getid));
 
  
}

if(isset($_POST["nom"]) AND !empty($_POST["nom"])) {

  $nom = htmlspecialchars($_POST['nom']);
    $requser = $bdd->prepare('UPDATE obj SET nom = ? WHERE id = ?');
    $requser->execute(array($nom, $getid));
    
}
if(isset($_POST["age"]) AND !empty($_POST["age"])) {

  $age = htmlspecialchars($_POST['age']);
    $requser = $bdd->prepare('UPDATE obj SET age = ? WHERE id = ?');
    $requser->execute(array($age, $getid));
    
}


if(isset($_POST["date"]) AND !empty($_POST["date"])) {


    $requser = $bdd->prepare('UPDATE obj SET datee = ? WHERE id = ?');
    $requser->execute(array($_POST["date"], $getid));
    
}

if(isset($_POST["objectif"]) AND !empty($_POST["objectif"])) {

  $objectif = htmlspecialchars($_POST['objectif']);
 
  $objectif = htmlspecialchars($_POST['objectif']);
    $requser = $bdd->prepare('UPDATE obj SET objectif = ? WHERE id = ?');
    $requser->execute(array($objectif, $getid));
    
}}


 ?>


<html>
<head>
<title>My O.B.J</title>
<meta charset="utf-8" />
</head>
<body>
<link rel="stylesheet" href="cree.css">
<div align="left">
  <div class="margin">
   <a href="myobj.php"><img src="img/retour.png" height="50px"width="50px"></a>
 </div></div>

<div align = "center">
<div align = "center">
  <h1> Objectif de <?php echo $userinfo["prenom"]?> </h1> <br>
<form method = "POST" action = "">
<label for="prenom" class="prenomlab">Prénom</label>  <br>
<input type = "text" name= "prenom" id="prenom"placeholder="Nouveau Prénom"value=<?php echo $userinfo["prenom"]?>><br>
<label for="nom">Nom</label> <br>
<input type = "text" name= "nom" id="nom"placeholder="Nouveau Nom"value=<?php echo $userinfo["nom"]?>><br>
<label for="date">Age</label> <br>
<input type="text" name="Age" rows="5" placeholder="Age" value=<?php echo $userinfo["age"]?>>  <br> 

<label for="prenom">Objectif</label> <br>
<input type = "text" name= "objectif" id="objectif"placeholder="Nouvelle Objectif"><br>
<label for="date">Date de Fin</label> <br>
<input type = "date" name= "date" id="date"value=<?php echo $userinfo["datee"]?>><br><br>
<input type = "submit" name= "formconnect">
</div>


</form>
 
  <?php
  if(isset($erreur)) {
    echo '<font color="red">' .$erreur."</font>";
}

} else{
      header("location : index.php");
  } ?>

</div>
 </body>
 </html>