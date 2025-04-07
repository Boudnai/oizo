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
            <div class="filter-buttons">
                <button data-filter="*" class="filter-select active-filter" type="button">Tout</button>
                <button data-filter="exp" class="filter-select" type="button">Rapaces diurnes</button>
                <button data-filter="ball" class="filter-select" type="button">Rapaces nocturnes</button>
                <button data-filter="baie" class="filter-select" type="button">Exotiques</button>
                <button data-filter="badge" class="filter-select" type="button">Aquatiques</button>
                <button data-filter="badge" class="filter-select" type="button">Passereaux</button>
            </div>
            <div class="boutique">
                <div class="items-container">

                    <?php for ($i = 0; $i < count($lesRapacesJours); $i++) { ?>
                        <form action="" method="post">
                        <div data-filter="rapaces_jours" class="item">
                            <div class="select-img"><img src="img/<?= $lesRapacesJours[$i]['imageO'] ?>" alt=""></div>
                            <div class="nom"><?= $lesRapacesJours[$i]['nom'] ?></div>
                            <div class="espece"><?= $lesRapacesJours[$i]['espece']; ?></div>
                        </div>
                        </form>
                    <?php } ?>

                    <?php for ($i = 0; $i < count($lesRapacesNuit); $i++) { ?>
                        <form action="" method="post">
                        <div data-filter="rapaces_nuit" class="item">
                            <div class="select-img"><img src="img/<?= $lesRapacesNuit[$i]['imageO'] ?>" alt=""></div>
                            <div class="nom"><?= $lesRapacesNuit[$i]['nom'] ?></div>
                            <div class="espece"><?= $lesRapacesNuit[$i]['espece']; ?></div>
                        </div>
                        </form>
                    <?php } ?>

                    <?php for ($i = 0; $i < count($lesExotiques); $i++) { ?>
                        <form action="" method="post">
                        <div data-filter="exotiques" class="item">
                            <div class="select-img"><img src="img/<?= $lesExotiques[$i]['imageO'] ?>" alt=""></div>
                            <div class="nom"><?= $lesExotiques[$i]['nom'] ?></div>
                            <div class="espece"><?= $lesExotiques[$i]['espece']; ?></div>
                        </div>
                        </form>
                    <?php } ?>

                    <?php for ($i = 0; $i < count($lesAquatiques); $i++) { ?>
                        <form action="" method="post">
                        <div data-filter="rapaces_nuit" class="item">
                            <div class="select-img"><img src="img/<?= $lesAquatiques[$i]['imageO'] ?>" alt=""></div>
                            <div class="nom"><?= $lesAquatiques[$i]['nom'] ?></div>
                            <div class="espece"><?= $lesAquatiques[$i]['espece']; ?></div>
                        </div>
                        </form>
                    <?php } ?>

                    <?php for ($i = 0; $i < count($lesPassereaux); $i++) { ?>
                        <form action="" method="post">
                        <div data-filter="rapaces_nuit" class="item">
                            <div class="select-img"><img src="img/<?= $lesPassereaux[$i]['imageO'] ?>" alt=""></div>
                            <div class="nom"><?= $lesPassereaux[$i]['nom'] ?></div>
                            <div class="espece"><?= $lesPassereaux[$i]['espece']; ?></div>
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