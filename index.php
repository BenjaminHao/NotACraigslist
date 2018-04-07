<? include('header.php');?>
<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 2018-04-09
 * Time: 2:06 PM
 */

require_once('ad_manager.php');
require_once ('ads.class.php');

//function read_csv(){
//    $ads = [];
//    $handle = fopen('ads.csv', 'r');
//    while(!feof($handle)){
//        $row = fgetcsv($handle);
//        if(is_array($row)){
//            $ads[] = $row;
//        }
//    }
//    fclose($handle);
//    return $ads;
//}
//
//$ads = read_csv();

?>
    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>NotACraigslist</h1>
            <h3>Group Project</h3>
            <p>This is the group project for COMP3975</p>
            <p>By Benjamin Hao, Xian Chen</p>
        </div>
        <div class="col-md-3">
            <h3><i class="fa fa-star"></i> Featured Ad</h3>
            <h5><?= $ads[2][1];?></h5>
            <h5><?= $ads[2][2];?></h5>
            <a href="ad_view.php?id=2">Visit</a>

        </div>
        <div class="col-md-9">
            <table class="table">
                <tr>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Created By</th>
                    <th>Created Date</th>
                    <th>Contat</th>
                </tr>
                <?php foreach($ads as $index => $ad):?>
                    <tr>
                        <td><?= $ad[0];?></td>
                        <td><a href="ad_view.php?id=<?=$index;?>"><?= $ad[1];?></a></td>
                        <td><?= $ad[3];?></td>
                        <td><?= $ad[5];?></td>
                        <td><?= $ad[4];?></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>


    </div> <!-- /container -->

<? include('footer.php');?>