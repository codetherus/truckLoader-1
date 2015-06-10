<?php 
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$user_id = $_SESSION['id'];
$user = $_SESSION['email'];
require("./scripts/connect.php");
include_once("./lib/truck_header.php");
require_once("scripts/functions.inc");
$user = new User;
$loadPost = new Load;
$poster = new Poster;
?>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Load Zone
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cubes">&nbsp;</i><a href="load.php">Available Loads</a>
                            </li>
                            <li class="active">
                                <i class="fa"></i>Load
                            </li>
                        </ol>
                    </div>
                </div>
                      <!-- /.row -->
                <div class="row">
                  
                   <div class="col-lg-6">
                       <?php
                             if($user && $user_id){

                   		if(isset($_GET['idload'])){
                   			$id = $_GET['idload'];
							$loadPost = $loadPost->fetch_data($id);
							$poster_id = $loadPost['poster_id'];
							$poster = $poster->displayUser($poster_id);
							
                   		?>

                   		<h3><?php echo $loadPost['title'] ?></h3><br>
						
												

						<table class="table table-bordered table-hover table-striped loadDetails">
								<tr>
									<td>Date posted</td>
									<td><font style="color:red; font-weight:bold;"><?php echo $loadPost['date']; ?></font></td>
								</tr>
								<tr>
									<td>Load weight</td>
									<td><?php echo $loadPost['weight']; ?></td>
								</tr>
								<tr>
									<td>Load category</td>
									<td><?php echo $loadPost['category']; ?></td>
								</tr>
								<tr>
									<td>Collection</td>
									<td><?php echo $loadPost['collection']; ?></td>
								</tr>
								<tr>
									<td>collection Address</td>
									<td><?php echo $loadPost['collection_address']; ?></td>
								</tr>
								<tr>
									<td>Destination</td>
									<td><?php echo $loadPost['destination']; ?></td>
								</tr>
								<tr>
									<td>Destination Address</td>
									<td><?php echo $loadPost['destination_address']; ?></td>
								</tr>
								
								<tr>
									<td>Load description</td>
									<td><?php echo $loadPost['description']; ?></td>
								</tr>

						</table>

                            	
                    </div>
                  
                     <div class="col-lg-4">
                      
                      		<h3>Posted by : <?php echo $poster['name']; ?></h3><br>
						
												

						<table class="table table-bordered table-hover table-striped loadDetails">
								
								<tr>
									<td>Poster</td>
									<td><?php echo $poster['name']; ?></td>
								</tr>
								<tr>
									<td>Company</td>
									<td><?php echo $poster['company']; ?></td>
								</tr>
								<tr>
									<td>Phone</td>
									<td><?php echo $poster['phone']; ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><a href="mailto:<?php echo $poster['email']; ?>"><?php echo $poster['email']; ?></a></td>
								</tr>
								<tr>
									<td>Description</td>
									<td><?php echo $poster['description']; ?></td>
								</tr>
								
						</table> 
						<?php
					}else{

								echo "There must be an error with this Post. Please refresh your browser and attempt to open the item again.";
									
								
								}
				
                      }else{

                            echo "Please login to access this page <a href='./login.php'>Login here</a>. If you are not registered please <a href='./register.php'>Register here</a>.<br>If you are experiencing problems Loging in or Registering please send us your query via our <a href='./contact.php'>Contact page</a>.";
                          }
                      ?> 	
                    </div>	



                </div>
                <!-- /.row -->
               

                <div class="row">
                    <div class="col-lg-6">
                           </div>
                </div>
             <!-- /.row -->

   <?php include_once("lib/truck_footer.php"); ?>