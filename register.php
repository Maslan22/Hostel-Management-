<?php
    session_start();
    include('includes/dbconn.php');
    if(isset($_POST['submit']))
    {
        $regno=$_POST['regno'];
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname=$_POST['lname'];
        $gender=$_POST['gender'];
        $contactno=$_POST['contact'];
        $emailid=$_POST['email'];
        $password=$_POST['password'];
        $password = md5($password);

        // check if the student with the same registration number or email already exists
        $query="SELECT COUNT(*) as count FROM userRegistration WHERE regNo=? OR email=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ss',$regno,$emailid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if($row['count'] > 0) {
            echo "<script>alert('Student with the same registration number or email already exists.');</script>";
        } else {
            // insert the data if the student doesn't already exist
            $query="INSERT into userRegistration(regNo,firstName,middleName,lastName,gender,contactNo,email,password) values(?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('sssssiss',$regno,$fname,$mname,$lname,$gender,$contactno,$emailid,$password);
            $stmt->execute();
            echo"<script>alert('Student has been Registered!');</script>";
        }
    }
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <head>
  <title>Register</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

         <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
         <link rel="stylesheet" href="register.css">
</head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/bitcoindark.png">
    <title>Densa Hostel</title>
   

    <script type="text/javascript">
    function valid(){
        if(document.registration.password.value!= document.registration.cpassword.value)
    {
        alert("Password and Confirm Password does not match");
        document.registration.cpassword.focus();
        return false;
    }
        return true;
    }
    </script>
    
</head>
    
<nav>
                <a href="index.html"><img src="images/bitcoindark.png"></a>
                <div class="nav-links">
                <ul>
                    <li><a href="index.html#home">HOME</a></li>
                    <li><a href="index.php">LOGIN</a></li>
                </ul>
                </div>
                
            </nav>
    
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    
    <!-- ============================================================== -->
    <h2 class="mt-3 text-center">STUDENT REGISTERATION</h2>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
      
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <form method="POST" name="registration" onSubmit="return valid();">

                    <div class="row">



                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Index Number</h4>
                                        <div class="form-group">
                                            <input type="text" name="regno" placeholder="Enter Index Number" id="regno" class="form-control" required>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">First Name</h4>
                                        <div class="form-group">
                                            <input type="text" name="fname" id="fname" placeholder="Enter First Name" required class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Middle Name</h4>
                                        <div class="form-group">
                                            <input type="text" name="mname" id="mname" placeholder="Enter Middle Name" required class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Last Name</h4>
                                        <div class="form-group">
                                            <input type="text" name="lname" id="lname" placeholder="Enter Middle Name" required class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Gender</h4>
                                        <div class="form-group mb-4">
                                            <select class="custom-select mr-sm-2" id="gender" name="gender" required="required">
                                                <option selected>Choose...</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Contact Number</h4>
                                        <div class="form-group">
                                            <input type="number" name="contact" id="contact" placeholder="Your Contact" data-error="Enter Min 10 Digit" required="required" class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Email ID</h4>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" placeholder="Your Email" onBlur="checkAvailability()" required="required" class="form-control">
                                            <span id="user-availability-status" style="font-size:12px;"></span>
                                        </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Password</h4>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" placeholder="Enter Password" required="required" class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Confirm Password</h4>
                                        <div class="form-group">
                                            <input type="password" name="cpassword" id="cpassword" placeholder="Enter Confirmation Password" required="required" class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>



                    </div>
                

                        <div class="form-actions">
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-success">Register</button>
                               
                                
                            </div>
                           
                        </div>
                
                </form>


            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           <?php include 'includes/footer.php' ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="assets/extra-libs/c3/d3.min.js"></script>
    <script src="assets/extra-libs/c3/c3.min.js"></script>
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.min.js"></script>

    <!-- customs -->
    <script>
    function checkAvailability() {

        $("#loaderIcon").show();
        jQuery.ajax({
        url: "check-availability.php",
        data:'emailid='+$("#email").val(),
        type: "POST",
        success:function(data){
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
            },
                error:function ()
            {
                event.preventDefault();
                alert('error');
            }
        });
    }
    </script>
</body>

</html>