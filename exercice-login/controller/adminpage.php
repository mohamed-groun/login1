
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location:Accueil.php");}
else {
	echo 'Bienvenu '.$_SESSION['user'];
 require 'autoload.php';
 $cnxPDO = connexionPDO::getInstance();
 $prod= new inscription();
 $produits= $prod->select();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <meta charset="utf-8" />
 <title>Accueil</title>
 </head>
 <body class="container">
 <h1> Les inscrit</h1>
 <table class="table">
 <tr>
 <th> id</th>
 <td>nom </td>
 <td>prenom </td>
 <td>dateNaissance	 </td>
 <td>email </td>
 <td>mot de passe </td>
 <td>valeur de session </td>
  
 </tr>
 <?php foreach($produits as $produit) { ?>
 
 
   <tbody>
     <tr>
       <th scope="row"><?=$produit->id ?></th>
       <td><?=$produit->nom ?></td>
       <td><?=$produit->prenom ?></td>
       <td><?=$produit->dateNaissance	 ?></td>
       <td><?=$produit->email ?></td>
       <td><?=$produit->mdp ?></td>
       <td><?php echo session_id(); ?></td>
        <td><a href="/exerciceMVC/controller/Delete.php?id=<?=$produit->id ?>"> Delete </a></td>
     </tr>
    
   </tbody>
   <?php } ?>
 </table>
 <div>
 <a href="deconnexion.php">deconnexion </a> 
 </div>
 </body>
 </html>
 <?php } ?>

