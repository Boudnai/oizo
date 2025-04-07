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
    <section class="bg flex">
        <div class="profil">
            <h1>Mon profil</h1>
            <p>Mon email : <?= htmlspecialchars($util["Email"]) ?> </p>
            <p>Mon nom : <?= htmlspecialchars($util["nom"]) ?> </p>
            <p>Mon prénom : <?= htmlspecialchars($util["PrenomUtilisateur"]) ?> </p>
            <div class="flex"><a class="deco-profil" tabindex="-1" href="./?action=deconnexion"><button class="btn-red" type="button">Se déconnecter</button></a></div>
        </div>
    </section>
    
    <?php if(isset($estAdmin) && $estAdmin): ?>
        <section class="admin-section">
            <h2>Administration des oiseaux</h2>
            
            <!-- Tableau des oiseaux sans spectacle -->
            <div class="admin-table">
                <h3>Oiseaux sans spectacle</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Espèce</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($lesOiseauxSansSpectacle as $oiseau): ?>
                        <tr>
                            <td><?= htmlspecialchars($oiseau['nom']) ?></td>
                            <td><?= htmlspecialchars($oiseau['espece']) ?></td>
                            <td><?= htmlspecialchars($oiseau['typeO']) ?></td>
                            <td>
                                <form action="./?action=ajouterOiseauSpectacle" method="POST">
                                    <input type="hidden" name="idOiseau" value="<?= $oiseau['idOiseau'] ?>">
                                    <select name="idSpectacle" required>
                                        <option value="">Sélectionner un spectacle</option>
                                        <?php foreach($lesSpectacles as $spectacle): ?>
                                        <option value="<?= $spectacle['idSpectacle'] ?>"><?= htmlspecialchars($spectacle['titre']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button type="submit" class="btn btn-blue">Ajouter</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Tableau des oiseaux avec spectacle -->
            <div class="admin-table">
                <h3>Oiseaux avec spectacle</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Espèce</th>
                            <th>Type</th>
                            <th>Spectacle</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($lesOiseauxAvecSpectacle as $oiseau): ?>
                        <tr>
                            <td><?= htmlspecialchars($oiseau['nom']) ?></td>
                            <td><?= htmlspecialchars($oiseau['espece']) ?></td>
                            <td><?= htmlspecialchars($oiseau['typeO']) ?></td>
                            <td>
                                <?php 
                                foreach($lesSpectacles as $spectacle) {
                                    if ($spectacle['idSpectacle'] == $oiseau['idSpectacle']) {
                                        echo htmlspecialchars($spectacle['titre']);
                                        break;
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <form action="./?action=retirerOiseauSpectacle" method="POST">
                                    <input type="hidden" name="idOiseau" value="<?= $oiseau['idOiseau'] ?>">
                                    <button type="submit" class="btn btn-red">Retirer</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
        
        <style>
            .admin-section {
                padding: 20px;
                margin: 20px 0;
            }
            
            .admin-table {
                margin-bottom: 30px;
            }
            
            .admin-table table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }
            
            .admin-table th, .admin-table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            
            .admin-table th {
                background-color: #f2f2f2;
            }
            
            .btn {
                padding: 5px 10px;
                border: none;
                border-radius: 3px;
                cursor: pointer;
            }
            
            .btn-blue {
                background-color: #007bff;
                color: white;
            }
            
            .btn-red {
                background-color: #dc3545;
                color: white;
            }
            
            select {
                padding: 5px;
                margin-right: 5px;
            }
        </style>
    <?php endif; ?>
</main>