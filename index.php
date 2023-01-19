<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include "connection.php";
  $team_name = $_POST["team_name"];
  $material = $_POST["material"];
  $unique_id = $_POST["unique_id"];
  $initial_condn = $_POST["initial_condn"];
  $final_condn = $_POST["final_condn"];
      $sql = "INSERT INTO `ptps_data` (`s.n`, `team_name`, `material`, `unique_id`, `initial_condn`, `final_condn`, `updated_at`) VALUES (NULL, '$team_name', '$material', '$unique_id', '$initial_condn', '$final_condn', current_timestamp())";
      $result = mysqli_query($conn, $sql);
      if ($result) {
    echo "Data inserted successfully";
    }
    else {
        echo "Something went wrong";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body style="background-color:#018a8a;">
    <h3>Records of miscellaneous activites of Vertex hacks!</h3>
    <div class="container">
        <form action="" method="POST">
            <input type="text" placeholder="Team name" name="team_name"> <br> <br>
            <div class="record">
                <input type="text" placeholder="Material" name="material">
                <input type="text" placeholder="Unique identity" name="unique_id"> &nbsp;
                <input type="text" placeholder="Initial Condition" name="initial_condn"> &nbsp;
                <input type="text" placeholder="Final Condition" name="final_condn"> &nbsp;
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>