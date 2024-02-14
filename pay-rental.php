<?php
session_start();
include "includes/config.php"; 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tblbooking WHERE VehicleId = $id";
    $query = $dbh -> prepare($sql);
    $query->execute();
    var_dump($query);
    while($result = $query->fetchAll(PDO::FETCH_OBJ)){
        echo $result[0]->message;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Now</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!--Custome Style -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!--OWL Carousel slider-->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <!--slick-slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!--bootstrap-slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div class="col-md-9 px-4 py-4 mt-3">
        <p class="text-center mt-3 mb-3">
            Your booking will be successfull once you complete the payment process.
        </p>
    </div>
    <br>
    <div>
        <form action="https://uat.esewa.com.np/epay/main" method="POST">
        <input value="" name="tAmt" type="hidden">
        <input value="90" name="amt" type="hidden">
        <input value="5" name="txAmt" type="hidden">
        <input value="2" name="psc" type="hidden">
        <input value="3" name="pdc" type="hidden">
        <input value="EPAYTEST" name="scd" type="hidden">
        <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
        <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
        <input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">
        <input value="Submit" type="submit" class="btn btn-success">
        </form>
    </div>
</body>
</html>