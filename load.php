<?php 
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$user_id = $_SESSION['id'];
$user = $_SESSION['email'];
require("./scripts/connect.php");
include_once("./lib/truck_header.php");
require_once("./scripts/functions.inc");
$user = new User;
?>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Available Loads
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cubes"></i> Available Loads
                            </li>
                        </ol>
                    </div>
                </div>
                      <!-- /.row -->
                <div class="row">
                  
                   <div class="col-lg-9">
                       
                                <?php                          

                                $advert = new Load;
                                $adverts = $advert->fetch_all();        
                                              ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Collection</th>
                                                    <th>Destination</th>
                                                    <th>Date posted</th>
                                                </tr>
                                            </thead>
                                          
                                            <tbody>
                                                 <?php foreach($adverts as $advert){ ?> 
                                                <tr>
                                                    <td><a href="./loadDetails.php?idload=<?php echo $advert['idload'] ?>"><?php echo $advert['title']; ?></a></td>
                                                    <td><?php echo $advert['category']; ?></td>
                                                    <td><?php echo $advert['collection']; ?></td>
                                                    <td><?php echo $advert['destination']; ?></td>
                                                    <td><?php echo $advert['date']; ?></td>
                                                     <td><a href="./loadDetails.php?idload=<?php echo $advert['idload'] ?>">View details</a></td>
                                           
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                  
                    </div>
                  
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                           </div>
                </div>
             <!-- /.row -->

   <?php include_once("lib/truck_footer.php"); ?>