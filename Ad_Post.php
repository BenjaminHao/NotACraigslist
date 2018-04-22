<?php include('header.php');?>
<?php

// defining variables to store the data entered in the form and the error messages
$subcategory = $location = $title = $price = $description = $email = $confirmemail = $terms = $image1 = $image2 = $image3 = $image4 = $resetvalue = "";
$titleerr = $priceerr =  $emailerr = $conferr = $termerr = $image1err = $image2err = $image3err = $image4err = "";

//Code to be executed when user presses submit button
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

    //Connecting to the database
    $conn = mysqli_connect("localhost", "root", "", "notacraigslist");
    if (!$conn) {
        die ("Connection failed " . $conn->errno);
    }

    //validating the inputs
    $subcategory = test_input($_POST["subcategory"]);

    $location = test_input($_POST["location"]);

    //Title should have only alphabets
    $title = test_input($_POST["title"]);
    if (!empty ($title)){
        if (!preg_match ("/^[a-zA-Z\- ]*$/", $title)){
            $titleerr = "Only alphabets allowed";
        }
    }

    //Price should have only numbers with decimal point
    $price = test_input($_POST["price"]);
    if (!empty($price)){
        if (!preg_match ("/^[0-9\.]*$/", $price)){
            $priceerr = "Only numbers allowed";
        }
    }

    $description = test_input($_POST["description"]);

    //Validate email ID
    $email = test_input($_POST["email"]);
    if (!empty ($email)){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailerr = "Invalid email";
        }
    }

    //the email Id and conform email Id should match
    $confirmemail = test_input($_POST["confirmemail"]);
    if (!empty($confirmemail)){
        if (!filter_var($confirmemail, FILTER_VALIDATE_EMAIL)){
            $conferr = "Invalid email";
        } else {
            if ($email != $confirmemail){
                $conferr = "The email and confirm email do not match";
            }
        }
    }

    if (empty($_POST["terms"])){
        $termerr = "Please agree to the terms and conditions";
    } else {
        $terms = test_input($_POST["terms"]);
    }

    //Checking if the file uplaoded is an image file

    if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
        $image1 = $_FILES['file1']['name'];
        $check = getimagesize($_FILES["file1"]["tmp_name"]);
        if ($check == false) {
            $image1err = "It is not an image file.Kindly upload an image file";
        }
    }

    if (is_uploaded_file($_FILES['file2']['tmp_name'])) {
        $image2 = $_FILES["file2"]["name"];
        $check = getimagesize($_FILES["file2"]["tmp_name"]);
        if ($check == false) {
            $image2err = "It is not an image file.Kindly upload an image file";
        }
    }

    if (is_uploaded_file($_FILES['file3']['tmp_name'])) {
        $image3 = $_FILES["file3"]["name"];
        $check = getimagesize($_FILES["file3"]["tmp_name"]);
        if ($check == false) {
            $image3err = "It is not an image file.Kindly upload an image file";
        }
    }

    //inserting the data into the table
    if ((empty($titleerr)) and (empty($priceerr)) and (empty($emailerr)) and (empty($conferr)) and (empty($termerr)) and (empty($image1err)) and (empty($image2err)) and (empty($image3err)) and (empty($image4err))) {
        $sql = "INSERT INTO `notacraigslist`.`Posts` (`Title`, `Price`, `Description`, `Email`, `Agreement`, `Image_1`, `Image_2`, `Image_3`, `Image_4`,`Subcategory_ID`, `Location_ID`)  SELECT '$title', '$price', '$description', '$email', '$terms', '$image1', '$image2', '$image3', '$image4', `SubCategory_ID`, `Location_ID` FROM `SubCategory`, `Location` WHERE `SubCategoryName` = '$subcategory' AND `LocationName` = '$location'";

        if (!mysqli_query($conn, $sql)) {
            echo "New record not created. The error :" . $sql . mysqli_error($conn);
        }
    }

    //close the connection to the database
    mysqli_close($conn);
}

//function to remove the unwanted charactrs from the data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<div class="container">
    <form role="form" method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype = "multipart/form-data">
        <h3><u>New Post</u></h3>
        <div class="form-group">
            <label for="Sub-Category">Sub-Category</label>
            <select name="subcategory" class="from-control">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {?>
                    <option value="<?php echo $subcategory;?>" selected="selected"><?php echo $subcategory;?></option> <?php } ?>
                <option value="Books">Books</option>
                <option value="Electronics">Electronics</option>
                <option value="Household">Household</option>
                <option value="Computer">Computer</option>
                <option value="Financial">Financial</option>
                <option value="Automobiles">Automobiles</option>
                <option value="Full-Time">Full-Time</option>
                <option value="Part-Time">Part-Time</option>
                <option value="Volunteering">Volunteering</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Location">Location</label>
            <select name="location">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {?>
                    <option value="<?php echo $location;?>" selected="selected"><?php echo $location;?></option> <?php } ?>
                <option value="Cupertino">Cupertino</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Stockholm">Stockholm</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $title;?>">
            <span class ="error"><?php echo $titleerr;?></span>
        </div>
        <div class="form-group">
            <label for="Price/Salary">Price/Salary
            <input type="text" size="5" name="price" value="<?php echo $price;?>">
            <span class ="error"> <?php echo $priceerr;?> </span>
        </div>
        <div>
            <label for="Description">Description</label>
            <textarea name="description" rows=5 cols =30 ><?php echo $description;?></textarea>
        </div>
        <div class="form-control">
            <label for="Email">Email</label>
            <input type="text" size="50" name="email" value="<?php echo $email;?>">
            <span class ="error"> <?php echo $emailerr;?></span>
            <label for="Confirm Email">Confirm Email</label>
            <input type="text" size="50" name="confirmemail" value="<?php echo $confirmemail;?>">
                <span class ="error"><?php echo $conferr;?></span>
        </div>
        <div class="form-group">
            I agree with terms and conditions <input type="checkbox" name="terms" <?php if (isset($terms) && $terms=="checked") echo "checked";?> value="checked">
            <span class = "error"><?php echo $termerr;?></span>
        </div>
        <div>
            Optional fields:
            <p>Image 1 (max 5 MB): <input type="text" name="image1" value="<?php echo $image1;?>"><input type="file" style="color:transparent" name="file1">
                <span class ="error"><?php echo $image1err;?></span></p>
            <p>Image 2 (max 5 MB): <input type="text" name="image2" value="<?php echo $image2;?>"> <input type="file" style="color:transparent" name="file2">
                <span class ="error"><?php echo $image2err;?></span></p>
            <p>Image 3 (max 5 MB): <input type="text" name="image3" value="<?php echo $image3;?>"><input type="file" style="color:transparent" name="file3">
                <span class ="error"><?php echo $image3err;?></span></p>
        </div>
        <div>
        <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
        <button type="reset" class="btn btn-danger" value="Reset">Reset</button>
        </div>
        <div>
        <p><a href="index.php" >Go Back</a></p>
        </div>
    </form>
</div>

<?php include('footer.php');?>

