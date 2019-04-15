<?php 

class Chat extends Core
{

	public function fetchMessages(){
		//query DB
		//return rows
		$this->query("SELECT `chat`.`message`,
			`users`.`username`,
			`users`.`user_id`
			from `chat`
			JOIN `users`
			ON `chat`.`user_id`=`users`.`user_id`
			ORDER BY `chat`.`timestamp`
			DESC
			");
		return $this->rows();
	}
	public function throwMessage($user_id,$message){
		//insert in DB
		$timestamp = date('Y-m-d G:i:s');
		$sql="
		INSERT INTO `chat` (`user_id`,`message`, `timestamp`)
		VALUES('$user_id','$message','$timestamp')";
		$this->query($sql);
	}
}

?>