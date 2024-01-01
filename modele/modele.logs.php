<?php
    class Logs extends BDD {

        public function insertLogs($action){
			$requete = "insert into logs values (null, :action, :email, :ip, sysdate(), :navigateur);";
			$donnees = array(":action" => $action, ":email" => $_SESSION['email'], ":ip" => $_SERVER['REMOTE_ADDR'],":navigateur" => $_SERVER['HTTP_USER_AGENT']);
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
		}

		public function selectAllLogs(){
			$requete = "select * from logs";
			$select = $this->unPDO->prepare($requete);
			$select->execute();
			return $select->fetchAll();
		}
    }