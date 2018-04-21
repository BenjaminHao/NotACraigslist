<?php include('header.php');?>
    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>NotACraigslist</h1>
            <h3>Group Project</h3>
            <p>This is the group project for COMP3975</p>
            <p>By Benjamin Hao, Xian Chen</p>
        </div>
<!--        <div class="col-md-3">-->
<!--            <h3><i class="fa fa-star"></i> Featured Ad</h3>-->
<!--            <h5>--><?//= $ads[2][1];?><!--</h5>-->
<!--            <h5>--><?//= $ads[2][2];?><!--</h5>-->
<!--            <a href="Ad_List.php.php?id=2">Visit</a>-->
<!--        </div>-->
        <div class="col-lg-12">
            <table class="table">
                <tr>
                    <th>For Sales</th>
                    <th>Services</th>
                    <th>Jobs</th>
                    <th>Country</th>
                    <th>Locations</th>
                </tr>
                <tr>
                    <td> <a href="Ad_List.php?link=books"> Books </a></td>
                    <td> <a href="Ad_List.php?link=computer"> Computer </a></td>
                    <td> <a href="Ad_List.php?link=fulltime"> Full-Time </a></td>
                    <td> <a href="Ad_List.php?link=canada"> Canada </a></td>
                    <td> <a href="Ad_List.php?link=vancouver"> Vancouver </a></td>
                </tr>
                <tr>
                    <td> <a href="Ad_List.php?link=electronics"> Electronics </a></td>
                    <td> <a href="Ad_List.php?link=financial"> Financial </a></td>
                    <td> <a href="Ad_List.php?link=parttime"> Part-Time </a></td>
                    <td> <a href="Ad_List.php?link=usa"> USA </a></td>
                    <td> <a href="Ad_List.php?link=newyork"> NewYork </a></td>
                </tr>
                <tr>
                    <td> <a href="Ad_List.php?link=household"> Household </a></td>
                    <td> <a href="Ad_List.php?link=automobiles"> Automobiles </a></td>
                    <td> <a href="Ad_List.php?link=volunteering"> Volunteering </a></td>
                    <td> <a href="Ad_List.php?link=china"> China </a></td>
                    <td> <a href="Ad_List.php?link=beijing"> Beijing </a></td>
                </tr>
            </table>
        </div>


    </div> <!-- /container -->

<?php include('footer.php');?>