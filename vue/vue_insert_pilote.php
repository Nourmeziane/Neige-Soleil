<h3> Ajout d'un nouveau pilote </h3>

<form method="post" class="compact-form">
    <div class="compact-input-group">
        <label for="nom">Nom du pilote :</label>
        <input type="text" id="nom" name="nom" value="<?= $laPilote['nom'] ?? ''; ?>">
    </div>
    <div class="compact-input-group">
        <label for="prenom">Prénom du pilote :</label>
        <input type="text" id="prenom" name="prenom" value="<?= $laPilote['prenom'] ?? ''; ?>">
    </div>
    <div class="compact-input-group">
        <label for="email">Email contact :</label>
        <input type="text" id="email" name="email" value="<?= $laPilote['email'] ?? ''; ?>">
    </div>
    <div class="compact-input-group">
        <label for="nbvols">Nombre de vols :</label>
        <input type="text" id="nbvols" name="nbvols" value="<?= $laPilote['nbvols'] ?? ''; ?>">
    </div>
    <div class="compact-input-group">
        <input type="reset" name="Annuler" value="Annuler">
        <input hidden type="text" name="idpilote" value="<?= $laPilote['idpilote'] ?? ''; ?>">
        <input type="submit" name="<?= isset($laPilote['idpilote']) ? 'Modifier' : 'Valider'; ?>" value="<?= isset($laPilote['idpilote']) ? 'Modifier' : 'Valider'; ?>">
    </div>
</form>

