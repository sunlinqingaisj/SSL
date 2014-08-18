<?
//home controller
include 'models/viewModel.php';
include 'models/cityModel.php';
// $viewModel = NEW viewModel();
class homeController{
	public function __construct(){
		var_dump($_GET["execute"]);
		if(isset($_GET["execute"])){
		$execute = $_GET['execute'];
			if($execute=="formHandle"){
				$this->formHandle();
			}elseif($execute=="showCity"){
				$this->showCity();
			}
		// echo 'home loaded';
		}elseif($execute == "getCity"){
			if(isset($_GET['city'])){
        //Get variable is set
      
        //Verify if GET vairable is empty
        if (empty($_GET['city'])){
            $_SESSION['message'] = 'No city was chosen';
            header('location: index.php');
        }else{
            // GET is not empty
            
            $str = $_GET['city']; //Value of GET
            //echo $str;
            
            //Get json object
            $this ->getCity($str);
        }
    }
}else{
		$this->startHome();
		}
	}
	public function welcome(){
		// echo 'welcome';
	}
	public function startHome(){
		// $viewModel = new viewModel();
		$viewCity = new viewModel();
		$viewCity->getview('views/api.html');

		// $viewModel->getView('views/header.html');
		// $viewModel->getView('views/form.html');
		// $viewModel->getView('views/footer.html');
	}
	public function formHandle(){
		$viewModel = new viewModel();
		$viewModel->getView('views/header.html');
		echo 'form handle loaded';
		$viewModel->getView('views/footer.html');
	}
	public function showCity(){
		$viewModel = new viewModel();
		$fruitModel = new citytModel();
		$viewModel->getView('views/header.html');
		$data = $fruitModel->getFruit();
		$viewModel->getView('views/body.php',$data);
		$viewModel->getView('views/footer.html');
	}
	public function getCity($str){
		$src = 'http://api.openweathermap.org/data/2.5/weather?q='.$str;
		$x = file_get_contents($src);
		$json = json_decode($x);
		$_SESSION['cityWeather'] = $json;
		$viewModel = new viewModel();
		$viewModel -> getView("views/header.html");
		// $viewModel -> getView("views/nav.html");
		$viewModel -> getView("views/getcity.php");
		$viewModel -> getView("views/footer.html");
	}
}
?>