<?php
include("includes/connection.php");

if (isset($_POST['submit']))
{
    $n_id         =$_POST['n_id'];
    $nationality  =$_POST['nationality'];
    $first_name   =$_POST['first_name'];
    $sec_name     =$_POST['sec_name'];
    $third_name   =$_POST['third_name'];
    $last_name    =$_POST['last_name'];
    $city         =$_POST['city'];
    $address      =$_POST['address'];
    $mobile_number=$_POST['mobile_number'];
    $gender       =$_POST['gender'];
    $password     =$_POST['password'];

    $query="insert into citizen(n_id,nationality,first_name,sec_name,third_name,last_name,city,address,mobile_number,gender,password) values('$n_id','$nationality','$first_name','$sec_name','$third_name','$last_name','$city','$address','$mobile_number','$gender','$password')";

    mysqli_query($conn,$query);
}

?>

<?php include('includes/admin_header.php'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Basic Form</strong> Elements
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="n_id" class="form-control-label">National Number</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text"  name="n_id" placeholder="Enter nid" class="form-control">
                                        <small class="help-block form-text">National Id Number</small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="first_name" class="form-control-label">Nationality</label>
                                    </div>
                                    <div class="col-12 col-md-9">

                                        <select name="nationality" id="nationality" class="input-lg form-control-lg form-control" style="font-size:15px">
                                            <option value="Jordanian">Jordanian</option>
                                            <option value="Others">Others</option>
                                        </select>

                                    </div>

                                </div>
                      


                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="first_name" class="form-control-label">First Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="first_name" name="first_name" placeholder="first name" class="form-control">
                                    <small class="help-block form-text">Please enter your first name</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="sec_name" class="form-control-label">Second Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="sec_name" name="sec_name" placeholder="second name"  class="form-control">
                                    <small class="help-block form-text">Please enter your Second Name</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="third_name" class="form-control-label">Middle Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="third_name" id="third_name"  placeholder="third_name" class="form-control">
                                    <small class="help-block form-text">Please enter your Middle Name</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="last_name" class="form-control-label">Last Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="last_name" id="last_name"  placeholder="last name" class="form-control">
                                    <small class="help-block form-text">Please enter your Last Name</small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="city" class="form-control-label">City</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="city" id="city" class="form-control">
                                        <option value="amman">Amman</option>
                                        <option value="zarqa">Zarqa</option>
                                        <option value="irbid">Irbid</option>
                                        <option value="mafraq">Mafraq </option>
                                        <option value="ramtha">Ramtha </option>
                                        <option value="shona_shamalieh">AL shona shamalieh</option>
                                        <option value="shona_janobieh">AL shona janobieh</option>
                                        <option value="maan"> Maan </option>
                                        <option value="karak">Al-karak </option>

                                    </select>
                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="address" class="form-control-label">Address</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="address" id="address"  placeholder="addres" class="form-control">
                                    <small class="help-block form-text">Please enter your Address</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="mobile_number" class="form-control-label">Mobile Number</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="mobile_number" id="mobile_number"  placeholder="mobile_number" class="form-control">
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
                                            <input type="radio" id="gender" name="gender" value="male" class="form-check-input"> Male
                                        </label></pre>

                                        <label for="gender" class="form-check-label ">
                                            <input type="radio" id="gender" name="gender" value="female" class="form-check-input"> Female
                                        </label>

                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password" class="form-control-label">Password</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="password" name="password" id="password"  placeholder="password" class="form-control">
                                    <small class="help-block form-text">Please enter your password</small>
                                </div>
                            </div>

                            <center> <button name="submit" type="submit" class="btn btn-sm btn-info " style="width:30%">Save




                            </button>
                            <input name="reset" type="reset" class="btn btn-sm  btn-danger btn-info " style="width:30%"></center>

                           </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3" style="width: 65%;
            max-width: 65%;font-size: 6px">
            <thead style="font-size: 6px">
                <tr>
                    <th>ID</th>
                    <th>National ID</th>
                    <th>Nationality </th>
                    <th>FirstName</th>
                    <th>Second Name</th>
                    <th>Third Name</th>
                    <th>Last Name</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Mobile Number</th>
                    <th>Gender</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>


                </tr>
            </thead>
            <tbody>
                <?php
                $query="select * from citizen";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>{$row['c_id']}</td>";
                    echo "<td>{$row['n_id']}</td>";
                    echo "<td>{$row['nationality']}</td>";
                    echo "<td>{$row['first_name']}</td>";
                    echo "<td>{$row['sec_name']}</td>";
                    echo "<td>{$row['third_name']}</td>";
                    echo "<td>{$row['last_name']}</td>";
                    echo "<td>{$row['city']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['mobile_number']}</td>";
                    echo "<td>{$row['gender']}</td>";
                    echo "<td>{$row['password']}</td>";
                    echo "<td><a href='edit_citizen.php?id={$row['c_id']}'>Edit</a></td>";
                    echo "<td><a href='delete_citizen.php?id={$row['c_id']}'>Delete</a></td>";
                    echo "</tr>";

                }
                ?>

            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE-->
</div>

</div>
</div>
</div>

<?php include('includes/admin_footer.php'); ?>