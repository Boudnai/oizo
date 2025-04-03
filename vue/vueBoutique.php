<main class="bg">

<section>
    <div class="center">
        <div class="width">
            
            <div class="boutique">
                <div class="items-container">

                    <?php for ($i = 0; $i < count($lesSpectacles); $i++) { ?>
                        <form action="" method="post">
                        <div data-filter="exp" class="item">
                            
                            <div class="titre"><?= $lesSpectacles[$i]['titre'] ?></div>
                            <div class="prix"><h4>€ <?= $lesSpectacles[$i]['prix']; ?></h4></div>
                            <input class="article-input" type="number" min="1" name="nb_places" value="1">
                            <input type="hidden" name="id_panier" value="<?= $idPanier['idPanier']; ?>">
                            <input type="hidden" name="id_spectacle" value="<?= $lesSpectacles[$i]['idSpectacle']; ?>">
                            <input type="submit" value="Ajouter au panier" name="ajouter_panier" class="btn">
                        </div>
                        </form>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>

</main>

<script src="filter.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>