<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid']==0)) {
  header('location:logout.php');
} else{
  if(isset($_POST['submit']))
  {
    $names=$_POST['names'];
    $age=$_POST['age'];
    $studentno=$_POST['studentno'];
    $sex=$_POST['sex'];
    $class=$_POST['class'];
    $stream=$_POST['stream'];
    $parentname=$_POST['parentname'];
    $relation=$_POST['relation'];
    $ocupation=$_POST['ocupation'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $nextphone=$_POST['nextphone'];
    $country=$_POST['country'];
    $district=$_POST['district'];
    $state=$_POST['state'];
    $village=$_POST['village'];
    $photo=$_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"],"studentimages/".$_FILES["photo"]["name"]);
    $query=mysqli_query($con, "insert into  students(studentno,StudentName,class,stream,age,gender,email,parentName,relation,occupation,country,district,state,village,contactno,nextphone,studentImage) value('$studentno','$names','$class','$stream','$age','$sex','$email','$parentname','$relation','$ocupation','$country','$district','$state','$village','$phone','$nextphone','$photo')");
    if ($query) {
      echo "<script>alert('Student has been registered.');</script>"; 
      echo "<script>window.location.href = 'add_student.php'</script>";   
      $msg="";
    }
    else
    {
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";    
    }
  }
  ?>
  <!DOCTYPE html>
  <html>
  <?php @include("includes/head.php"); ?>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <?php @include("includes/header.php"); ?>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <?php @include("includes/sidebar.php"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active">Add Student</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row ">
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add Student</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <span style="color: brown"><h5>Student details</h5></span>
                      <hr>
                      <div class="row">
                        <div class="form-group col-md-3">
                          <label for="studentno">Student Number</label>
                          <input type="text" class="form-control" id="studentno" name="studentno" placeholder="Enter Student Number" required>
                        </div>
                        <div class="form-group col-md-5">
                          <label for="names">Names</label>
                          <input type="text" class="form-control" id="names" name="names" placeholder="Names" required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="age">Age</label>
                          <input type="text" class="form-control" id="age" name="age" placeholder="Age"required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="sex">Sex</label>
                          <select type="select" class="form-control" id="sex" name="sex"required>
                            <option>Select Sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label for="age">Educational level</label>
                          <select type="select" class="form-control" id="class" name="class" required>
                            <option>Select Educational level</option>
                            <option value="first-grade">first grade</option>
                            <option value=second-grade >second grade</option>
                            <option value="third-grade">third grade</option>
                            <option value="fourth-grade">fourth grade</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="age">Living • <span style="color: blue;">optional</span></label>
                          <select type="select" class="form-control" id="stream" name="stream">
                            <option>Living</option>
                            <option value="West">outside the university city</option>
                            <option value="East">Inside the university city</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="exampleInputFile">Student Photo</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="" name="photo" id="photo" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <span style="color: brown"><h5>Parent details</h5></span>
                      <div class="row">
                        <div class="form-group col-md-3">
                          <label for="parentname">Parent Name</label>
                          <input type="text" class="form-control" id="parentname" name="parentname" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group col-md-5">
                          <label for="relation">Relationship</label>
                          <select type="select" class="form-control" id="relation" name="relation"required>
                            <option>Select Relationship</option>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Brother">Brother</option>
                            <option value="Sister">Sister</option>
                            <option value="Uncel">Uncel</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="age">Email</label>
                          <input type="text" class="form-control" id="email" name="email" placeholder="email" required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="sex">Works</label>
                          <select type="select" class="form-control" id="ocupation" name="ocupation"required>
                            <option>Works</option>
                            <option value="Doctor">Doctor</option>
                            <option value="Engineer">Engineer</option>
                            <option value="Bussiness man">Bussiness man</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Student">Student</option>
                            <option value="Worker">Worker</option>
                            <option value="free work">free work</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-3 offset-md-6">
                          <label for="phone1">Phone Number</label>
                          <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone"required>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="nextphone">Mobile Number • <span style="color: blue;">optional</span></label>
                          <input type="text" class="form-control" id="nextphone" name="nextphone" placeholder="Phone 2">
                        </div>
                      </div>
                      <hr>
                      <span style="color: brown"><h5>Address</h5></span>
                      <div class="row">
                        <div class="form-group col-md-3 ">
                          <label for="phone1">Governorate</label>
                          <select type="select" class="form-control" id="country" name="country"required>
                            <option>Select Governorate</option>
                            <option value="Cairo">Cairo</option>
                            <option value="Hellwan">Hellwan</option>
                            <option value="Giza">Giza</option>
                            <option value="Alexandria">Alexandria</option>
                            <option value="Bani Sweif">Bani Sweif</option>
                            <option value="Fayoum">Fayoum</option>
                            <option value="Qalyubia">Qalyubia</option>
                            <option value="Menoufia">Menoufia</option>
                            <option value="Dakahlia">Dakahlia</option>
                            <option value="Eastern">Eastern</option>
                            
                          </select>
                        </div>
                        <div class="form-group col-md-3 ">
                          <label for="district">Region</label>
                          <input type="text" class="form-control" id="district" name="district" placeholder="Region"required>
                        </div>
                        <div class="form-group col-md-3 ">
                          <label for="county">Education Hub</label>
                          <input type="text" class="form-control" id="state" name="state" placeholder="Education Hub"required>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="village">Detailed address</label>
                          <input type="text" class="form-control" id="village" name="village" placeholder="Detailed address"required>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php @include("includes/footer.php"); ?>

    </div>

    <!-- ./wrapper -->
    <?php @include("includes/foot.php"); ?>
  </body>
  </html>
  <?php
}?>
