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
    <section class="bg relative">
        <div class="conf-insc">
            <p>Inscription effectuée</p>
            <p>Veuillez vous <a href="./?action=connexion">connecter</a></p>
        </div>
        
    </section>
</main>