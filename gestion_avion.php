<h2>Gestion des avions</h2>

<?php

$action = $_GET['action'] ?? '';
$idavion = $_GET['idavion'] ?? '';

switch ($action) {
    case 'sup':
        $unControleur->deleteAvion($idavion);
        $unControleur->insertLogs("deleteAvion");
        header("Location: index.php?page=2");
        exit;
    case 'edit':
        $avion = $unControleur->selectWhereAvion($idavion);
        break;
}

$constructeurs = $unControleur->selectAllConstructeur();

require_once "vue/vue_insert_avion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Valider'])) {
        $unControleur->insertAvion($_POST);
        $unControleur->insertLogs("insertAvion");
    } elseif (isset($_POST['Modifier'])) {
        $unControleur->updateAvion($_POST);
        $unControleur->insertLogs("updateAvion");
    }

    header("Location: index.php?page=2");
    exit;
}

$filtre = $_POST['filtre'] ?? '';
$lesAvions = $filtre ? $unControleur->selectLikeAvion($filtre) : $unControleur->selectAllAvion();

require_once "vue/vue_select_avion.php";

?>
