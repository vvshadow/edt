<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=edt", 'root', '');
if(isset($_SESSION['id']))
{

   if(isset($_POST['creer'])) {
        $prenom = htmlspecialchars($_POST["prenom"]);
       $objectif = htmlspecialchars($_POST["objectif"]);
       $nom = htmlspecialchars($_POST["nom"]);
       $date = $_POST["date"];
       $age = htmlspecialchars($_POST["age"]);
       if(!empty($_POST["prenom"]) AND !empty($_POST["nom"]) AND !empty($_POST["date"]) AND !empty($_POST["age"]) AND !empty($_POST["objectif"])) {
       
        $user = $bdd->prepare("INSERT INTO obj(prenom, nom, datee, age, objectif) VALUES(?, ?, ?, ?, ?)");
        $user->execute(array($prenom, $nom, $date, $age, $objectif));
        $valide = "Cette Objetcif à bien était ajouté à Votre Liste.";
        
    }}
  
   

?>
   



<body>

<head> 
<title>Créé un O.B.J</title> 
<meta charset = "utf-8"> 
<link rel="stylesheet" href="cree.css">
</head>   
<div align="left"><a href="profil.php"><img src="img/retour"  width="50px"/></a></div>

<div align="center"><br><br><br>
  <div class="box"><img src="img/obj3"  width="150px"/>
    <h1><strong>Ajoutez Un O.B.J</strong></h1>
       
   <form method ="post" action="">
<label for="prenom">Prénom :<br>
<input type ="text" id="prenom"name="prenom"placeholder="Votre Prenom"><br></label>
<label for="nom">Nom :<br>  
<input type ="text" id="nom"name="nom"placeholder="Votre Nom"><br></label>
<label for="objectif">Objectif :<br>  
<input type ="text" id="objectif"name="objectif"placeholder="Votre Objectif"><br></label>
<label for="age">Age :<br>   
<input type ="text" id="age"name="age"placeholder="Votre âge"><br></label>
<label for="date">Date de Fin :<br>
<input type ="date" id="date"name="date"placeholder="jj/mm/aaaa"><br></label><br>
<input type ="submit" name="creer"value="Créé l'objectif"><br>
</form>

</body>

</html>
<?php
if(isset($erreur)) {
    echo '<font color="red">' .$erreur."</font>";
}
if(isset($valide)) {
    echo '<font color="green">' .$valide."</font>";
}
} else {
    header("location: profil.php");
}
?>