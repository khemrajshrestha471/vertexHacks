<?php 
include "connection.php"; 
$insert = false;
$update = false;
$delete = false;

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `ptps_data` WHERE `s.n` = $sno";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['snoEdit'])){
  // Update the record
  $sno = $_POST["snoEdit"];
  $team_name=$_POST['team_nameE'];
  $material = $_POST['materialE'];
  $unique_id = $_POST['unique_idE'];
  $initial_condn = $_POST['initial_condnE'];
  $final_condn = $_POST['final_condnE'];
  $updated_at = date("Y-m-d H:i:s");
  // Sql query to be executed
  $sql = "UPDATE `ptps_data` SET `team_name` = '$team_name' , `material` = '$material',`unique_id`='$unique_id',`initial_condn`='$initial_condn',`final_condn`='$final_condn',`updated_at`='$updated_at' WHERE `ptps_data`.`s.n` = $sno";
  $result = mysqli_query($conn, $sql);
  if($result){
    $update = true;
}
else{
    echo "We could not update the record successfully";
}
}
else{
  $team_name=$_POST['team_name'];
  $material = $_POST['material'];
  $unique_id = $_POST['unique_id'];
  $initial_condn = $_POST['initial_condn'];
  $final_condn = $_POST['final_condn'];
  $updated_at = date("Y-m-d H:i:s");

  $existSql = "SELECT * from `ptps_data` where unique_id = '$unique_id'";
  $data_exist = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($data_exist);

  if ($numExistRows > 0) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Same Unique ID already exists for other material! Try again with different ID.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} else {
  // Sql query to be executed
  $sql = "INSERT INTO ptps_data ( team_name, material, unique_id, initial_condn, final_condn, updated_at) VALUES ('$team_name', '$material', '$unique_id', '$initial_condn', '$final_condn', '$updated_at')";
  $result = mysqli_query($conn, $sql);

   
  if($result){ 
      $insert = true;
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
}
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Records Vertex Hacks</title>
  <!-- linking to the css -->
  <link rel="stylesheet" href="style.css">
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!-- fontawesome for icons -->
  <script src="https://kit.fontawesome.com/fc3c2c9f3c.js" crossorigin="anonymous"></script>
  <!-- favicon -->
  <link rel="shortcut icon" href="images/fav.jpg">

  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

  <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  <script>$(document).ready(function () {
      $('#myTable').DataTable();
    });</script>

</head>


<body style="background-color:#018a8a;">
<!-- Modal Here -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editModalLabel">Edit Record</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="index.php" method="POST">
          <div class="modal-body">
            <div class="record-m">
              <input type="hidden" name="snoEdit" id="snoEdit">
              Team Name:<input type="text" placeholder="Team name" id="team_nameE" name="team_nameE">
              Material Name:<input type="text" placeholder="Material" id="materialE" name="materialE">
              Material UID:<input type="text" placeholder="Unique identity" id="unique_idE" name="unique_idE">
              Initial Condition:<input type="text" placeholder="Initial Condition" id="initial_condnE" name="initial_condnE">
              Final Condition:<input type="text" placeholder="Final Condition" id="final_condnE" name="final_condnE">
              <!-- <button type="submit" class="btn btn-success">Update</button> -->
            </div>
            <br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- Modal ends Here -->





  <div class="container mt-4">
    <h3>Records of miscellaneous activites in Vertex hacks</h3>
    <div class="alert-area">
      <!-- Alerts Here -->
      <?php 
    if($insert){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Insertion Success!</strong> Your record has been inserted successfully.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }
    ?>
      <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Deletion Success!</strong> Your record has been deleted successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }
  ?>
      <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Update Success!</strong> Your record has been updated successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }
  ?>
  <!-- Alert Ends Here -->
    </div>
  </div>

  <!-- forms for submit the data -->
  <div class="container">
    <form action="index.php" method="POST">
      <input type="text" placeholder="Team name" name="team_name"> <br> <br>
      <div class="record">
        <input type="text" placeholder="Material" name="material">
        <input type="text" placeholder="Unique identity" name="unique_id"> &nbsp;
        <input type="text" placeholder="Initial Condition" name="initial_condn"> &nbsp;
        <input type="text" placeholder="Final Condition" name="final_condn"> &nbsp;
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <div class="container">
<br> <br>

    <table class="table table-data" style="background-color:#efefef;" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.N</th>
          <th scope="col">Team Name</th>
          <th scope="col">Material Name</th>
          <th scope="col">Material UID</th>
          <th scope="col">Initial Condition</th>
          <th scope="col">Final Condition</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "connection.php";
    $sql = "SELECT * FROM `ptps_data`";
    $sno = 0;
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
      $sno = $sno + 1;
      echo "<tr>
      <th scope='row'>".$sno."</th>
      <td>".$row['team_name']."</td>
      <td>".$row['material']."</td>
      <td>".$row['unique_id']."</td>
      <td>".$row['initial_condn']."</td>
      <td>".$row['final_condn']."</td>
      <td> <button class='edit btn btn-sm btn-primary' id=".$row['s.n'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['s.n'].">Delete</button>  </td>
    </tr>";
    }
    ?>

      </tbody>
    </table>
  </div>

  <!-- this is the logic part -->
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        tr = e.target.parentNode.parentNode;
        team = tr.getElementsByTagName("td")[0].innerText;
        material = tr.getElementsByTagName("td")[1].innerText;
        uid = tr.getElementsByTagName("td")[2].innerText;
        ic = tr.getElementsByTagName("td")[3].innerText;
        fc = tr.getElementsByTagName("td")[4].innerText;
        team_nameE.value = team;
        materialE.value = material;
        unique_idE.value = uid;
        initial_condnE.value = ic;
        final_condnE.value = fc;
        // get serial number from the button
        snoEdit.value = e.target.id;
        $('#editModal').modal('toggle');
      })
    })


    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        sno = e.target.id.substr(1);
        console.log(sno);
        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `index.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
  <!-- <script src="script.js"></script> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>




<!-- INSERT INTO `orgs` (`s.n`, `material`, `num_material`) VALUES ('1', 'Sleeping Bags', '50'); -->