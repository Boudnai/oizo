<main>
<?php if (isset($messages) && is_array($messages)): ?>
    <?php if (!empty($messages['erreur'])): ?>
        <div class="message error">
            <?= htmlspecialchars($messages['erreur']) ?>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($messages['succes'])): ?>
        <div class="message success">
            <?= htmlspecialchars($messages['succes']) ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
    <section class="bg flex">
        <div class="profil">
            <h1>Mon profil</h1>
            <p>Mon email : <?= htmlspecialchars($util["Email"]) ?> </p>
            <p>Mon nom : <?= htmlspecialchars($util["nom"]) ?> </p>
            <p>Mon prénom : <?= htmlspecialchars($util["PrenomUtilisateur"]) ?> </p>
            <div class="flex"><a class="deco-profil" tabindex="-1" href="./?action=deconnexion"><button class="btn-red" type="button">Se déconnecter</button></a></div>
        </div>

    </section>
    <?php if(isset($estAdmin) && $estAdmin){ ?>
        <p><a href="./?action=ajoutOS">Ajouter un oiseau à un spectacle</a></p>
        <p><a href="./?action=retraitOS">Retirer un oiseau d'un spectacle</a></p>
    <?php } ?>
</main>