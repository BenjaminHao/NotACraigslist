<?php include('header.php');?>

<?php

$loginerr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")  {

    //Check if the user has filled in all the details

    if (empty($_POST['username']) or empty($_POST['password'])) {
        $loginerr = 'Please fill in all the required fields';
    }
    else {
        // Save username and password
        $username = ($_POST['username']);
        $password = ($_POST['password']);

        //Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "notacraigslist");

        if (!$conn) {
            die ("Connection failed " . $conn->errno);
        }

        //Retrieve data from the database
        $sql = "SELECT id FROM `notacraigslist`.`users`  WHERE `username` = '$username' AND `password` = '$password'";

        //Display error message if connection fails.
        if (!mysqli_query($conn, $sql)) {
            echo "Failed to connect to the database :" . $sql . mysqli_error($conn);
        }

        //Save the result
        $result = mysqli_query($conn, $sql);

        // Display the output for each row retrived
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $username;
                header("Location:index.php");
            }
        }
        else {
            $loginerr =  "The username and password do not match!";
        }

    }
}
?>
<form class="form-signin" method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype = "multipart/form-data">

    <h1 class="h3 mb-3 font-weight-normal">Please log in</h1>
    <label for="inputUsername" class="sr-only">Username</label>
    <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <p class="error"><?php if(!empty($loginerr)) echo $loginerr;?></p>
    <button  class="btn btn-lg btn-primary btn-block" type="submit" value="Login">Log in</button><br>
    <p>Don't have an account? <a href="User_Register.php">Register!</a></p>
    <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
</form>
<?php include('footer.php');?>

