<?php include('header.php');?>
<?php
$err = "";
$count = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['username']) or empty($_POST['password'])) {
        // At least one of the file is empty, display an error
        $err =  'Please fill all the fields.';
    }
    else {
        $username = ($_POST['username']);
        $password = ($_POST['password']);

        //Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "notacraigslist");

        if (!$conn) {
            die ("Connection failed " . $conn->errno);
        }

        //Check if the combination of username and password exists
        $sql = "SELECT id FROM `notacraigslist`.`login`  WHERE `username` = '$username' AND `password` = '$password'";

        //Display error message if connection fails.
        if (!mysqli_query($conn, $sql)) {
            echo "Failed to connect to the database :" . $sql . mysqli_error($conn);
        }

        //Save the result
        $result = mysqli_query($conn, $sql);

        // Display the output for each row retrived
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $count = $row['id'];
            }
        }

        if ($count == 0) {
            //Store data from the database
            $sql = "INSERT INTO `notacraigslist`.`login` (`username`,`password`) VALUES ('$username','$password')";

            //Display error message if connection fails.
            if (!mysqli_query($conn, $sql)) {
                $err =  "Failed to connect to the database :" . $sql . mysqli_error($conn);
            }
        }
        else {
            $err = "The username and password combination already exists";
        }
    }
}
?>
<form role="form" method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype = "multipart/form-data">
    <h1 for="Register" class="h3 mb-3 font-weight-normal">Register</h1>
    <label for="Username" class="sr-only">Username</label>
    <input type="text" id="username" class="form-control" placeholder="Please enter Username" name="username">
    <label for="Password" class="sr-only">Password</label>
    <input type="text" id="password" class="form-control" placeholder="Password" name="password">
    <button class="btn btn-lg btn-primary btn-block" type="submit" value="Register">Register</button>
    <?php if(!empty($err)) echo $err;?> <br>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($err)) {
        echo "Your registration is successful!";
        ?>
        <a href="index.php">Click here to login</a>
        <?php
    }
}
?>
<?php include('footer.php');?>




