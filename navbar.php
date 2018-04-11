<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
                <li class="active"><a href="#">About</a></li>
                <li><a href="Ad_Post.php">New Post</a></li>
                <li>
                <form method = "post" action = "Ad_Search.php">
                    <input type ="text" name="search" placeholder="Search">
                        <input class="btn-success" type="Submit" value="Submit">
                        <input class="btn-info" type="reset" value="Reset">
                </form></li>
                <li ><a href="User_Login.php">Login</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>