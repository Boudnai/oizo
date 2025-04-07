<main class="bg">
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
<section>
    <div class="center">
        <div class="width">
            
            <div class="boutique">
                <div class="items-container">

                    <?php for ($i = 0; $i < count($lesSpectacles); $i++) { ?>
                        <div data-filter="exp" class="item">
                            <div class="titre"><?= $lesSpectacles[$i]['titre'] ?></div>
                            <div class="prix"><h4><?= $lesSpectacles[$i]['prix']; ?> €</h4></div>
                            
                            <?php if ($estConnecte) { ?>
                                <form action="" method="post">
                                    <input class="article-input" type="number" min="1" name="nb_places" value="1">
                                    <input type="hidden" name="id_panier" value="<?= $idPanier['idPanier']; ?>">
                                    <input type="hidden" name="id_spectacle" value="<?= $lesSpectacles[$i]['idSpectacle']; ?>">
                                    <input type="submit" value="Ajouter au panier" name="ajouter_panier" class="btn">
                                </form>
                            <?php } else { ?>
                                <form action="?action=connexion" method="get">
                                    <input type="hidden" name="action" value="connexion">
                                    <input type="submit" value="Se connecter pour ajouter au panier" class="btn">
                                </form>
                            <?php } ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>

</main>

<script src="filter.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>