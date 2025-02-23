<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "boutique_raclette";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données de la requête POST
$produit = $_POST['produit'];
$prix = $_POST['prix'];
$message = $_POST['message'];

// Insérer la commande dans la base de données
$sql = "INSERT INTO commandes (produit, prix, message) VALUES ('$produit', $prix, '$message')";
if ($conn->query($sql) === TRUE) {
    // Envoyer l'email de notification
    $to = "minimachinearaclette@gmail.com"; // Remplacez par l'email du producteur
    $subject = "Nouvelle commande reçue";
    $body = "Produit: $produit\nPrix: $prix\nMessage: $message";
    $headers = "From: clement.laurain67@gmail.com"; // Remplacez par votre email

    if (mail($to, $subject, $body, $headers)) {
        echo "Notification envoyée avec succès";
    } else {
        echo "Erreur lors de l'envoi de la notification";
    }
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
