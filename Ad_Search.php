<?php include('header.php');?>
<?php
$title = $price = $email = $description = "";

$search = $_POST['search'];

//Retrieve the data from the database - Fetch query
$sql = "SELECT * FROM `Posts` WHERE `Title` LIKE '$search%'";

//Display error message if connection fails.
if (!mysqli_query($conn, $sql)) {
    echo "Failed to connect to the database :" . $sql . mysqli_error($conn);
}

$result = mysqli_query($conn, $sql);

// Display the output for each row retrived
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<ul><p><li>Title: ".$row['Title']."</li></p>".
            "<p>Price/Salary: ".$row['Price']."</p>".
            "<p>Email: ".$row['Email']."</p></ul>";
        echo "<br>";
    }
}
else {
    echo "<h1>No results found</h1>";
}

//Close the database connection
mysqli_close($conn);
?>
<?php include('footer.php');?>

