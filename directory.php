<?php 
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$user_id = $_SESSION['id'];
$user = $_SESSION['email'];
require("./scripts/connect.php");
include_once("./lib/truck_header.php");
require_once("scripts/functions.inc");
$user = new User;
$users = new Members; 
?>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Members directory
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-users"></i> All Members listing
                            </li>
                        </ol>
                    </div>
                </div>
                      <!-- /.row -->
                <div class="row">
                  
                   <div class="col-lg-12">
                       
                             <?php
                             if($user && $user_id){
                                

                               $member = $users->fetch_all();        
                                              ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Company</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Date registered</th>
                                                </tr>
                                            </thead>
                                          
                                            <tbody>
                                                 <?php foreach($member as $users){ ?> 
                                                <tr>
                                                    <td><?php echo $users['name']; ?></td>
                                                    <td><?php echo $users['company']; ?></td>
                                                    <td><?php echo $users['email']; ?></td>
                                                    <td><?php echo $users['phone']; ?></td>
                                                    <td><?php echo $users['date']; ?></td>
                                                    <td><a href="member.php?id=<?php echo $users['id'];?>">View details</a></td>                                          
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php
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