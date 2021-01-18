<?php 
//To call connection for the page by using include function
include("includes/connection.php");
//we will make CRUD
//Lets start with Create

if (isset($_POST['submit']))
{
     $admin_email   =$_POST['admin_email'];
     $admin_password=$_POST['admin_password'];
     $admin_fullname=$_POST['admin_fullname'];
     $admin_dept    =$_POST['admin_dept'];
 

 $query="insert into admin(admin_email,admin_password,admin_fullname,admin_dept)
         values('$admin_email','$admin_password','$admin_fullname','$admin_dept')";
         
        mysqli_query($conn,$query);
      
         
}

?>


<?php include('includes/admin_header.php'); ?>

            <!-- MAIN CONTENT-->
            <div class="main-content" >
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header" style="background-color: #EEEEEE">Manage Admin</div>
                                    <div class="card-body" style="background-color: #F0F0F0" >
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Admin</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" >
                                            <div class="form-group">
                                                <label for="admin_email" class="control-label mb-1">Admin Email</label>
                                                <input  name="admin_email" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_password" class="control-label mb-1">Admin Pssword</label>
                                                <input  name="admin_password" type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_fullname" class="control-label mb-1">Admin Full Name</label>
                                                <input  name="admin_fullname" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_dept" class="control-label mb-1">Admin Department</label>
                                                <input  name="admin_dept" type="txt" class="form-control">
                                            </div>

                                            
                                             

                                           <center> <button name="submit" type="submit" class="btn btn-lg btn-info " style="width:30%">Save
                                               
                                            
                                                  

                                                </button>
                                                <input name="reset" type="reset" class="btn btn-lg  btn-danger btn-info " style="width:30%">  </center> 






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
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Email</th>
                                                <th>FullName</th>
                                                <th>Department</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              $query="select * from admin";
                                              $result=mysqli_query($conn,$query);
                                              while($row=mysqli_fetch_assoc($result))
                                              {
                                                echo "<tr>";
                                                echo "<td>{$row['admin_id']}</td>";
                                                echo "<td>{$row['admin_email']}</td>";
                                                echo "<td>{$row['admin_fullname']}</td>";
                                                echo "<td>{$row['admin_dept']}</td>";

                                                echo "<td><a href='edit_admin.php?id={$row['admin_id']}'>Edit</a></td>";
                                                echo "<td><a href='delete_admin.php?id={$row['admin_id']}'>Delete</a></td>";
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
      






<?php include('includes/admin_footer.php'); ?>