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
    <section class="bg">
        <h1>Mon panier</h1>
        
        <?php if (!empty($msg)): ?>
            <div class="message"><?= htmlspecialchars($msg) ?></div>
        <?php endif; ?>
        
        <?php if (!isLoggedOn()): ?>
            <p>Veuillez vous <a href="?action=connexion">connecter</a> pour accéder à votre panier.</p>
        <?php elseif (empty($resultat)): ?>
            <p>Votre panier est vide. <a href="?action=boutique">Parcourir les spectacles</a></p>
        <?php else: ?>
            <!-- Afficher le contenu du panier -->
            <table>
                <thead>
                    <tr>
                        <th>Spectacle</th>
                        <th>Prix unitaire</th>
                        <th>Nombre de places</th>
                        <th>Sous-total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultat as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['titre']) ?></td>
                            <td><?= htmlspecialchars($item['prix']) ?> €</td>
                            <td>
                                <form method="post" action="">
                                    <input type="hidden" name="id_panier" value="<?= $item['idPanier'] ?>">
                                    <input type="hidden" name="id_spectacle" value="<?= $item['idSpectacle'] ?>">
                                    <input type="number" name="nb_places" value="<?= $item['nbPlaces'] ?>" min="1">
                                    <button type="submit" name="update_quantite">Mettre à jour</button>
                                </form>
                            </td>
                            <td><?= $item['prix'] * $item['nbPlaces'] ?> €</td>
                            <td>
                                <form method="post" action="">
                                    <input type="hidden" name="id_panier" value="<?= $item['idPanier'] ?>">
                                    <input type="hidden" name="id_spectacle" value="<?= $item['idSpectacle'] ?>">
                                    <button type="submit" name="delete">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total</th>
                        <th><?= $prixTotal ?> €</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            
            <!-- Bouton pour passer à la caisse ou continuer les achats -->
            <div class="actions">
                <a href="?action=boutique" class="btn">Continuer les achats</a>
            </div>
        <?php endif; ?>
    </section>
</main>