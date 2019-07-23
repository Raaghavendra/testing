<?php
  include('conn.php');
  if(isset($_POST['submit'])){
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $debit = mysqli_real_escape_string($conn, $_POST['debit']);
  $credit = mysqli_real_escape_string($conn, $_POST['credit']);

  $q = "INSERT INTO accounts ( date , description, debit, credit) values ('$date','$description','$debit','$credit')";
  if(mysqli_query($conn, $q)){
    echo "sucessfully entered $description's bill";
  }
}
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Accounts</title>
    <link rel="stylesheet" href="style.css">
  </head>


  <body>
    <div class="but">
    <a href="index.html"> <button>Home</button> </a>
    </div>
    <div class="box">
      <h1>Day Book :</h1>
      <form class="frm" action="accounts.php" method="post">
      <p><input type="date" name="date"> </p>
      <p><input name="description" type="text" placeholder="Description"> </p>
      <p><input type="number" name="debit" placeholder="Debit amount"> </p>
      <p><input type="number" name="credit" placeholder="Credit amount"> </p>
      <p><input type="Submit" name="submit" value="Submit"> </p>
      </form>

    </div>

  </body>
</html>
