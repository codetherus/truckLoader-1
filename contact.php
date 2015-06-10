<?php 
include_once("./lib/truck_header.php");
?>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Contact us
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>Get in touch with us
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <form role="form">

                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control">
                            </div>

                             <div class="form-group">
                                <label>Company</label>
                                <input class="form-control">
                            </div>
                                                   
                            <div class="form-group">
                                <label>Email address</label>
                                <input class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Contact number</label>
                                <input class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" rows="8"></textarea>
                            </div>

                           

                            <button type="submit" class="btn btn-default">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>

                    </div>
            
                </div>
                <!-- /.row -->

   <?php include_once("lib/truck_footer.php"); ?>