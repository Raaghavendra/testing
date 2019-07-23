<?php
include('conn.php');
if(isset($_POST['submit'])){
$hid = mysqli_real_escape_string($conn, $_POST['hid']);
$avenue = mysqli_real_escape_string($conn, $_POST['avenue']);
$doorNo = mysqli_real_escape_string($conn, $_POST['doorNo']);
$ownerName = mysqli_real_escape_string($conn, $_POST['ownerName']);
$ownerNo = mysqli_real_escape_string($conn, $_POST['ownerNo']);
$tenantName = mysqli_real_escape_string($conn, $_POST['tenantName']);
$tenantNo = mysqli_real_escape_string($conn, $_POST['tenantNo']);

$q = "INSERT INTO houses (hid, avenue, doorNo, ownerName, ownerNo, tenantName, tenantNo) VALUES ('$hid', '$avenue','$doorNo', '$ownerName', '$ownerNo', '$tenantName', '$tenantNo') ";
$q1 = "UPDATE `houses` SET `1` = 'not paid', `2` = 'not paid', `3` = 'not paid', `4` = 'not paid', `5` = 'not paid', `6` = 'not paid', `7` = 'not paid', `8` = 'not paid', `9` = 'not paid', `10` = 'not paid', `11` = 'not paid', `12` = 'not paid' WHERE `hid` LIKE '$hid' ";

if(mysqli_query($conn, $q)){
  echo "sucessfully added house ID -- $hid -- details";
}
mysqli_query($conn, $q1);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Houses</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="but">
    <a href="index.html"> <button>Home</button> </a>
    </div>

    <div class="box">
     <form class="frm" action="houses.php" method="post">
       <p><input type="text" name="hid" placeholder="House ID"> </p>
      <p><input type="text" name="doorNo" placeholder="Door Number"></p>
      <p><input type="text" name="avenue" placeholder="Avenue"></p>
      <p><input type="text" name="ownerName" placeholder="Owner Name"></p>
      <p><input type="text" name="ownerNo" placeholder="Owner Number"></p>
      <p><input type="text" name="tenantName" placeholder="Tenant Name"></p>
      <p><input type="text" name="tenantNo" placeholder="Tenant Number"></p>
      <p><input type="Submit" name="submit" value="Submit"> </p>
     </form>
    </div>
  </body>
</html>
