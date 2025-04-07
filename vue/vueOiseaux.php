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
                <button data-filter="rapaces_jours" class="filter-select" type="button">Rapaces diurnes</button>
                <button data-filter="rapaces_nuit" class="filter-select" type="button">Rapaces nocturnes</button>
                <button data-filter="exotiques" class="filter-select" type="button">Exotiques</button>
                <button data-filter="aquatiques" class="filter-select" type="button">Aquatiques</button>
                <button data-filter="passereaux" class="filter-select" type="button">Passereaux</button>
            </div>
            <div class="boutique">
                <div class="items-container">
                    <!-- Rapaces diurnes -->
                    <?php foreach ($lesRapacesJours as $oiseau): ?>
                        <div data-filter="rapaces_jours" class="item">
                            <div class="select-img">
                                <img src="img/<?= !empty($oiseau['imageO']) ? $oiseau['imageO'] : 'default_bird.jpg' ?>" alt="<?= htmlspecialchars($oiseau['nom']) ?>">
                            </div>
                            <div class="nom"><?= htmlspecialchars($oiseau['nom']) ?></div>
                            <div class="espece"><?= htmlspecialchars($oiseau['espece']) ?></div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Rapaces nocturnes -->
                    <?php foreach ($lesRapacesNuit as $oiseau): ?>
                        <div data-filter="rapaces_nuit" class="item">
                            <div class="select-img">
                                <img src="img/<?= !empty($oiseau['imageO']) ? $oiseau['imageO'] : 'default_bird.jpg' ?>" alt="<?= htmlspecialchars($oiseau['nom']) ?>">
                            </div>
                            <div class="nom"><?= htmlspecialchars($oiseau['nom']) ?></div>
                            <div class="espece"><?= htmlspecialchars($oiseau['espece']) ?></div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Exotiques -->
                    <?php foreach ($lesExotiques as $oiseau): ?>
                        <div data-filter="exotiques" class="item">
                            <div class="select-img">
                                <img src="img/<?= !empty($oiseau['imageO']) ? $oiseau['imageO'] : 'default_bird.jpg' ?>" alt="<?= htmlspecialchars($oiseau['nom']) ?>">
                            </div>
                            <div class="nom"><?= htmlspecialchars($oiseau['nom']) ?></div>
                            <div class="espece"><?= htmlspecialchars($oiseau['espece']) ?></div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Aquatiques -->
                    <?php foreach ($lesAquatiques as $oiseau): ?>
                        <div data-filter="aquatiques" class="item">
                            <div class="select-img">
                                <img src="img/<?= !empty($oiseau['imageO']) ? $oiseau['imageO'] : 'default_bird.jpg' ?>" alt="<?= htmlspecialchars($oiseau['nom']) ?>">
                            </div>
                            <div class="nom"><?= htmlspecialchars($oiseau['nom']) ?></div>
                            <div class="espece"><?= htmlspecialchars($oiseau['espece']) ?></div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Passereaux -->
                    <?php foreach ($lesPassereaux as $oiseau): ?>
                        <div data-filter="passereaux" class="item">
                            <div class="select-img">
                                <img src="img/<?= !empty($oiseau['imageO']) ? $oiseau['imageO'] : 'default_bird.jpg' ?>" alt="<?= htmlspecialchars($oiseau['nom']) ?>">
                            </div>
                            <div class="nom"><?= htmlspecialchars($oiseau['nom']) ?></div>
                            <div class="espece"><?= htmlspecialchars($oiseau['espece']) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour initialiser Isotope
    var grid = document.querySelector('.items-container');
    var iso;
    
    if (typeof Isotope !== 'undefined') {
        iso = new Isotope(grid, {
            itemSelector: '.item',
            layoutMode: 'fitRows'
        });
        
        // Filtrage au clic sur les boutons
        var filterButtons = document.querySelectorAll('.filter-select');
        filterButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var filterValue = this.getAttribute('data-filter');
                
                // Retirer la classe active de tous les boutons
                filterButtons.forEach(function(btn) {
                    btn.classList.remove('active-filter');
                });
                
                // Ajouter la classe active au bouton cliqué
                this.classList.add('active-filter');
                
                // Filtrer les éléments
                if (filterValue === '*') {
                    iso.arrange({ filter: '*' });
                } else {
                    iso.arrange({ filter: '[data-filter="' + filterValue + '"]' });
                }
            });
        });
    }
});
</script>