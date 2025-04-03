<main>
    <article class="bg flex relative">

            <section class="form-sect insc-absolute">
                <div class="form-div">
                    <form class="inscription" action="./?action=inscription" method="POST">
                        <fieldset>
                            <legend>Inscription</legend>
                            <div class="grid-container">
                                <div class="flex">
                                    <label for="pseudoU">Nom</label>
                                    <input type="text" placeholder="Nom" name="nom" id="nom" required/>
                                </div>
                                <div class="flex">
                                    <label for="pseudoU">Prénom</label>
                                    <input type="text" placeholder="Prénom" name="PrenomUtilisateur" id="PrenomUtilisateur" required/>
                                </div>
                                <div class="flex">
                                    <label for="mailU">Email</label>
                                    <input type="text" placeholder="Email" name="Email" id="Email" required/>
                                </div>
                                <div class="flex">
                                    <label for="mdpU">Mot de passe</label>
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