<?php 
// require_once('../config/config.php');
class Database{
	public $host =DB_HOST;
	public $user =DB_USER;
	public $pass =DB_PASS;
	public $dbname=DB_NAME;


	public $link;
	public $error;

	public function __construct(){
		$this->connectionDB();
	}

	private function connectionDB(){
		$this->link=new mysqli($this->host,$this->user,$this->pass,$this->dbname);
		echo 'done';
		if(!$this->link){
			$this->error="Connection Fail".$this->link->conncet_error;
			return false;
		}
	}

	//Select or Read Data
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows>0){
			return $result;
		}else{
			return false;
		}
	}

	//Insert data
	public function insert($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($insert_row){
			header("Location:index.php?msg=".urlencode('Data save Sucesfull'));
			exit();
		}else{
			die("Error:(".$this->link->error.")".$this->link->error);
		}
	}

	//Update data
	public function update($query){
		$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($update_row){
			header("Location:index.php?msg=".urlencode('Data save Sucesfull'));
			exit();
		}else{
			die("Error:(".$this->link->error.")".$this->link->error);
		}

	}

	//Delete data
	public function delete($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($delete_row){
			header("Location:index.php?msg=".urlencode('Data Delete Sucesfull'));
			exit();
		}else{
			die("Error:(".$this->link->error.")".$this->link->error);
		}

	}
	
}
?>