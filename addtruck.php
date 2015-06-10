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
                            New Truck Post
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Post a truck
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                                <?php  

              if($user && $user_id){
                                  
                            if($_POST['submit']){
                                $title = $_POST['title'];
                                $trailerType = $_POST['trailerType'];
                                $git = $_POST['GIT'];
                                $description = $_POST['description'];
                                $location=$_POST['location'];
                                if(isset($_POST['truckImage'])){
                                    
                                                            
                                }else{

                                    $images="default.gif";
                                }
                                
                                mysqli_query($conn,"INSERT INTO truck VALUES('','$title','$trailerType','$git','$description','$images','$location',{$user->id},NOW())");
                                
                                echo "Your truck has been submitted onto our database";
                             }
                            ?>
                           
                            <form role="form" method="post" action="./addtruck.php">
                            <div class="form-group">
                                <label>Truck title</label>
                                <input class="form-control" name="title" required>
                            </div>
                            
                             <div class="form-group">
                                <label>Trailer type</label>
                                <select class="form-control" name="trailerType" style="width:50%">
                                    <option value="All">All</option>
                                    <option>Low bed</option>
                                    <option>tauntliner</option>
                                    <option>Super link</option>
                                    <option>Tri axle</option>
                                    <option>Car carrier</option>
                                    <option>Dry box</option>
                                    <option>Refrigirated</option>
                                    <option>Bulk commodity</option>
                                    <option>Tank</option>
                           </select>
                            </div>


                             <div class="form-group">
                                <label>GIT Insurance</label>
                                   <select class="form-control" name="location" style="width:50%">
                                        <option value="">Undisclosed</option>
                                            <option value="0 < R100 000">0 < R100 000</option>
                                            <option value="R100 000 < R200 000">R100 000 < R200 000</option>
                                            <option value="R200 000 < R300 000">R200 000 < R300 000</option>
                                            <option value="R300 000 < R400 000">R300 000 < R400 000</option>
                                            <option value="R400 000 < R500 000">R400 000 < R500 000</option>
                                            <option value="R500 000 < R600 000">R500 000 < R600 000</option>
                                            <option value="R600 000 < R700 000">R600 000 < R700 000</option>
                                            <option value="R700 000 < R800 000">R700 000 < R800 000</option>
                                            <option value="R800 000 < R900 000">R800 000 < R900 000</option>
                                            <option value="R900 000 < R1 000 000">R900 000 < R1 000 000</option>
                                            <option value="R1 000 000 < R1 100 000">R1 000 000 < R1 100 000</option>
                                            <option value="R1 100 000 < R1 200 000">R1 100 000 < R1 200 000</option>
                                            <option value="R1 200 000 < R1 300 000">R1 200 000 < R1 300 000</option>
                                            <option value="R1 300 000 < R1 400 000">R1 300 000 < R1 400 000</option>
                                            <option value="R1 400 000 < R1 500 000">R1 400 000 < R1 500 000</option>
                                            <option value="Over R1 500 000">Over R1 500 000</option>
                                        </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="8" name="description" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Upload an Image</label>
                                <input type="file" name="truckImage">
                            </div>

                            <div class="form-group">
                                <label>Location</label>
                                   <select class="form-control" name="location" style="width:50%">
                                        <option value="">All</option>
                                         <optgroup label="South africa">
                                            <option value="Eastern Cape">Eastern Cape</option>
                                            <option value="Free State">Free State</option>
                                            <option value="Gauteng">Gauteng</option>
                                            <option value="KwaZulu Natal">KwaZulu Natal</option>
                                            <option value="Limpopo">Limpopo</option>
                                            <option value="Mpumalanga">Mpumalanga</option>
                                            <option value="Western Cape">Western Cape</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="North West">North West</option>
                                            <option value="Northern Cape">Northern Cape</option>
                                        <optgroup label="Zimbabwe">
                                            <option value="Harare">Harare</option>
                                            <option value="Masvingo">Masvingo</option>
                                            <option value="Bulawayo">Bulawayo</option>
                                            <option value="Mutare">Mutare</option>
                                            <option value="Zimbabwe - Other">Other</option>
                                        <optgroup label="Southern Africa">    
                                            <option value="Botswana">Botswana</option>
                                            <option value="DRC">DRC</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Swaziland">Tanzania</option>
                                            <option value="Tanzania">Swaziland</option>
                                            <option value="Zambia">Zambia</option>
                                </select>
                            </div>
                        <div class="submit_buttons">
                            <input type="submit" name="submit" class="btn btn-default" value="Post Truck">
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                        </form>

                    </div>
                     <?php
                                      }else{

                            echo "Please login to access this page <a href='./login.php'>Login here</a>. If you are not registered please <a href='./register.php'>Register here</a>.<br>If you are experiencing problems Loging in or Registering please send us your query via our <a href='./contact.php'>Contact page</a>.";
                          }
                      ?>
                    </div>
                </div>
                <!-- /.row -->

   <?php include_once("lib/truck_footer.php"); ?>

