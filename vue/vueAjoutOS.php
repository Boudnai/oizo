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
                        <?php for ($i = 0; $i < count($lesOiseauxSansSpectacle); $i++) { ?>
                            <div data-filter="rapaces_jours" class="item">
                                <div class="select-img">
                                    <img src="img/<?= $lesOiseauxSansSpectacle[$i]['imageO'] ?>" alt="">
                                </div>
                                <div class="nom"><?= $lesOiseauxSansSpectacle[$i]['nom'] ?></div>
                                <div class="espece"><?= $lesOiseauxSansSpectacle[$i]['espece']; ?></div>
                                
                                <!-- Bouton pour afficher la sélection des spectacles -->
                                <button type="button" class="btn-show-spectacles" data-id="<?= $lesOiseauxSansSpectacle[$i]['idOiseau'] ?>">
                                    Ajouter à un spectacle
                                </button>

                                <!-- Formulaire caché qui apparaît au clic -->
                                <form action="ajouterOiseauSpectacle.php" method="post" class="spectacle-form hidden" id="form-<?= $lesOiseauxSansSpectacle[$i]['idOiseau'] ?>">
                                    <input type="hidden" name="idOiseau" value="<?= $lesOiseauxSansSpectacle[$i]['idOiseau'] ?>">
                                    
                                    <select name="idSpectacle" required>
                                        <option value="">Sélectionnez un spectacle</option>
                                        <?php foreach ($lesSpectacles as $spectacle) { ?>
                                            <option value="<?= $spectacle['idSpectacle'] ?>">
                                                <?= $spectacle['libelle'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>

                                    <button type="submit">Confirmer</button>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    // Récupère tous les boutons "Ajouter à un spectacle"
    document.querySelectorAll('.btn-show-spectacles').forEach(button => {
        button.addEventListener('click', function() {
            let idOiseau = this.dataset.id;
            let form = document.getElementById('form-' + idOiseau);
            
            // Affiche ou cache le formulaire
            form.classList.toggle('hidden');
        });
    });
</script>

<style>
    .hidden { display: none; }
</style>
