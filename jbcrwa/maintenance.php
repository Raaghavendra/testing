<?php
include('conn.php');
if(isset($_POST['submit'])){
$hid = mysqli_real_escape_string($conn, $_POST['hid']);
$reciptNo = mysqli_real_escape_string($conn, $_POST['reciptNo']);
$month = mysqli_real_escape_string($conn, $_POST['month']);


$q = "INSERT INTO maintenance (hid, reciptNo, month) VALUES ('$hid', '$reciptNo', '$month')" ;
$q1 = "UPDATE `houses` SET `$month` = 'paid' WHERE `houses`.`hid` like $hid " ;

if(mysqli_query($conn, $q) && mysqli_query($conn, $q1)){
  echo "sucessfully added $reciptNo ";
}
}
else{
  echo "unsucessful!!";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Maintenance</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="but">
      <a href="index.html"> <button>Home</button> </a>
    </div>


    <div class="box">
     <form class="frm" action="maintenance.php" method="post">
       <p><input type="text" name="hid" placeholder="House ID"> </p>
      <p><input type="number" name="reciptNo" placeholder="Recipt Number"></p>
      <p><input type="number" name="month" placeholder="Month" value=<?php echo intval(date('m'));?> ></p>
      <p><input type="Submit" name="submit" value="Submit"> </p>
     </form>
    </div>
  </body>
</html>
