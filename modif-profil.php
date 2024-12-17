<?php
session_start();
 $bdd = new PDO("mysql:host=127.0.0.1;dbname=edt", "root", "");
 if(isset($_SESSION['id']))
{
  $getid = ($_SESSION['id']);

  
  $requser = $bdd->prepare('SELECT * FROM compte WHERE id = ?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();

  if(isset($_POST['formconnect'])) {
if(isset($_POST["pseudo"]) AND !empty($_POST["pseudo"])) {

$pseudo = htmlspecialchars($_POST['pseudo']);
  $requser = $bdd->prepare('UPDATE compte SET pseudo = ? WHERE id = ?');
  $requser->execute(array($pseudo, $getid));
 
  
}

if(isset($_POST["mail"]) AND !empty($_POST["mail"])) {

  $mail = htmlspecialchars($_POST['mail']);
    $requser = $bdd->prepare('UPDATE compte SET mail = ? WHERE id = ?');
    $requser->execute(array($mail, $getid));
    
}
if(isset($_POST["mdp"]) AND !empty($_POST["mdp"])) {

  $mdp = htmlspecialchars($_POST['mdp']);
    $requser = $bdd->prepare('UPDATE compte SET mdp = ? WHERE id = ?');
    $requser->execute(array($mdp, $getid));
    
}


}


 ?>


<html>
<head>
<title>Modification de Profil</title>
<meta charset="utf-8" />
</head>
<body>
<link rel="stylesheet" href="cree.css">
<div align="left">
  <div class="margin">
   <a href="profil.php"><img src="img/retour.png" height="50px"width="50px"></a>
 </div></div>

<div align = "center">
<div align = "center"><br><br><br><br><br><br><br>
  <h1> Profil de : <?php echo $userinfo["pseudo"]?> </h1> <br>
<form method = "POST" action = "">
<label for="pseudo" class="prenomlab">Pseudonyme</label>  <br>
<input type = "text" name= "pseudo" id="pseudo"placeholder="nouveau pseudo"value=<?php echo $userinfo["pseudo"]?>><br><br>
<label for="mail">E-mail</label> <br>
<input type = "text" name= "mail" id="mail"placeholder="nouveau mail"value=<?php echo $userinfo["mail"]?>><br><br>
<label for="mdp">Mot De Passe</label> <br>
<input type = "text" name= "mdp" id="mdp"placeholder="Nouveaux MDP"value=<?php echo $userinfo["mdp"]?>><br><br>
<input type = "submit" name= "formconnect" >
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