<main class="bg flex relative">
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
<article class="form-height co-absolute">

            <section class="form-sect">
                <div class="form-div">
                    <form action="./?action=connexion" method="POST">
                        <fieldset>
                            <legend>Connexion</legend>
                            <div class="flex">
                                <label for="Email">Email</label>
                                <input type="text" placeholder="Email" name="Email" id="Email" required/>
                            </div>
                            <div class="flex">
                                <label for="mdp">Mot de passe</label>
                                <input type="password" placeholder="Mot de passe" name="mdp" id="mdp" required/>
                            </div>
                            <button id="bouton" class="log" type="submit">Se connecter</button>
                            <div class="session" id="alert" role="alert"></div>
                            <a class="create" href="./?action=inscription">Créer un compte</a>
                        </fieldset>
                    </form>
                </div>
            </section>

</article>

</main>