<?php
// Connexion à la base de données
require_once 'bdd.php'; // ou require 'bdd.php' le nom de votre fichier de connexion;

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $amount = htmlspecialchars($_POST["amount"]);
    $payment = htmlspecialchars($_POST["payment"]);
    $reference = htmlspecialchars($_POST["reference"]);

    // Simulation de paiement aléatoire
    $status = (rand(0, 1) == 1) ? "succès" : "échec";

    if ($status == "succès") {
        // Préparation de la requête SQL
        $stmt = $conn->prepare("INSERT INTO don (name, email, amount, payment_method, reference) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdss", $name, $email, $amount, $payment, $reference);

        // Exécution et vérification
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            // Redirection vers la page de confirmation avec succès
            header("Location: confirmation.php?status=succès&name=$name&amount=$amount");
            exit();
        } else {
            echo "Erreur lors de l'enregistrement : " . $stmt->error;
        }
    } else {
        // Redirection vers la page de confirmation avec échec
        header("Location: confirmation.php?status=échec&name=$name&amount=$amount");
        exit();
    }
}

// Fermeture de la connexion
$conn->close();
?>
