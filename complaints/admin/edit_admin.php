
<?php 
//To call connection for the page by using include function
include("includes/connection.php");
//we will make CRUD
//Edit an admin from manage admin page

if (isset($_POST['submit']))
{
     $admin_email   =$_POST['admin_email'];
     $admin_password=$_POST['admin_password'];
     $admin_fullname=$_POST['admin_fullname'];
     $admin_dept    =$_POST['admin_dept'];
 

 $query="update  admin set admin_email      ='$admin_email',
                           admin_password   ='$admin_password',
                           admin_fullname   ='$admin_fullname',
                           admin_dept       ='$admin_dept'

        	     where admin_id={$_GET['id']}";
                // echo $query;
                 //die;
         
mysqli_query($conn,$query);

header("location:manage_admin.php"); 
         
}

//fetch old data using function mysqli_fetch_assoc and result variable

$query="select * from admin where admin_id={$_GET['id']}";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
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
                                            <h3 class="text-center title-2">Edit Admin</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" >
                                            <div class="form-group">
                                                <label for="admin_email" class="control-label mb-1">Admin Email</label>
                                                <input  name="admin_email" type="text" class="form-control" value="<?php echo $row['admin_email']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_password" class="control-label mb-1">Admin Pssword</label>
                                                <input  name="admin_password" type="password" class="form-control" value="<?php echo $row['admin_password'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_fullname" class="control-label mb-1">Admin Full Name</label>
                                                <input  name="admin_fullname" type="text" class="form-control"  value="<?php echo $row['admin_fullname'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_dept" class="control-label mb-1">Admin Department</label>
                                                <input  name="admin_dept" type="txt" class="form-control"   value="<?php echo $row['admin_dept'];?>">
                                            </div>

                                            
                                             <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                               
                                                    <span id="submit">Update</span>
                                                  

                                                </button>

                                       /*  <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Cancel
                                        </button>
                                    </div>*/
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                       
                        </div>

                    



                 
                            </div>



                            </div>
                </div>
      






<?php include('includes/admin_footer.php'); ?>