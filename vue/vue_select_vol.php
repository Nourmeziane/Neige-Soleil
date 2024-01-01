<h3>Listes Des vols</h3>

<form method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>

<br>

<table border="1">
    <tr>
        <th>Date</th>
        <th>Désignation</th>
        <th>Avion</th>
        <th>Pilotes</th>
        <th>Actions</th>
    </tr>
    <?php if (!empty($lesVols)): ?>
        <?php foreach ($lesVols as $Levol): ?>
            <tr>
                <td><?= htmlspecialchars($Levol['datevol']) ?></td>
                <td><?= htmlspecialchars($Levol['designation']) ?></td>
                <td><?= htmlspecialchars($Levol['NomAvion']) ?></td>
                <td><?= htmlspecialchars($Levol['NomPilote1']) . " & " . htmlspecialchars($Levol['NomPilote2']) ?></td>
                <td>
                    <a href='index.php?page=4&action=sup&idvol=<?= $Levol['idvol'] ?>'>
                        <img src='images/supprimer.png' height='30' width='30' alt='Supprimer'>
                    </a>
                    <a href='index.php?page=4&action=edit&idvol=<?= $Levol['idvol'] ?>'>
                        <img src='images/editer.png' height='30' width='30' alt='Éditer'>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
