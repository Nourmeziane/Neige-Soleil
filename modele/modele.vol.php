<?php
class Vol extends BDD {

    private function prepareDataArray($tab, $includeId = false) {
        $data = array(
            ":datevol" => $tab["datevol"], 
            ":designation" => $tab["designation"],
            ":idavion" => $tab["idavion"],
            ":idpilote1" => $tab["idpilote1"],
            ":idpilote2" => $tab["idpilote2"]
        );
        if ($includeId) {
            $data[":idvol"] = $tab["idvol"];
        }
        return $data;
    }

    public function selectAllVol(){
        return $this->executeQuery(
            "SELECT vol.*, avion.designation AS NomAvion, pilote.nom AS NomPilote1, pilote.prenom AS PrenomPilote1, pilote2.nom AS NomPilote2, pilote2.prenom AS PrenomPilote2
            FROM vol
            JOIN avion ON vol.idavion = avion.idavion
            JOIN pilote ON vol.idpilote1 = pilote.idpilote
            JOIN pilote pilote2 ON vol.idpilote2 = pilote2.idpilote"
        );
    }

    public function insertVol($tab){
        $this->executeQuery(
            "INSERT INTO vol VALUES (null, :datevol, :designation, :idavion, :idpilote1, :idpilote2)",
            $this->prepareDataArray($tab)
        );
    }

    public function deleteVol($idvol){
        $this->executeQuery(
            "DELETE FROM vol WHERE idvol=:idvol",
            array(":idvol" => $idvol)
        );
    }

    public function selectWhereVol($idvol){
        return $this->executeQuery(
            "SELECT * FROM vol WHERE idvol=:idvol",
            array(":idvol" => $idvol),
            true
        );
    }

    public function updateVol($tab){
        $this->executeQuery(
            "UPDATE vol SET datevol=:datevol, designation=:designation, idavion=:idavion, idpilote1=:idpilote1, idpilote2=:idpilote2 WHERE idvol=:idvol",
            $this->prepareDataArray($tab, true)
        );
    }

    public function selectLikeVol($filtre){
        return $this->executeQuery(
            "SELECT * FROM vol WHERE datevol LIKE :filtre OR designation LIKE :filtre",
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