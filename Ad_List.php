<?php include('header.php');?>
<?php

$subcategory = $location = $sql = $title = $price = $email = $description = "";

//Connect to the database
$conn = mysqli_connect("localhost", "root", "", "NotACraigslist");

if (!$conn) {
    die ("Connection failed " . $conn->errno);
}

//Fetch the subcategory ID of the subcategory selected by the user
if (isset($_GET['link'])){
    switch ($_GET['link']) {
        case "books":
            $subcategory='11';
            break;
        case "electronics":
            $subcategory='12';
            break;
        case "household":
            $subcategory='13';
            break;
        case "computer":
            $subcategory='21';
            break;
        case "financial":
            $subcategory='22';
            break;
        case "automobiles":
            $subcategory='23';
            break;
        case "fulltime":
            $subcategory='31';
            break;
        case "parttime":
            $subcategory='32';
            break;
        case "volunteering":
            $subcategory='33';
            break;
        case "usa":
            $location='11';
            break;
        case "india":
            $location='21';
            break;
        case "sweden":
            $location='31';
            break;
        case "cupertino":
            $location='11';
            break;
        case "mumbai":
            $location='21';
            break;
        case "stockholm":
            $location='31';
            break;
    }
}

//Retrieve the data from the database - Fetch query
if (!empty($subcategory)) {
    $sql = "SELECT * FROM `Posts` WHERE `SubCategory_ID` = '$subcategory'";
}
if (!empty($location)) {
    $sql = "SELECT * FROM `Posts` WHERE `Location_ID` = '$location'";
}

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
    echo "<ul>No results found";
    echo "<br></ul>";
}

//Close the database connection
mysqli_close($conn);
?>
<?php include('footer.php');?>
