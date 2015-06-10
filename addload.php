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
                            New Load Post
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Post a load
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
                                $category = $_POST['category'];
                                 $weight = $_POST['weight'];
                                  $collection = $_POST['collection'];
                                  $collection_address = $_POST['collection_address'];
                                  $destination = $_POST['destination'];
                                  $destination_address = $_POST['destination_address'];
                                $description = $_POST['description'];
                               
                                                               
                                mysqli_query($conn,"INSERT INTO `load`(`idload`, `title`, `category`, `weight`, `collection`, `collection_address`, `destination`, `destination_address`, `description`, `poster_id`, `date`)
                                    VALUES('','$title','$category','$weight','$collection','$collection_address','$destination','$destination_address','$description',{$user->id},NOW())");
                                
                                echo "Your truck has been submitted onto our database";
                             }
                            ?>

                        <form role="form" action="./addload.php" method="POST">

                           <div class="form-group">
                                <label>Load title</label>
                                <input class="form-control" name="title" type="text" required>
                            </div>
                            
                             <div class="form-group">
                                <label>Load Category</label>
                                <select class="form-control" name="category" style="width:50%" required>
                                    <option value="">Select load category</option>
                                    <option>Chemicals</option>
                                    <option>Liquid</option>
                                    <option>Dry goods</option>
                                    <option>Refrigirated goods</option>
                                    <option>Machinery</option>
                                    <option>Heavy Machinery</option>
                                    <option>Minning equipment</option>
                                    <option>Industrial equipment</option>
                                    <option>Metals</option>
                                     <option>Vehicles</option>
                                    <option>Abnormal</option>
                                    </select>
                            </div>

                             <div class="form-group">
                                <label>Weight Category</label>
                                <select class="form-control" name="weight" style="width:50%" required>
                                    <option value="">Select weight category</option>
                                    <option value="Less than 5Ton">Less than 5Ton</option>
                                    <option value="5 - 8Ton">5 - 8Ton</option>
                                    <option value="8 - 12Ton">9 - 12Ton</option>
                                    <option value="12 - 15Ton">12 - 15Ton</option>
                                    <option value="15 - 20Ton">15 - 20Ton</option>
                                    <option value="20 - 30Ton">20 - 30Ton</option>
                                    <option value="33 - 34Ton">Above 30Ton</option>
                                    <option value="Undisclosed">Undisclosed</option>
                                </select>
                            </div>

                            
                               <div class="form_specialgroup">
                                    <div class="form-group">
                                       <label>Collection</label>
                                    <select class="form-control" name="collection" required>
                                            <option value="">Collection point</option>
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
                                    <div class="form-group">
                                        <label>Collection address</label>
                                        <input class="form-control" type="text" name="collection_address">
                                    </div>
                            </div>
                         
                           <div class="form_specialgroup">
                                    <div class="form-group">
                                        <label>Destination</label>
                                    <select class="form-control" name="destination" required>
                                        <option value="">Destination point</option>
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
                                    <div class="form-group">
                                        <label>Destination address</label>
                                        <input class="form-control"  type="text" name="destination_address">
                                     </div>
                            </div> 

                              <div class="form-group" style="clear:both;">
                                <label>Description</label>
                                <textarea class="form-control" rows="8" name="description" required></textarea>
                            </div>

                            <div class="submit_buttons">
                            <input type="submit" name="submit" class="btn btn-default" value="Post Load">
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