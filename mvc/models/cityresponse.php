<?
$cityentered= trim($_GET['cityget']).'%';
$dbh = new PDO("mysql:host=localhost;dbname=wordCity;port=8889","root","root");
$stmt= $dbh->prepare('SELECT distinct city_ascii, region, city FROM cities WHERE city_ascii LIKE :cityentered and country = "us" ORDER BY city_ascii LIMIT 20;');
$stmt->bindParam(':cityentered', $cityentered);
$stmt->execute();
$result= $stmt->fetchAll();
// print_r($result);
foreach($result as $city){
	// echo $city['city_ascii'];
	echo '<li><a href="index.php?city='.$city['city_ascii'].'&execute=getCity&action=form" >'.$city['city'].' '. $city['region'].'</a></li >';

}
// echo json_encode($result);
?>