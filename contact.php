<?php 

$bdd = new PDO('mysql:host=127.0.0.1;dbname=edt;charset=utf8','root','');

if(isset($_POST["valide"])) {
 $pseudo = htmlspecialchars($_POST['pseudo']);
 $mail = htmlspecialchars($_POST["mail"]);
 $sujet = htmlspecialchars($_POST["sujet"]);
 $message = htmlspecialchars($_POST["message"]);


    if(!empty($_POST["pseudo"]) AND !empty($_POST["mail"]) AND !empty($_POST["sujet"]) AND !empty($_POST["message"])) {
     
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

        
      $user = $bdd->prepare("INSERT INTO mail(pseudo, mail, sujet, messagee) value(?, ?, ?, ?)");
      $user->execute(array($pseudo, $mail, $sujet, $message));
      echo "vous avez envoyer votre mail avec succes";
      
    } else {

        echo "";
    }

} else {
        echo "";
    }
} 


?>

<html>
<title>CONTACT</title>
<meta charset="utf-8">
<head>
<link rel="stylesheet" type="text/css" href="contact.css">
</head>
<body>
<div align="left"><a href="profil.php"><img src="img/retour"  width="50px"/></a></div>

<br> <br> <br>

<div align = "center">
<div class="box">
<h1>Nous Contactez</h1> <br>
<form method = POST action="">
<label for = "mail">VOTRE E-MAIL :</label> <br>
<input type = "text" name="mail" placeholder="Votre E-mail"> <br> 

<label for = "pseudo">VOTRE PSEUDO :</label> <br>
<input type = "text" name="pseudo" placeholder="Votre Pseudo"> <br>

<label for = "sujet">VOTRE SUJET :</label> <br>
<input type = "text" name="sujet" placeholder="Votre Sujet"> <br>

<label for = "message">VOTRE MESSAGE :</label> <br>
<textarea type="text" placeholder="Votre Message"></textarea><br>
<input type = "submit" name="valide"value="Envoyer">
</div>


</form>

</div>
</body>

</html>