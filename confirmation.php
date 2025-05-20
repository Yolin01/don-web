<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation du Don</title>
    <link rel="stylesheet" href="styles.css">
    <style>
                * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        /* Header */
        header {
            background-color: #00ba1f;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h2>Confirmation du Don</h2>
        <nav class="navbar">
            <a href="index.html">Accueil</a>
            <a href="Contact.html">Contact</a>
            <a href="Apropos.html">À propos</a>
        </nav>
    </header>
        
    
    

    <?php
    if (isset($_GET['status'], $_GET['name'], $_GET['amount'])) {
        $status = htmlspecialchars($_GET['status']);
        $name = htmlspecialchars($_GET['name']);
        $amount = number_format((float) $_GET['amount'], 0, '', ' ') . " Ar";

        if ($status == "succès") {
            echo "<p>✅ Merci, <strong>$name</strong>, pour votre don de <strong>$amount</strong> !</p>";
            echo "<p>Votre don a été enregistré avec succès.</p>";
        } else {
            echo "<p>❌ Désolé, <strong>$name</strong>. Votre paiement de <strong>$amount</strong> a échoué.</p>";
            echo "<p>Veuillez réessayer plus tard.</p>";
        }
    } else {
        echo "<p>Aucune information de paiement disponible.</p>";
    }
    ?>

    <br>
    
   
    <section class="btn-container">
            <a href="index.html" class="btn"> Retour à la page d'accueil</a>
            <a href="Historique.php" class="btn">📜 Voir l'historique des dons</a>
    </section>
    <footer class="footer">
        <p>© 2025 - Site de donation pour l'École Supérieure Polytechnique</p>
    </footer>

</body>
</html>
