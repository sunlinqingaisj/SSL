<?
//home controller
class cityModel{
	public function getCity(){
	$conn = new PDO('mysql:host=localhost;dbname=wordCity;port:8889', 'root', 'root');
	$sql = "select city order by cpintry";	
	$result = $conn->query($sql);
	$final = $result->fetchAll();
	return $final;
	}
	// add

	// delete

	// update
}
?>