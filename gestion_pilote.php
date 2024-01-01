<h2> Gestion des pilotes </h2>

<?php

$idpilote = $_GET['idpilote'] ?? '';
$action = $_GET['action'] ?? $idpilote;

if ($action) {
    switch ($action) {
        case 'sup':
            $unControleur->deletePilote($idpilote);
            $unControleur->insertLogs("deletePilote");
            header("Location: index.php?page=3");
            exit;
        case 'edit':
            $laPilote = $unControleur->selectWherePilote($idpilote);
            break;
    }
}

require_once "vue/vue_insert_pilote.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Valider'])) {
        $unControleur->insertPilote($_POST);
        $unControleur->insertLogs("insertPilote");
        header("Location: index.php?page=3");
        exit;
    }

    if (isset($_POST['Modifier'])) {
        $unControleur->updatePilote($_POST);
        $unControleur->insertLogs("updatePilote");
        header("Location: index.php?page=3");
        exit;
    }
}

$filtre = $_POST['filtre'] ?? '';
$lesPilotes = $filtre ? $unControleur->selectLikePilote($filtre) : $unControleur->selectAllPilote();

require_once "vue/vue_select_pilote.php";

?>
