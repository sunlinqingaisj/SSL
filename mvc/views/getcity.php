<?php 
//     session_start();
    
//     // Function to read the JSON object sent by OpenWeather API
//     function readJson($str){
//         $src = 'http://api.openweathermap.org/data/2.5/weather?q='.$str; // Source location of the JSON object plus  the user submitted city
//         $x = file_get_contents($src);
//         $json = json_decode($x);
//         var_dump($json);
//     }
    
//     // Verify if GET variable "city is set
//     if(isset($_GET['city'])){
//         //Get variable is set
//         // echo $json->main->temp.'<br>';
//         // echo $json->main->pressure.'<br>';
//         // echo $json->main->humidity.'<br>';

//         //Verify if GET vairable is empty
//         if (empty($_GET['city'])){
//             $_SESSION['message'] = 'No city was chosen';
//             header('location: index.php');
//         }else{
//             // GET is not empty
            
//             $str = $_GET['city']; //Value of GET
//             //echo $str;
            
//             //Get json object
//             readJson($str);
//         }
//     }


    session_start();    
    if(isset($_SESSION['cityWeather'])){
    // Show OpenWeather page here...
    $json = $_SESSION['cityWeather'];
    echo $json->main->temp.'<br>';
    echo $json->main->pressure.'<br>';
    echo $json->main->humidity.'<br>';
    }else{
    // No Session
    }
?>
