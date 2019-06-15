
<?php
exit();
include ("skills.php");
if(isset($_POST['latestQuery'])){
	$latestQuery = $_POST['latestQuery'];
	$latestQueryLength = strlen($latestQuery);
	$result = array();
	
	foreach($data as $name => $url){
		if (substr(strtolower($name),0,$latestQueryLength) == strtolower($latestQuery)){
				$result[$name] = $url;
		}
	}

	echo json_encode($result);
}
?>