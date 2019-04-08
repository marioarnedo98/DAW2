<?php 

header("Content-type: application/json");

//simulation of a query db
$people= array(
	'Alex' => array(
		'age' => 24, 
		"location"=>"Madrid" ,
		 "job"=> "Web developer"
		),
	'Diego' =>  array(
		'age' => 21,
		 "location"=>"Johanesburgo" ,
		  "job"=> "Teacher")
	);

$return= array('exists' => false );

if (isset($_GET['name'])) {
	$name=$_GET['name'];
	if (isset($people[$name])) {
		$return ['exists']=true;
		$return['information']=$people[$name];
	}
}

echo json_encode($return);