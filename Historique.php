<?php
// Connexion à la base de données
require_once 'bdd.php'; // ou require 'bdd.php' le nom de votre fichier de connexion;
//Affiche une erreur fatale et arrête le script si il y aura une erreur

// Gestion de la pagination
$limit = 10; // Nombre d'éléments par page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Requête de recherche sécurisée
$search = isset($_GET['search']) ? $_GET['search'] : "";
$sql = "SELECT name, email, amount, payment_method, don_date FROM don WHERE name LIKE ? ORDER BY don_date DESC LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$search_param = "%$search%";
$stmt->bind_param("sii", $search_param, $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();

// Compter le nombre total d'entrées
$count_sql = "SELECT COUNT(*) AS total FROM don WHERE name LIKE ?";
$count_stmt = $conn->prepare($count_sql);
$count_stmt->bind_param("s", $search_param);
$count_stmt->execute();
$count_result = $count_stmt->get_result();
$total_rows = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_rows / $limit);

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des dons</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="stylehitso.css">
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
        <h1>Préparons les terrains pour les générations futures</h1>
        <nav class="navbar">
            <a href="index.html">Accueil</a>
            <a href="Contact.html">Contact</a>
            <a href="Apropos.html">À propos</a>
        </nav>
    </header>
    <h2>Historique des dons</h2>
    <div class="container">
        <form method="GET" class="search-bar">
            <input type="text" name="search" placeholder="Rechercher un donateur..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit" class="btn">Rechercher</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Nom du donateur</th>
                    <th>Email</th>
                    <th>Montant (Ar)</th>
                    <th>Méthode de paiement</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row["name"]) ?></td>
                        <td><?= htmlspecialchars($row["email"]) ?></td>
                        <td><?= number_format($row["amount"], 0, '', ' ') ?> Ar</td>
                        <td><?= htmlspecialchars($row["payment_method"]) ?></td>
                        <td><?= htmlspecialchars($row["don_date"]) ?></td>
                    </tr>
                <?php endwhile; ?>
                <?php if ($result->num_rows == 0): ?>
                    <tr><td colspan='5'>Aucun don enregistré</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?= $i ?>&search=<?= htmlspecialchars($search) ?>" class="<?= ($i == $page) ? 'active' : '' ?>"> <?= $i ?> </a>
            <?php endfor; ?>
        </div>
        <br>
        <a href="index.html" class="btn">Retour à la page d'accueil</a>
    </div>
    <footer class="footer">
        <p>© 2025 - Site de donation pour l'École Supérieure Polytechnique</p>
    </footer>
</body>
</html>
