<?php
// Paramètres de connexion à la base de données
//$serveur = 'mysql-service';
$serveur = 'db';
$nom_utilisateur = 'root';
$mot_de_passe = 'root';
$nom_base_de_donnees = 'aws_p3_g1';

try {
    // Connexion à la base de données MySQL via PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$nom_base_de_donnees", $nom_utilisateur, $mot_de_passe);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $matricule=1;


   // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
        // Préparation de la requête de mise à jour
        $requete = "UPDATE personne SET prenom=:prenom,nom=:nom, lieu=:lieu , adress=:adresse,  email=:email , telephone=:telephone WHERE matricule=:matricule";

        $stmt = $connexion->prepare($requete);
        $stmt->bindParam(':prenom', $_POST["prenom"]);
        $stmt->bindParam(':nom', $_POST["nom"]);
        $stmt->bindParam(':lieu', $_POST["lieu"]);
        $stmt->bindParam(':email', $_POST["email"]);
        $stmt->bindParam(':adresse', $_POST["adresse"]);
        $telephone=$_POST['indif'].''.$_POST['tel'];
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':matricule', $matricule);

        $stmt->execute();
        if ($stmt->rowCount() > 0) {
          //  echo "Mise à jour réussie !";
            header("Location: index.php");
        } else {
            echo "Aucune ligne mise à jour.";
           # exit; // Assurez-vous de sortir du script ici
        }
        
        
      //  Rediriger après la mise à jour
       header("Location: index.php");
        exit;
    } else {
        // Récupérer les données existantes pour affichage
        $requete = "SELECT * FROM personne WHERE matricule = :matricule";
        $stmt = $connexion->prepare($requete);
        $stmt->bindParam(':matricule', $matricule);
        $stmt->execute();
        $donnees = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>


<?php
/*
communiquer les conteneur
$host = 'mysql';
$db   = 'aws_p3_g1';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
*/

