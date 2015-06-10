<?php 
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$user_id = $_SESSION['id'];
$user = $_SESSION['email'];
require("./scripts/connect.php");
include_once("./lib/truck_header.php");
require_once("scripts/functions.inc");
$user = new User;
?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            My Profile: 
                            <small><?php echo $user->name; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row">
                <div class="col-lg-4">
                     <?php  

              if($user && $user_id){
                      
                      ?>
                                                   
                                                

                        <table class="table table-bordered table-hover table-striped loadDetails">
                                
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo $user->name; ?></td>
                                </tr>
                                <tr>
                                    <td>Company</td>
                                    <td><?php echo $user->company; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><?php echo $user->phone; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><a href="mailto:<?php echo $poster['email']; ?>"><?php echo $user->email; ?></a></td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td><?php echo $user->description; ?></td>
                                </tr>
                                
                        </table>
                            
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
                <!-- /.row -->

   <?php include_once("lib/truck_footer.php"); ?>