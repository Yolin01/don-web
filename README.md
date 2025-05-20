
# Donation avec simulation de payement Web App (HTML, CSS, JS, PHP, MySQL)

Ce projet est une application web réalisée dans le cadre d’un exercice pratique.  
Elle permet aux utilisateurs d’effectuer des dons en ligne via un formulaire convivial, avec un traitement côté serveur en PHP et un enregistrement sécurisé des données dans une base MySQL.

L’objectif principal est de simuler un système de collecte de dons fonctionnel, en mettant en œuvre les bases du développement web full-stack : interface utilisateur, gestion de formulaire, enregistrement dans une base de données, et confirmation des transactions.

## FONCTIONNALITÉS :
- Formulaire de don (nom, e-mail, montant, méthode de paiement, référence)
- Vérification et enregistrement des données avec PHP
- Stockage des informations dans une base de données MySQL
- Page de confirmation du don
- Historique des dons (exemple de visualisation)
- Interface HTML/CSS simple et claire

## PRÉREQUIS :
### Technologies utilisées:
- HTML5 / CSS3
- PHP (procédural)
- MySQL
- Serveur local WAMP (localhost)

### Avant de commencer, vous avez besoin de :
- Un environnement local avec Apache + MySQL :
  - XAMPP (https://www.apachefriends.org/)
  - WAMP (https://www.wampserver.com/)
  - Laragon (https://laragon.org/)
- Un navigateur web
- Un éditeur de code (ex : VS Code)

## Installation

Il faut installer Xampp ou Wamp pour naviguer localement

### 1) Cloner le dépôt
```bash
git clone https://github.com/Yolin01/don-app.git
```

### 2) Déplacer le projet dans le bon dossier :
- XAMPP: `C:/xampp/htdocs/don/`
- WAMP: `C:/wamp/www/don/`

### CONFIGURATION DE LA BASE DE DONNÉES
- Démarrer Apache et MySQL depuis votre logiciel (XAMPP, WAMP, etc.)
- Accéder à phpMyAdmin : http://localhost/phpmyadmin

### CRÉER LA BASE DE DONNÉES :
- Entrez le nom de la base de donnée : « don »
- Importer le script SQL :
  - Allez dans l'onglet "Importer" et choisissez Choisir le fichier « bdd.sql » ou bien copiez le code dans « bdd.sql » dans la fenêtre SQL
  - Cliquer sur Exécuter

### Configuration de la connexion MySQL

Créer le fichier `bdd.php` :  
Copier cet exemple dans le fichier bdd.php (c’est juste un exemple vous pouvez faire votre code comme vous voulez) :

```php
<?php
define("DB_HOST", "localhost"); 
define("DB_USER", "root"); 
define("DB_PASS", ""); 
define("DB_NAME", "don");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
```

Ce fichier ne doit jamais être envoyé sur GitHub. Il est listé dans `.gitignore`.

### Lancer l'application

Ouvrir le navigateur et taper :  
[http://localhost/Don/Accueil.html](http://localhost/Don/Accueil.html)  
Vous verrez une page d’accueil pour vous expliquer brièvement

## Structure du projet

```
don/
Acceuil.html               # Page d'accueil
Apropos.html               # A propos du site
bdd.php                    # Connexion à la BDD (non versionné)
bdd.sql                    # Script de création de la base
confirmation.php           # Page de confirmation de don
Contact.html               # Contact moi
Formulaire.html            # Page pour entrer les formulaires
.gitignore                 # Exclure bdd.php
Historique.php             # Affichage des dons
process.php                # C’est ici le processus qui traite les informations via formulaire et la requête pour insérer les informations dans la base de donnée
README.md                  # lisez moi
stylehitso.css             # Style css pour les historiques
styles.css                 # Style css pour mes projets y compris historique
Images/                    # Images
    Entrée.jpg 
    Exterieur.jpg
    Plafond.jpg
    Porte.jpg
```

## Fichier fourni :

Voici le contenu de bdd.sql à importer dans phpMyAdmin :
```sql
CREATE TABLE don (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    amount DOUBLE NOT NULL,
    payment_method VARCHAR(100) NOT NULL,
    reference VARCHAR(255) NOT NULL,
    don_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## Projet réalisé par RATSIREVO Jaonaridino Yolin, étudiant en STIC niveau M1, Ecole Supérieur Polytechnique Antsiranana.
Année:2025

---
MERCI

Merci d'utiliser mon projet ! N'hésitez pas à proposer des améliorations ou à faire un pull request.
