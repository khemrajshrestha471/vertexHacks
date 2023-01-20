<?php
// $conn =new mysqli("localhost","root","","vertex_hacks");
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// if($_SERVER['REQUEST_METHOD']=="POST"){
//     $team_name=$_POST['team_name'];
//     $material = $_POST['material'];
//     $unique_id = $_POST['unique_id'];
//     $initial_condn = $_POST['initial_condn'];
//     $final_condn = $_POST['final_condn'];
//     $updated_at = date("Y-m-d H:i:s");
//     $query = "INSERT INTO ptps_data ( team_name, material, unique_id, initial_condn, final_condn, updated_at) VALUES ('$team_name', '$material', '$unique_id', '$initial_condn', '$final_condn', '$updated_at')";
//     $result = mysqli_query($conn,$query);
//     if($result){
//         echo "Inserted Successfully";
//     } else {
//         echo "Something went wrong";
//     }

// }
?>


<!-- INSERT INTO `ptps_data` (`s.n`, `team_name`, `material`, `unique_id`, `initial_condn`, `final_condn`, `updated_at`) VALUES ('1', 'dummy', 'mat1', '000', 'Good', 'Bad', 'current_timestamp(6).000000'); -->