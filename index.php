<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=edt", 'root', '');
if(isset($_POST['formconnect'])) {
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);   
}

if(isset($_POST['formconnect'])) {
if(!empty($_POST["mailconnect"]) AND !empty($_POST["mdpconnect"])) 
{
   
   $requser = $bdd->prepare("SELECT * FROM compte WHERE mail = ? AND mdp = ?");
   $requser->execute(array($mailconnect, $_POST["mdpconnect"]));
   $userexist = $requser->rowCount();
   if($userexist == 1)
   {
     $userinfo = $requser->fetch();
     $_SESSION['id'] = $userinfo['id'];
     $_SESSION['mail'] = $userinfo['mail'];
     $_SESSION['pseudo'] = $userinfo['pseudo'];
     $_SESSION['mdp'] = $userinfo['mdp'];
     $_SESSION['edt'] = $userinfo['edt'];
     
     header("Location: profil.php");
     

    
   } 
   else 
   {

    $erreur = "Mauvais Mot De Passe ou Mauvais E-mail !";
   }
   }
   

else {
    $erreur = 'Tout les champs ne sont pas compléter';
}}
?>

<html>
<head>
<title>Connexion My O.B.J</title>
<meta charset="utf-8">
</head>
<body>
<link rel="stylesheet" href="index.css">
<div align="left">
  <div class="margin">
   <!-- <a href="index.html"><img src="img/retour.png" height="50px"width="50px"></a> -->
 </div></div>
 <br> <br> <br> 
    <div align="center">
    <br /><br /> <br /> <br /><br /> <br />
    <img src="img/edt"  width="150px"/><br> 
    
    <br>
    <h2>Connexion O.B.J</h2>
     <br />
<form method="POST" action="">
    <table>

    <tr>
    <td align="right">
  
    </td>
    <td align="right">
    <input type="text"placeholder="E-mail" id="mailconnect" name="mailconnect" />
    </td>
    </tr>

    
    <tr>
    <td align="center">
   
    </td>
    <td><br>
  
    <input type="password"placeholder="Mot de passe" id="mdpconnect" name="mdpconnect" />
    </td>
    </tr>
    
   <td></td>
  
   <td><br>
    <input type="submit" name="formconnect"value="Connexion"/>
   
</td>
    </table>
   

    </form>
<footer>
    <div align="center">
    <br><p>Créée par 7VŁÐ|Shadow™ © tout droits réservés</p>
</div>
</footer>
<?php

if(isset($erreur))
{
    echo '<font color="red">' .$erreur."</font>";
}
?>
    </div>
    
</body>

</html>