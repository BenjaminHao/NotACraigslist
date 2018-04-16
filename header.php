<?php
    session_start();
    if (!isset($_SESSION['user_id'])) $_SESSION['user_id'] = null;
    //Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "notacraigslist");

    if (!$conn) {
        die ("Connection failed " . $conn->errno);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<!--    <link rel="icon" href="../../favicon.ico">-->

    <title>NotACraigslist</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">
<!--    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <!-- Bootstrap theme -->
    <link href="./css/bootstrap-theme.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!--    <link href="theme.css" rel="stylesheet">-->
</head>

<body class="text-center" role="document">
<?php include_once 'navbar.php';?>
