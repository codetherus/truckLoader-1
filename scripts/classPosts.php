<?php

try{
	$pdo = new PDO('mysql:host=localhost;dbname=truckLoader','root','');
}catch(PDOException $e){
	exit('Database error');
}

/**
* 
*/
class truck{


public function fetch_all(){

		global $pdo;
		$query = $pdo->prepare("SELECT * FROM truck");
		$query->execute();

		return $query->fetchAll();

	}


public function fetch_data($truck_id){

		global $pdo;
		$query = $pdo->prepare('SELECT * FROM truck WHERE idtruck=?');
		$query->bindValue(1,$truck_id);
		$query->execute();

		return $query->fetch();

	}

public function postCount($user_id){
		global $pdo;
		$query = $pdo->prepare('SELECT COUNT(poster_id) AS postTruck FROM `truck` WHERE poster_id=?');
		$query->bindValue(1,$user_id);
		$query->execute();

		return $query->fetch();

	}


}
/**
* 
*/
class Trailer{

	public function fetch_all(){

			global $pdo;
			$query = $pdo->prepare("SELECT * FROM trailer");
			$query->execute();

			return $query->fetchAll();

		}

	public function fetch_data($trailer_id){

			global $pdo;
			$query = $pdo->prepare('SELECT * FROM trailer WHERE idtrailer=?');
			$query->bindValue(1,$trailer_id);
			$query->execute();

			return $query->fetch();

	}

	public function postCount($user_id){
		global $pdo;
		$query = $pdo->prepare('SELECT COUNT(poster_id) AS postTrailer FROM `trailer` WHERE poster_id=?');
		$query->bindValue(1,$user_id);
		$query->execute();

		return $query->fetch();

	}


}

/**
* 
*/
class Load{

	public function fetch_all(){

			global $pdo;
			$query = $pdo->prepare("SELECT * FROM `load`");
			$query->execute();

			return $query->fetchAll();

		}

	public function fetch_data($load_id){

			global $pdo;
			$query = $pdo->prepare('SELECT * FROM `load` WHERE idload=?');
			$query->bindValue(1,$load_id);
			$query->execute();

			return $query->fetch();

		}

	public function postCount($user_id){
		global $pdo;
		$query = $pdo->prepare('SELECT COUNT(poster_id) AS postLoad FROM `load` WHERE poster_id=?');
		$query->bindValue(1,$user_id);
		$query->execute();

		return $query->fetch();

	}

}

/**
* 
*/
class Poster{



	 public function displayUser($poster_id){

	 	global $pdo;
				$query = $pdo->prepare('SELECT * FROM `user` WHERE id=?');
	 	$query->bindValue(1,$poster_id);
		$query->execute();

	 	return $query->fetch();


	 }

	public function displayMyPost($poster_id){

		global $pdo;
				$query = $pdo->prepare("SELECT idtruck as id, title as title, `date`as `date` FROM truck WHERE poster_id = ?
								UNION 
								SELECT idtrailer as id, title as title, `date`as `date` FROM trailer WHERE poster_id =?
								UNION 
								SELECT idload as id, title as title, `date`as `date` FROM `load` WHERE poster_id = ?");
		$query->bindValue(1,$poster_id);
		$query->bindValue(2,$poster_id);
		$query->bindValue(3,$poster_id);
		$query->execute();

		return $query->fetchAll();
	}




}


/**
* 
*/
class Members
{
	
	public function fetch_all(){

			global $pdo;
			$query = $pdo->prepare("SELECT * FROM `user`");
			$query->execute();

			return $query->fetchAll();

		}
}


?>