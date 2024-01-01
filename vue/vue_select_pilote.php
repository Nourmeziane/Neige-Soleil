<h3>Liste des Pilotes</h3>

<form method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
    <tr>
        <td>Nom Pilote</td>
        <td>Prénom Pilote</td>
        <td>Email</td>
        <td>Nombre de vols</td>
        <td>Actions</td>
    </tr>
    <?php if (!empty($lesPilotes)): ?>
        <?php foreach ($lesPilotes as $unPilote): ?>
            <tr>
                <td><?= htmlspecialchars($unPilote['nom']) ?></td>
                <td><?= htmlspecialchars($unPilote['prenom']) ?></td>
                <td><?= htmlspecialchars($unPilote['email']) ?></td>
                <td><?= htmlspecialchars($unPilote['nbvols']) ?></td>
                <td>
                    <a href='index.php?page=3&action=sup&idpilote=<?= $unPilote['idpilote'] ?>'>
                        <img src='images/supprimer.png' height='30' width='30' alt='Supprimer'>
                    </a>
                    <a href='index.php?page=3&action=edit&idpilote=<?= $unPilote['idpilote'] ?>'>
                        <img src='images/editer.png' height='30' width='30' alt='Éditer'>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
