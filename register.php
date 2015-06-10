<?php 
error_reporting(E_ALL ^ E_NOTICE);
include_once("./lib/truck_header.php");
include_once("./scripts/connect.php");
//$errormsg = "";
?>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Registration Information
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>Register
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                                                  
                          <?php  

                          if($_POST['submit']) {
                                $getuser = $_POST['email'];
                                $getpass1 = $_POST['password'];
                                $getpass2 = $_POST['password2'];
                                $name=$_POST['name'];
                                $company=$_POST['company'];
                                $phone=$_POST['phone'];
                                $description=$_POST['description'];
                                $profile_image="uploads/";
                                        
                                if($getuser) {
                                     if($getpass1){
                                        if($getpass2) {
                                            
                                                if($getpass1 === $getpass2) {
                                                        if((strlen($getuser)>=7)&&(strstr($getuser, "@"))&&(strstr($getuser, "."))) {
                                                            

                                                                $query = mysqli_query($conn,"SELECT * FROM user WHERE email ='$getuser'");
                                                                $numrows =mysqli_num_rows($query);
                                                                if ($numrows == 0) {

                                                                    $password = md5(md5("truck".$getpass1."loader"));
                                                                    $code = md5(rand());
                                                                    mysqli_query($conn,"INSERT INTO user VALUES('','$getuser','$password','$name','$company','$phone','$description','$profile_image','NOW()','0','$code')");

                                                                    $query = mysqli_query($conn,"SELECT * FROM user WHERE email ='$getuser'");
                                                                    $numrows =mysqli_num_rows($query);
                                                                    if($numrows == 1 ){

                                                                        $site="http://localhost/truckloader/";
                                                                        $webmaster= "info@artifexwebdesgin.co.za";
                                                                        $headers ="FROM: $webmaster";
                                                                        $subject= "Activate your account";
                                                                        $message = "thank you for registering. click the link below to activate your account <br>";
                                                                        $message .= "$site/activate.php?user$getuser$code=$code";
                                                                        $message.= "You must activate your acount to login.";

                                                                        if(mail($getuser, $subject, $message,$headers)){
                                                                             $errormsg="You have been registered . you must activate your account from the link sent to <b>$getuser</b>";
                                                                             $getuser="";

                                                                        }else{

                                                                            echo "An error has occured you activation email was not sent";
                                                                        }

                                                                    }else{
                                                                        echo "An error has occured. Your account was not created";
                                                                    }

                                                                  } else{

                                                                    echo "There is already a user with that email address.";
                                                                  } 

                                                            mysqli_close($conn);
                                                        }else{
                                                            echo "You must enter a valid email address to register.";
                                                        }
                                                    
                                                }else{
                                                    echo  "Your password does not match";
                                                }
                                        }else{
                                                echo "Please retype your password to register.";                                        
                                        }

                                   }else{
                                        echo "You must enter a password to register.";
                                   }
                                }else{

                                    echo "You must enter your email to register.";

                                }
                               
                          } 
                                
                        $form = ' <form id="userForm" method="post" action="./register.php">
                            <div>
                              
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="$getuser">
                             </div>
                                <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" id="password1" name="password" value="$getpass1">
                             </div>
                                <div class="form-group">
                                <label>Retype password</label>
                                <input class="form-control" type="password" id="password2" name="password2" >
                                <span class="errorFeedback errorSpan" id="password2Error"></span>
                             </div>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"class="form-control" id="name" name="name" >
                             </div>
                             <div class="form-group">
                                <label>Company</label>
                                <input type="text" class="form-control" id="company" name="company">
                             </div>
                             
                            <div class="form-group">
                                <label>Contact number</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                             </div>
                              <div class="form-group">
                                <label>Upload company profile</label>
                                <input type="file">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="6" id="description" name="description"></textarea>
                            </div>
                             <div class="submit_buttons">
                            <input type="submit" name="submit" id="submit" class="btn btn-default" value="Submit" >
                            </form>
                            <button type="reset" class="btn btn-default">Reset</button>
                            </div>';


                        echo $form;
                          ?>
                       
                </div>
                <!-- /.row -->

   <?php include_once("lib/truck_footer.php"); ?>