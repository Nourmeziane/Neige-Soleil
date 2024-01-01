<?php
$lesAvion = $unControleur->selectAllAvion();
$lesVols = $unControleur->selectAllVol();
$lesPilotes = $unControleur->selectAllPilote();

$action = isset($_GET['action']) ? $_GET['action'] : '';
$idvol = isset($_GET['idvol']) ? $_GET['idvol'] : '';

switch ($action) {
    case 'sup':
        $unControleur->deleteVol($idvol);
        $unControleur->insertLogs("deleteVol");
        header("Location: index.php?page=4");
        exit;
    case 'edit':
        $leVol = $unControleur->selectWhereVol($idvol);
        break;
}

require_once "vue/vue_insert_vol.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Valider'])) {
        $unControleur->insertVol($_POST);
        $unControleur->insertLogs("insertVol");
    } elseif (isset($_POST['Modifier'])) {
        $unControleur->updateVol($_POST);
        $unControleur->insertLogs("updateVol");
    }

    header("Location: index.php?page=4");
    exit;
}

$filtre = isset($_POST['Filtrer']) ? $_POST['filtre'] : '';
$lesVols = $filtre ? $unControleur->selectLikeVol($filtre) : $unControleur->selectAllVol();

require_once "vue/vue_select_vol.php";
?>
