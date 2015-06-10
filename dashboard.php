<?php 
//error_reporting(E_ALL ^ E_NOTICE);
session_start();
//$user_id = $_SESSION['id'];
//$user = $_SESSION['email'];
require("./scripts/connect.php");
include_once("./lib/truck_header.php");
require_once("scripts/functions.inc");
$user = new User;
?>
              

             
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            <?php  

              if($user && $user_id){

                 $myTrailer = new Trailer;
                 $myTrailers = $myTrailer->postCount($user_id);

                 $myLoad = new Load;
                 $myLoads = $myLoad->postCount($user_id);

                 $myTruck = new Truck;
                 $myTrucks = $myTruck->postCount($user_id);

            ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>Welcome to your Dashboard: <small><?php echo "<b>$user->name</b>"?></small>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <i class="fa fa-cubes fa-2x"></i>&nbsp;My Loads 
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <div class="huge"><?php echo $myLoads['postLoad'] ?></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <a href="./load.php">
                                <div class="panel-footer">
                                    
                                    <span class="pull-right">View all Loads&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <i class="fa fa-2x fa-truck"></i>&nbsp;My Trucks
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <div class="huge"><?php echo $myTrucks['postTruck'] ?></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <a href="./trucks.php">
                                <div class="panel-footer">
                                    
                                    <span class="pull-right">View all Trucks&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                 
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <i class="fa  fa-2x fa-chain"></i>&nbsp;My Trailers
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <div class="huge"><?php echo $myTrailers['postTrailer'] ?></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <a href="./trailers.php">
                                <div class="panel-footer">
                                    
                                    <span class="pull-right">View all Trailers&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

              <div class="row">
            
              <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-share-alt-square fa-fw"></i>&nbsp;My Posts</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">



                                     <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Post ID</th>
                                                <th>Title</th>
                                                <th>Date posted</th>
                                            </tr>
                                        </thead>
                                        <?php

                                        $poster_id = $user_id;
                                        $myPost = new Poster;
                                        $post = $myPost->displayMyPost($poster_id);
                                        ?>
                                        <tbody>
                                            <?php foreach($post as $myPostTest){ ?>
                                            <tr>
                                                <td><?php echo $myPostTest['id']; ?></td>
                                                <td><?php echo $myPostTest['title']; ?></td>
                                                <td><?php echo $myPostTest['date']; ?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="text-right">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Tasks Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <span class="badge">just now</span>
                                        <i class="fa fa-fw fa-calendar"></i> Calendar updated
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">4 minutes ago</span>
                                        <i class="fa fa-fw fa-comment"></i> Commented on a post
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">23 minutes ago</span>
                                        <i class="fa fa-fw fa-truck"></i> Order 392 shipped
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">46 minutes ago</span>
                                        <i class="fa fa-fw fa-money"></i> Invoice 653 has been paid
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">1 hour ago</span>
                                        <i class="fa fa-fw fa-user"></i> A new user has been added
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">2 hours ago</span>
                                        <i class="fa fa-fw fa-check"></i> Completed task: "pick up dry cleaning"
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">yesterday</span>
                                        <i class="fa fa-fw fa-globe"></i> Saved the world
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">two days ago</span>
                                        <i class="fa fa-fw fa-check"></i> Completed task: "fix error on sales page"
                                    </a>
                                </div>
                                <div class="text-right">
                                    <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div-->
                  
                </div><!-- /.row -->


            <?php              
            }else{

                echo "Please login to access this page <a href='./login.php'>Login here</a>. If you are not registered please <a href='./register.php'>Register here</a>.<br>If you are experiencing problems Loging in or Registering please send us your query via our <a href='./contact.php'>Contact page</a>.";
              }
          
            include_once("lib/truck_footer.php"); 

            ?>