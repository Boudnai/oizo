<main>
    <section class="bg flex">
        <div class="profil">
            <h1>Mon profil</h1>
            <p>Mon email : <?= $util["mail"] ?> </p>
            <p>Mon nom : <?= $util["nom"] ?> </p>
            <p>Mon prénom : <?= $util["PrenomUtilisateur"] ?> </p>
            <div class="flex"><a class="deco-profil" tabindex="-1" href="./?action=deconnexion"><button class="btn-red" type="button">Se déconnecter</button></a></div>
        </div>

    </section>
    <?php if(isAdmin(getUtilisateursById(getMailULoggedOn()))){ ?>
        <p><a href="./?action=ajoutOS">Ajouter un oiseau à un spectacle</a></p>
        <p><a href="./?action=retraitOS">Retirer un oiseau d'un spectacle</a></p>
    <?php } ?>
</main>