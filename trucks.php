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
                            Trucks to Load
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-truck"></i> Find a Truck
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                  
                   <div class="col-lg-9">
                      
                             <?php
                                                          

                                $advert = new truck;
                                $adverts = $advert->fetch_all();        
                                              ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>Truck</th>
                                                    <th>Trailer</th>
                                                    <!--th>Description</th-->
                                                    <th>Location</th>
                                                    <th>Date posted</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                       <?php foreach($adverts as $advert){ ?> 
                                                <tr>
                                                    <td><img src="images/trucks/<?php echo $advert['image']; ?>" width="40px" height="auto"></td>
                                                    <td><a href="./truckdetails.php?idtruck=<?php echo $advert['idtruck'] ?>"><?php echo $advert['title'] ?></a></td>
                                                    <td><?php echo $advert['trailer']; ?></td>
                                                    <!--td><?php echo $advert['description']; ?></td-->
                                                    <td><?php echo $advert['location']; ?></td>
                                                    <td><?php echo $advert['date']; ?></td>
                                                      <td><a href="./truckdetails.php?idtruck=<?php echo $advert['idtruck'] ?>">View details</a></td>
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