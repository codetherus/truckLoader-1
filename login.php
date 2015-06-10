<?php 
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$user_id = $_SESSION['id'];
$user = $_SESSION['email'];
require("./scripts/connect.php");
include_once("./lib/truck_header.php");
include_once("scripts/functions.inc");
?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Login
                           
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-lock"></i>Login
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">    
                    <div class="col-lg-6">
                                    <!--login-->
                           <?php

                           if($user && $user_id){
                                echo "You are already logged in as <b>$user->name</b>";

                           }else{
                                                 
                            $form = '<form class="form  center-block" action="./login.php" method="post">
                                    <div class="form-group">
                                      <input type="text" class="form-control input-lg" placeholder="Email" name="email">
                                    </div>
                                    <div class="form-group">
                                      <input type="password" class="form-control input-lg" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group">
                                      <input type="submit"  name="loginbtn" class="btn btn-primary btn-lg btn-block">
                                      <span class="pull-right"><a href="register.php">Register</a></span><span><a href="forgot.php">Forgot password</a></span>
                                    </div>
                                  </form>';

                                  if($_POST['loginbtn']){
                                      $user = $_POST['email'];
                                      $password = $_POST['password'];


                                        if($user){
                                            if ($password) {
                                                $password = md5(md5("truck".$password."loader"));
                                                //make sure login in info is correct
                                                $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$user'");
                                                $numrows = mysqli_num_rows($query);
                                                if($numrows==1){
                                                    $row=mysqli_fetch_assoc($query);
                                                    $dbid = $row['id'];
                                                    $dbuser = $row['email'];
                                                    $dbpass = $row['password'];
                                                    $dbactive = $row['isActive'];

                                                    if($password == $dbpass){
                                                      if($dbactive == 1){
                                                        //Set session info
                                                          $_SESSION['id'] = $dbid;
                                                          $_SESSION['email'] = $dbuser;
                                                          $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$user'");
                                                          $row=mysqli_fetch_assoc($query);
                                                          $name=$row['name'];
                                                          $company=$row['company'];
                                                          $phone=$row['phone'];
                                                          $description=$row['description'];

                                                          $user = new User();
                                                          $user->authenticate($_POST['email'],$password);
                                                          echo "You have been logged in as <b>$user->name</b>. <a href='dashboard.php'>Click here</a> to go to the Dashboard.";
                                                         
                                                         
                                                      }else{

                                                        echo "You must activate your account to login. $form";
                                                      }

                                                    }else{
                                                      echo "You did not enter the correct information. $form";
                                                    }

                                                }else{

                                                    echo "Your email entered was not found. $form";
                                                }
                                                 mysqli_close($conn);
                                            }else{

                                              echo  "You must enter your password. $form";
                                            }

                                        }else{

                                          echo "Please enter your email. $form";
                                        }
                                  }else{ 
                                    echo $form;
                                  }
                              }
                           ?>                       
                   
                                                  
                     
                    </div>
                </div>
                <!-- /.row -->

   <?php include_once("lib/truck_footer.php"); ?>