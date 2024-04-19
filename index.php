<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    // Inclusion du fichier PHP
    include "traitement.php";
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo '<link rel="stylesheet" type="text/css" href="style.css">' ; ?>
    <title>Profil</title>
</head>
<body>
    <h1>Profil</h1>
    <table>
        <tr>
            <td class="center-image">
                <img src="person.jpeg"/>
            </td>
        </tr>
        <tr>            
            <td>              
                <div>
                    <label>Prenom</label>
                   <p><?php echo $donnees['prenom'];?></p> 
                </div>
                <div>
                    <label for="nom">Nom</label>
                    <p><?php echo $donnees['nom'];?></p> 
                </div>
                <div>
                    <label for="date">Date   </label>
                    <p><?php echo $donnees['date_naiss'];?></p>         
                <div>
                    <label for="lieu">Lieu de Naisssance</label>
                    <p><?php echo $donnees['lieu'];?></p>    
                <div>
                    <label for="email">email</label>
                    <p><?php echo $donnees['email'];?></p>   
                <div>
                    <label for="adress">Adresse</label>
                    <p><?php echo $donnees['adress'];?></p>    
                <div>
                    <label for="telephone">Telephone</label>
                    <p><?php echo $donnees['telephone'];?></p> 
                </div>
                </td>
            </tr>

        
       
        <tr>
        <td>
            <a href="modifier.php">Modifier</a>           
         </td>
        </tr>

    
    </table>
</body>
</html>