<!-- Fixed navbar -->
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Not A Craig's List</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="Ad_Post.php">New Post</a></li>
                <li class="disabled"><a href="#">About</a></li>
                <?php if ($_SESSION['user_id'] == null) echo ("<li class='active navbar-'><a href='User_Login.php'>Login</a></li>");
                else {echo("<li class='active navbar-right'><a href='User_Logout.php'>Logout</a></li>");}?>
            </ul>
            <form class="navbar-form" method = "post" action = "Ad_Search.php">
                <input class="input-sm" type ="text" name="search" placeholder="Search">
                <input class="btn-success" type="Submit" value="Submit">
                <input class="btn-danger" type="reset" value="Reset">
            </form>
        </div><!--/.nav-collapse -->
    </div>
</div>