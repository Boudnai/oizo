<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titre ?></title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <script defer src="https://kit.fontawesome.com/88b3295be9.js" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
</head>
<body>

<header>
    <nav>
        <a tabindex="1" href="./?action=accueil" title="Accueil">
            <img class="logo_oizo" src="img/logo_oizo.png" alt="Logo Oizo">
        </a>
        <ul>
            <li><a tabindex="2" href="./?action=accueil" <?= $action == 'accueil' || $action == 'defaut' ? 'class="active"' : '' ?>>Accueil</a></li>
            <li><a tabindex="3" href="./?action=oiseaux" <?= $action == 'oiseaux' ? 'class="active"' : '' ?>>Oiseaux</a></li>         
            <li><a tabindex="4" href="./?action=boutique" <?= $action == 'boutique' ? 'class="active"' : '' ?>>Spectacles</a></li>
        </ul>
        <?php if(isLoggedOn()){ ?>
            <div class="user-actions">
                <a tabindex="5" href="./?action=panier" title="Voir votre panier">
                    <img class="fa-solid fa-cart-shopping fa-2xl" src="img/panier.png" aria-label="Votre panier">
                </a>
                <a tabindex="6" href="./?action=profil" title="Accéder à votre profil">
                    <button type="button">Profil</button>
                </a>
            </div>
        <?php } else { ?>
            <div class="auth-actions">
                <a tabindex="5" href="./?action=connexion" title="Se connecter">
                    <button type="button">Connexion</button>
                </a>
            </div>
        <?php } ?>
    </nav>
</header>
