<?php
session_start(); // Démarrage de la session

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION['user'])) {
    header('Location: pre-index.php'); // Remplacez "login.php" par la page de connexion réelle
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/javascript/contact.js"></script>
    <title>Bienvenue sur notre site</title>
</head>
<body>
<?php include('header-footer-php/header.php') ?>

    

    <main class="body-profil">
        <div class="div-profil">
            <img class="profil" src="/assets/img/social/profil-image.png" alt="">
        </div>
        <div>
            <p class="phrase-co">Vous êtes maintenant connecté à notre site. Profitez de toutes nos fonctionnalités !</p>
        </div>
    </main>

    <nav class="nav-co">
        <ul class="ul-co" >
            <li><a class="link-co" href="dashboard.php">Tableau de bord</a></li>
            <li><a class="link-co" href="profil.php">Mon profil</a></li>
            <li><a class="link-co" href="deconnexion.php">Déconnexion</a></li>
        </ul>
    </nav>
    <?php include('header-footer-php/footer.php') ?>
    <script src="/assets/javascript/script.js"></script>
</body>
</html>
