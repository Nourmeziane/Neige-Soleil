<?php
class Connexion extends BDD {
    public function verifConnexion($email, $mdp){
        // Étape 1: Récupérer le sel de l'utilisateur
        $requete = "SELECT * FROM utilisateur WHERE email = :email";
        $donnees = array(":email" => $email);
        $select = $this->unPDO->prepare($requete); 
        $select->execute($donnees);
        $resultat = $select->fetch();

        if (!$resultat) {
            // Utilisateur non trouvé
            return false;
        }

        $mdpHache = hash('sha256', $mdp . $resultat['salt']);

        if($mdpHache === $resultat['mdp']){
            return $resultat;
        } else {
            return false;
        }
        
    }
}

