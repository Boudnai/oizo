<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titre ?></title>
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="https://kit.fontawesome.com/88b3295be9.js" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
</head>
<body>

<header>
    <nav>
        <a tabindex="1" href="./?action=accueil"><img class="logo_oizo" src="img/logo_oizo.png" alt="Logo"></a>
        <ul>
            <li><a tabindex="2" href="./?action=accueil">Accueil</a></li>
            <li><a tabindex="3" href="./?action=oiseaux">Oiseaux</a></li>         
            <li><a tabindex="5" href="./?action=boutique">Spectacles</a></li>
        </ul>
        <?php if(isLoggedOn()){ ?>
            <div>
                <a tabindex="-1" href="./?action=panier"><i tabindex="6" aria-label="Votre panier" class="fa-solid fa-cart-shopping fa-2xl" style="color: #ffffff;"></i></a>
                <a tabindex="-1" href="./?action=profil"><button tabindex="7" type="button">Profil</button></a>
            </div>
        <?php } else { ?>
                <a tabindex="-1" href="./?action=connexion"><button tabindex="6" type="button">Connexion</button></a>
        <?php } ?>
    </nav>
</header>
