<?php
include("includes/connection.php");

if (isset($_POST['submit']))
{
    $n_id         =$_POST['n_id'];
    $first_name   =$_POST['first_name'];
    $sec_name     =$_POST['sec_name'];
    $third_name   =$_POST['third_name'];
    $last_name    =$_POST['last_name'];
    $city         =$_POST['city'];
    $address      =$_POST['address'];
    $mobile_number=$_POST['mobile_number'];
    $gender       =$_POST['gender'];
    $password     =$_POST['password'];

    $query="update  citizen set n_id          ='$n_id',
                                first_name    ='$first_name',
                                sec_name      ='$sec_name',
                                third_name    ='$third_name',
                                last_name     ='$last_name',
                                city          ='$city',
                                address       ='$address',
                                mobile_number ='$mobile_number',
                                gender        ='$gender',
                                password      ='$password'

                            where c_id={$_GET['id']}";


mysqli_query($conn,$query);

header("location:manage_citizen2.php");
}
//fetch old data using function mysqli_fetch_assoc and result variable

$query="select * from citizen where c_id={$_GET['id']}";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

?>

<?php include('includes/public_header.php'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Citizen</strong> 
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="n_id" class="form-control-label">National Number</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text"  name="n_id" value="<?php echo $row['n_id']?>" class="form-control">
                                        <small class="help-block form-text">National Id Number</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="first_name" class="form-control-label">First Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="first_name" name="first_name" placeholder="first name" class="form-control" value="<?php echo $row['first_name']?>" >
                                        <small class="help-block form-text">Please enter your first name</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="sec_name" class="form-control-label">Second Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="sec_name" name="sec_name" placeholder="second name"  class="form-control" value="<?php echo $row['sec_name']?>">
                                        <small class="help-block form-text">Please enter your Second Name</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="third_name" class="form-control-label">Middle Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="third_name" id="third_name"  placeholder="third_name" class="form-control" value="<?php echo $row['third_name']?>">
                                        <small class="help-block form-text">Please enter your Middle Name</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="last_name" class="form-control-label">Last Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="last_name" id="last_name"  placeholder="last name" class="form-control" value="<?php echo $row['last_name']?>">
                                        <small class="help-block form-text">Please enter your Last Name</small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="city" class="form-control-label">City</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                    <select name="city" id="city" class="form-control" value="<?php echo $row['city']?>">
                                            <option disabled=""></option>
                                            <option value="amman" <?php if ($row['city'] == "amman") {echo "selected";}?>>Amman</option>
                                            <option value="zarqa" <?php if ($row['city'] == "zarqa") {echo "selected";}?>>Zarqa</option>
                                            <option value="irbid" <?php if ($row['city'] == "irbid") {echo "selected";}?>>Irbid</option>
                                            <option value="mafraq" <?php if ($row['city'] == "mafraq") {echo "selected";}?>>Mafraq </option>
                                            <option value="ramtha" <?php if ($row['city'] == "ramtha") {echo "selected";}?>>Ramtha </option>
                                            <option value="shona_shamalieh" <?php if ($row['city'] == "shona_shamalieh") {echo "selected";}?>>AL shona shamalieh</option>
                                            <option value="shona_janobieh" <?php if ($row['city'] == "shona_janobieh") {echo "selected";}?>>AL shona janobieh</option>
                                            <option value="maan" <?php if ($row['city'] == "maan") {echo "selected";}?>>Maan </option>
                                            <option value="karak" <?php if ($row['city'] == "karak") {echo "selected";}?>>Al-karak </option>

                                        </select>
                                    </div>

                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="address" class="form-control-label">Address</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="address" id="address"  placeholder="addres" class="form-control" value="<?php echo $row['address']?>">
                                        <small class="help-block form-text">Please enter your Address</small>
                                    </div>
                                </div>

                            
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="mobile_number" class="form-control-label">Mobile Number</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="mobile_number" id="mobile_number"  placeholder="mobile_number" class="form-control" value="<?php echo $row['mobile_number']?>">
                                        <small class="help-block form-text">Please enter your Mobile Number</small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Gender</label>
                                    </div>
                                    <div class="col col-md-9">
                                        <div class="form-check-inline form-check">

                                            <label for="gender" class="form-check-label ">
                                                
                                                <input type="radio" id="male" name="gender" value="male"  <?php if ($row['gender'] == "male") {echo "checked";}?>> Male
                                            </label></pre>

                                            <label for="gender" class="form-check-label ">
                                                <input type="radio" id="female" name="gender"   value="female" <?php if ($row['gender'] == "female") {echo "checked";}?> > Female
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="address" class="form-control-label">Password</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="Password" name="password" id="password"  placeholder="password" class="form-control" value="<?php echo $row['password']?>">
                                        <small class="help-block form-text">Please enter your password</small>
                                    </div>
                                </div>

                               <center> <button name="submit" type="submit" class="btn btn-sm btn-info " style="width:30%">Save
                                               
                                            
                                                  

                                                </button>
                                                <input name="reset" type="reset" class="btn btn-sm  btn-danger btn-info " style="width:30%"></center>


                            </form>
                        </div>
                       </div>
                   </div>
               </div>
           </div>


                            

                    </div>
                </div>
            </div>

    <?php include('includes/public_footer.php'); ?>