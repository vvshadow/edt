ah<html>
<head>
<title>My O.B.J</title>
<meta charset="utf-8" />
</head>
<body>
<link rel="stylesheet" href="myobj.css">

<?php
session_start();
 $bdd = new PDO("mysql:host=127.0.0.1;dbname=edt", "root", "");
 if(isset($_SESSION['id']))
{
 $requete = $bdd->query("SELECT * FROM obj");

 ?> <div align="left">
  <div class="margin">
   <a href="profil.php"><img src="img/retour.png" height="50px"width="50px"></a>
 </div></div>
 <div align = "center">
     <br><br><br>
 <h1>My O.B.J</h1><br>

 <table border="1">

<th>Prénom</th>
<th>Nom</th>
<th>Age</th>
<th>Date de Fin</th>
<th>Objectif</th>
<th>Action</th>

 <?php  
  while($resultat = $requete->fetch())
 { 
    
     ?> 





<tr>   
    <!-- <td> <?php echo $resultat["id"]; ?> 
    
    </td> -->
    <td> <?php echo $resultat["prenom"]; ?> </td>
    <td> <?php echo $resultat["nom"]; ?> </td>
    <td> <?php echo $resultat["age"]; ?> </td>
    <td> <?php echo $resultat["datee"]; ?> </td>
    <td> <?php echo $resultat["objectif"]; ?> </td>
    <td> <div class = "supp">
    <a href="supress-obj.php?id=<?= $resultat["nom"]?>"><img src="img/delete.ico" height="20px"width="20px"></a> 
    <div class = "modi">
    <a href="modif-obj.php?id=<?= $resultat["nom"]?>"><img src="img/modif.png" height="30px"width="30px"></a> 
    </div> </td>

    <?php
 } ?>

 </tr>
  </table>

  <?php } else{
      header("location : connection.php");
  } ?>
</div>
 </body>
 </html>