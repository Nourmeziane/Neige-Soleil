<h3> Gestion des Avions </h3>

<form method="post" class="compact-form">
    <div class="compact-input-group">
        <label for="designation">Nom de l'avion :</label>
        <input type="text" id="designation" name="designation" value="<?= isset($_GET['action']) && $_GET['action'] === 'edit' ? htmlspecialchars($avion['designation']) : ''; ?>">
    </div>
    <div class="compact-input-group">
        <label for="capacite">Capacité :</label>
        <input type="text" id="capacite" name="capacite" value="<?= isset($_GET['action']) && $_GET['action'] === 'edit' ? htmlspecialchars($avion['capacite']) : ''; ?>">
    </div>
    <div class="compact-input-group">
        <label for="dateAchat">Date de l'achat :</label>
        <input type="date" id="dateAchat" name="dateAchat" value="<?= isset($_GET['action']) && $_GET['action'] === 'edit' ? htmlspecialchars($avion['dateAchat']) : ''; ?>">
    </div>
    <div class="compact-input-group">
        <label for="idconstructeur">Constructeur :</label>
        <select id="idconstructeur" name="idconstructeur">
            <?php if (isset($constructeurs)): ?>
                <?php foreach ($constructeurs as $constructeur): ?>
                    <option value="<?= htmlspecialchars($constructeur['idconstructeur']) ?>" <?= isset($_GET['action'], $avion['idconstructeur']) && $_GET['action'] === "edit" && $avion['idconstructeur'] === $constructeur['idconstructeur'] ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($constructeur['nom']) ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="compact-input-group">
        <input type="reset" name="Annuler" value="Annuler">
        <input hidden type="text" name="idavion" value="<?= isset($_GET['action']) && $_GET['action'] === 'edit' ? htmlspecialchars($avion['idavion']) : ''; ?>">
        <input type="submit" name="<?= $submitValue = isset($_GET['action']) && $_GET['action'] === 'edit' ? 'Modifier' : 'Valider'; ?>" value="<?= $submitValue ?>">
    </div>
</form>

