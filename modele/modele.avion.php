<?php
	class Avion extends BDD {

		public function selectAllAvion(){
			$requete ="SELECT avion.*, Constructeur.nom AS nom_constructeur
			FROM avion
			JOIN Constructeur ON Avion.idconstructeur = Constructeur.idconstructeur";
			$select = $this->unPDO->query($requete);
			return $select->fetchAll(); 
		}
		
		public function insertAvion ($tab){
			$requete ="INSERT INTO avion VALUES (null, :designation, :capacite, :dateAchat, :idconstructeur)";
			$donnees= array(
						":designation"=>$tab["designation"], 
						":capacite"=>$tab["capacite"],
						":dateAchat"=>$tab["dateAchat"],
						":idconstructeur"=>$tab["idconstructeur"]
						);
			$this->unPDO->prepare($requete)->execute($donnees);
		}
		

		public function deleteAvion($idavion){
			// Débuter une transaction pour assurer que toutes les opérations sont exécutées correctement
			$this->unPDO->beginTransaction();
		
			try {
				// Premièrement, supprimer tous les vols liés à cet avion
				$requeteVol = "DELETE FROM vol WHERE idavion = :idavion";
				$selectVol = $this->unPDO->prepare($requeteVol);
				$selectVol->execute(array(":idavion" => $idavion));
		
				// Deuxièmement, supprimer l'avion maintenant que les vols sont supprimés
				$requeteAvion = "DELETE FROM avion WHERE idavion = :idavion";
				$selectAvion = $this->unPDO->prepare($requeteAvion);
				$selectAvion->execute(array(":idavion" => $idavion));
		
				// Tout s'est bien passé, on peut valider les modifications
				$this->unPDO->commit();
			} catch (Exception $e) {
				// S'il y a une erreur, on annule tout
				$this->unPDO->rollBack();
				throw $e; // Vous pouvez choisir de gérer l'exception différemment selon votre application
			}
		}
		

		public function selectWhereAvion($idavion) {
			$requete = "SELECT * FROM avion WHERE idavion = :idavion";
			$statement = $this->unPDO->prepare($requete);
			
			// Execute returns a boolean, so we don't chain the methods
			$statement->execute(array(":idavion" => $idavion));
			
			// Fetch is called on the statement object, not on the result of execute()
			return $statement->fetch();
		}
		
		

		public function updateAvion ($tab){
			$requete ="UPDATE avion SET designation=:designation, capacite=:capacite, dateAchat=:dateAchat, idconstructeur=:idconstructeur WHERE idavion=:idavion";
			$donnees= array(
						":idavion"=>$tab["idavion"],
						":designation"=>$tab["designation"], 
						":capacite"=>$tab["capacite"],
						":dateAchat"=>$tab["dateAchat"],
						":idconstructeur"=>$tab["idconstructeur"]
						);
			$this->unPDO->prepare($requete)->execute($donnees);
		}
		

		public function selectLikeAvion($filtre) {
			$filtre = "%" . $filtre . "%"; // Concaténer le filtre avec les wildcards directement ici
			$requete ="SELECT avion.*, Constructeur.nom AS nom_constructeur
			FROM avion
			JOIN Constructeur ON Avion.idconstructeur = Constructeur.idconstructeur
			WHERE designation LIKE :filtre OR dateAchat LIKE :filtre;";
			$select = $this->unPDO->prepare($requete); 
			$select->execute(array(":filtre" => $filtre));
			
			return $select->fetchAll();
		}
		
	}
?>