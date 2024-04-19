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
    <form action="traitement.php" method="POST">
    <table>    
        <tr>
            <td class="center-image">
                <img src="person.jpeg"/>
            </td>
        </tr>
        <tr>            
            <td>              
                <div>
                    <label for="prenom">Prenom</label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo $donnees['prenom'];?>"   placeholder="<?php echo $donnees['prenom'];?>"/>
                </div>
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="<?php echo $donnees['nom'];?>" placeholder="<?php echo $donnees['nom'];?>"/>
                </div>
                <div>
                    <label for="lieu">Lieu de Naisssance</label>
                    <input type="text" id="lieu" name="lieu" value="<?php echo $donnees['lieu'];?>" placeholder="<?php echo $donnees['lieu'];?>"/>
                </div>
                <div>
                    <label for="email">email</label>
                    <input type="email" id="email" name="email" value="<?php echo $donnees['email'];?>" placeholder="<?php echo $donnees['email'];?>"/>
                </div>
                <div>
                    <label for="adress">Adresse</label>
                    <input type="text" id="adress" name="adresse" value="<?php echo $donnees['adress'];?>" placeholder="<?php echo $donnees['adress'];?>"/>
                </div>
                <div>
                    <label for="telephone">Telephone</label>
                    <select name="indif">
                        <option value="+221">Senegal</option>
                        <option value="+39">Italie</option>
                        <option value="+212">Maroc</option>
                        <option value="+33">France</option>
                    </select>
                    <input type="text" id="telephone"  name="tel" value="<?php echo $donnees['telephone'];?>" placeholder="<?php echo $donnees['telephone'];?>"/>
                </div>
                </td>
            </tr>

        
       
        <tr>
            <td>
                
                <button type="submit" name="submit"  value="Modifier">Modifier</button>
                <button type="button" class="annuler" onclick="window.history.back();">Annuler</button>
            </td>
        </tr>

    
    </table>
    </form>
</body>
</html>