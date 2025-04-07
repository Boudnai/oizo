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
    <section class="bg flex-title">
        <div class="accueil-cadre">
            <h1>Bienvenue chez Oizo !</h1>
            <p>Consultez les oiseaux de notre zoo puis réservez vos places de spectacles !</p>
            <p>Vous pourrez également consulter votre panier et modifier ou supprimer des articles.</p>
        </div>
    </section>
</main>