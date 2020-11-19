<?php 

// The following lines connect the page to a database.  If you dont have a database set up comment it out
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiger_park";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



  $sql = "SELECT * FROM `garage_info`";
  $result = mysqli_query($conn,$sql);

  $garage = array();
    while ($row = mysqli_fetch_array($result)) {
  $garage[] = $row['name'];
  }

// var_dump($garage);

  $sql = "SELECT * FROM `garage_info`";
  $result = mysqli_query($conn,$sql);

  $available = array();
    while ($row = mysqli_fetch_array($result)) {
  $available[] = $row['spaces_taken']; 
  }

// var_dump($available);

  $sql = "SELECT * FROM `garage_info`";
  $result = mysqli_query($conn,$sql);

  $totalSpace = array();
    while ($row = mysqli_fetch_array($result)) {
  $totalSpace[] = $row['total_spaces']; 
  }

 // var_dump($totalSpace);


// Update Glen Garage by +1
  if (isset($_POST['glenEnter']))
  {

    $available[0] += 1;
    $sql = "UPDATE garage_info SET spaces_taken=$available[0] WHERE id=1";

    if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
  }

// Update Glen Garage by -1  

  if (isset($_POST['glenLeave']))
  {

    $available[0] -= 1;
    $sql = "UPDATE garage_info SET spaces_taken=$available[0] WHERE id=1";

    if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
  }

// Update Towson Town by +1
if (isset($_POST['towsonTownEnter']))
{

  $available[1] += 1;
  $sql = "UPDATE garage_info SET spaces_taken=$available[1] WHERE id=2";

  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

// Update Towson Town by -1  
if (isset($_POST['towsonTownLeave']))
{

  $available[1] -= 1;
  $sql = "UPDATE garage_info SET spaces_taken=$available[1] WHERE id=2";

  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}


// Update Union by +1
if (isset($_POST['unionEnter']))
{

  $available[2] += 1;
  $sql = "UPDATE garage_info SET spaces_taken=$available[2] WHERE id=3";

  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

// Update Union by -1  
if (isset($_POST['unionLeave']))
{

  $available[2] -= 1;
  $sql = "UPDATE garage_info SET spaces_taken=$available[2] WHERE id=3";

  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}


// Update West Village by +1
if (isset($_POST['westVillageEnter']))
{

  $available[3] += 1;
  $sql = "UPDATE garage_info SET spaces_taken=$available[3] WHERE id=4";

  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

// Update West Village by -1  
if (isset($_POST['westVillageLeave']))
{

  $available[3] -= 1;
  $sql = "UPDATE garage_info SET spaces_taken=$available[3] WHERE id=4";

  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Tiger Park</title>
  </head>
  <body>
    <!--<form action="<?php //$_PHP_SELF ?>" method="POST">

        <table class="center">

        <tr>
          <th>Garage</th>
          <th>Available Space</th>
        </tr>
        <tr>
          <td><?php //echo $garage[0];?></td>
          <td><?php //echo $available[0];?>/<?php //echo $totalSpace[0];?></td>
        </tr>
        <tr>
        <td><?php// echo $garage[1];?></td>
        <td><?php// echo $available[1];?>/<?php //echo $totalSpace[1];?></td>
        </tr>
        <tr>
          <td><?php //echo $garage[2];?></td>
          <td><?php// echo $available[2];?>/<?php //echo$totalSpace[2];?></td>
        </tr>
        <tr>
          <td><?php //echo $garage[3];?></td>
          <td><?php// echo $available[3];?>/<?php// echo $totalSpace[3];?></td>
        </tr>
      </table>

      <button type="submit" name="glenEnter">Glen Enter</button>
      <button type="submit" name="glenLeave">Glen Leave</button> <br>
      <button type="submit" name="towsonTownEnter">Towson Town Enter</button>
      <button type="submit" name="towsonTownLeave">Towson Town Leave</button> <br>
      <button type="submit" name="unionEnter">Union Enter</button>
      <button type="submit" name="unionLeave">Union Leave</button> <br>
      <button type="submit" name="westVillageEnter">West Village Enter</button>
      <button type="submit" name="westVillageLeave">West Village Leave</button>

    </form>-->




<div class="jumbotron">
  <h2 class="display-3">Tiger Park</h2>
  <form action="<?php $_PHP_SELF ?>" method="POST">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Garage</th>
          <th scope="col">Available Space</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-active">
          <td><?php echo $garage[0];?></td>
          <td><?php echo $available[0];?>/<?php echo $totalSpace[0];?></td>
        </tr>
        <tr class="table-active">
          <td><?php echo $garage[1];?></td>
          <td><?php echo $available[1];?>/<?php echo $totalSpace[1];?></td>
        </tr>
        <tr class="table-active">
          <td><?php echo $garage[2];?></td>
          <td><?php echo $available[2];?>/<?php echo $totalSpace[2];?></td>
        </tr>
        <tr class="table-active">
          <td><?php echo $garage[3];?></td>
          <td><?php echo $available[3];?>/<?php echo $totalSpace[3];?></td>
        </tr>
      </tbody>
  </table>
  <br>
  <br>
  <p>These buttons are only here for the prototype to represent garage sensor data and will be removed in the final product </p>
  <table class="table table-hover">
    <tr>
      <td><button type="submit" name="glenEnter" class="btn btn-primary">Glen Enter</button></td>
      <td><button type="submit" name="glenLeave" class="btn btn-primary">Glen Leave</button></td>
    </tr>
    <tr>
      <td><button type="submit" name="towsonTownEnter" class="btn btn-primary">Towson Town Enter</button></td>
      <td><button type="submit" name="towsonTownLeave" class="btn btn-primary">Towson Town Leave</button></td>
    </tr>
    <tr>
      <td><button type="submit" name="unionEnter" class="btn btn-primary">Union Enter</button></td>
      <td><button type="submit" name="unionLeave" class="btn btn-primary">Union Leave</button></td>
    <tr>
    <tr>
      <td><button type="submit" name="westVillageEnter" class="btn btn-primary">West Village Enter</button></td>
      <td><button type="submit" name="westVillageLeave" class="btn btn-primary">West Village Leave</button></td>
    <tr>
  <table>



  </form>




</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>

