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
    <article class="bg flex relative">

            <section class="form-sect insc-absolute">
                <div class="form-div">
                    <form class="inscription" action="./?action=inscription" method="POST">
                        <fieldset>
                            <legend>Inscription</legend>
                            <div class="grid-container">
                                <div class="flex">
                                    <label for="nom">Nom</label>
                                    <input type="text" placeholder="Nom" name="nom" id="nom" required/>
                                </div>
                                <div class="flex">
                                    <label for="PrenomUtilisateur">Prénom</label>
                                    <input type="text" placeholder="Prénom" name="PrenomUtilisateur" id="PrenomUtilisateur" required/>
                                </div>
                                <div class="flex">
                                    <label for="Email">Email</label>
                                    <input type="text" placeholder="Email" name="Email" id="Email" required/>
                                </div>
                                <div class="flex">
                                    <label for="mdp">Mot de passe</label>
                                    <input type="password" placeholder="Mot de passe" name="mdp" id="mdp" required/>
                                </div>
                            </div>
                            <button id="bouton" class="log inscri" type="submit">S'inscrire</button>
                            <div class="session" id="alert" role="alert"></div>
                        </fieldset>
                    </form>
                </div>
            </section>

    </article>

</main>