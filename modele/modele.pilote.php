<?php
class Pilote extends BDD {

    public function selectAllPilote(){
        return $this->executeQuery("SELECT * FROM pilote");
    }

    private function buildDataArray($tab) {
        return array(
            ":nom" => $tab["nom"], 
            ":prenom" => $tab["prenom"],
            ":adresse" => $tab["adresse"],
            ":email" => $tab["email"],
            ":nbvols" => $tab["nbvols"]
        );
    }

    public function insertPilote($tab){
        $this->executeQuery(
            "INSERT INTO pilote VALUES (null, :nom, :prenom, :adresse, :email, :nbvols)",
            $this->buildDataArray($tab)
        );
    }

    public function deletePilote($idpilote){
        // Débuter une transaction pour assurer que toutes les opérations sont exécutées correctement
        $this->unPDO->beginTransaction();
    
        try {
            // Premièrement, supprimer tous les vols liés à ce pilote
            $requeteVol = "DELETE FROM vol WHERE idpilote1 = :idpilote OR idpilote2 = :idpilote";
            $stmtVol = $this->unPDO->prepare($requeteVol);
            $stmtVol->execute(array(":idpilote" => $idpilote));
    
            // Deuxièmement, supprimer le pilote maintenant que les vols sont supprimés
            $requetePilote = "DELETE FROM pilote WHERE idpilote = :idpilote";
            $stmtPilote = $this->unPDO->prepare($requetePilote);
            $stmtPilote->execute(array(":idpilote" => $idpilote));
    
            // Tout s'est bien passé, on peut valider les modifications
            $this->unPDO->commit();
        } catch (Exception $e) {
            // S'il y a une erreur, on annule tout
            $this->unPDO->rollBack();
            throw $e; // Vous pouvez choisir de gérer l'exception différemment selon votre application
        }
    }
    

    public function selectWherePilote($idpilote){
        return $this->executeQuery(
            "SELECT * FROM pilote WHERE idpilote=:idpilote",
            array(":idpilote" => $idpilote),
            true
        );
    }

    public function updatePilote($tab){
        $this->executeQuery(
            "UPDATE pilote SET nom=:nom, prenom=:prenom, adresse=:adresse, email=:email, nbvols=:nbvols WHERE idpilote=:idpilote",
            $this->buildDataArray($tab) + array(":idpilote" => $tab["idpilote"])
        );
    }

    public function selectLikePilote($filtre){
        return $this->executeQuery(
            "SELECT * FROM pilote WHERE nom LIKE :filtre OR prenom LIKE :filtre",
            array(":filtre" => "%$filtre%")
        );
    }

    private function executeQuery($query, $params = array(), $single = false){
        $stmt = $this->unPDO->prepare($query);
        $stmt->execute($params);
        return $single ? $stmt->fetch() : $stmt->fetchAll();
    }
}

?>