<?php
class Categorie extends BDD {

    public function selectAllConstructeur(){
        $requete ="SELECT * FROM constructeur";
        $select = $this->unPDO->query($requete); 
        return $select->fetchAll(); 
    }

}

?>