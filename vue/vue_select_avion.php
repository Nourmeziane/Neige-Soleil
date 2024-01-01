<h3>Liste des Avions</h3>

<form method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>

<br>

<table border="1">
    <tr>
        <td>Nom avion</td>
        <td>Capacité avion</td>
        <td>Date achat</td>
        <td>Constructeur</td>
        <td>Actions</td>
    </tr>
    <?php if (!empty($lesAvions)): ?>
        <?php foreach ($lesAvions as $unAvion): ?>
            <tr>
                <td><?= htmlspecialchars($unAvion['designation']) ?></td>
                <td><?= htmlspecialchars($unAvion['capacite']) ?></td>
                <td><?= htmlspecialchars($unAvion['dateAchat']) ?></td>
                <td><?= htmlspecialchars($unAvion['nom_constructeur']) ?></td>
                <td>
                    <a href='index.php?page=2&action=sup&idavion=<?= $unAvion['idavion'] ?>'>
                        <img src='images/supprimer.png' height='30' width='30'>
                    </a>
                    <a href='index.php?page=2&action=edit&idavion=<?= $unAvion['idavion'] ?>'>
                        <img src='images/editer.png' height='30' width='30'>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
