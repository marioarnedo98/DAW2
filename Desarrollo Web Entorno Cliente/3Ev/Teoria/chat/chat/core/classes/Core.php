<?php 
class Core
{
	protected $db, $result;
	private $rows;
	public function __construct()
	{
		$this->db= new PDO('mysql:host=localhost;dbname=chat', 'root', '');
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->db->exec('SET NAMES "utf8"');
	}
	public function query($sql){
		$this->result=$this->db->query($sql);
	}

	public function rows(){
		while ($row = $this->result->fetch(PDO::FETCH_ASSOC))
		{
			$rows[] = $row;
		}
		return $rows;
	}


}
