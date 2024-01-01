<h3> Ajout d'un nouveau vol </h3>

<form method="post" class="compact-form">
    <div class="compact-input-group">
        <label for="datevol">Date du vol:</label>
        <input type="date" id="datevol" name="datevol" value="<?= $leVol['datevol'] ?? ''; ?>">
    </div>
    <div class="compact-input-group">
        <label for="designation">Désignation:</label>
        <input type="text" id="designation" name="designation" value="<?= $leVol['designation'] ?? ''; ?>">
    </div>
    <div class="compact-input-group">
        <label for="idavion">Avion:</label>
        <select id="idavion" name="idavion">
            <?php foreach ($lesAvion as $unAvion): ?>
                <option value="<?= htmlspecialchars($unAvion['idavion']) ?>">
                    <?= htmlspecialchars($unAvion['designation']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="compact-input-group">
        <label for="idpilote1">Pilote 1:</label>
        <select id="idpilote1" name="idpilote1">
            <?php foreach ($lesPilotes as $unPilote): ?>
                <option value="<?= htmlspecialchars($unPilote['idpilote']) ?>">
                    <?= htmlspecialchars($unPilote['nom']) . ' ' . htmlspecialchars($unPilote['prenom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="compact-input-group">
        <label for="idpilote2">Pilote 2:</label>
        <select id="idpilote2" name="idpilote2">
            <?php foreach ($lesPilotes as $unPilote): ?>
                <option value="<?= htmlspecialchars($unPilote['idpilote']) ?>">
                    <?= htmlspecialchars($unPilote['nom']) . ' ' . htmlspecialchars($unPilote['prenom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="compact-input-group">
        <input type="reset" name="Annuler" value="Annuler">
        <input hidden type="text" name="idvol" value="<?= $leVol['idvol'] ?? ''; ?>">
        <input type="submit" name="<?= isset($leVol['idvol']) ? 'Modifier' : 'Valider'; ?>" value="<?= isset($leVol['idvol']) ? 'Modifier' : 'Valider'; ?>">
    </div>
</form>


