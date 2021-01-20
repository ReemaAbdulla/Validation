
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
     $admin_type    =$_POST['admin_type'];
 

 $query="update  admin set admin_email      ='$admin_email',
                           admin_password   ='$admin_password',
                           admin_fullname   ='$admin_fullname',
                           admin_dept       ='$admin_dept',
                           admin_type       ='$admin_type'

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
                                                        <label >Admin Department</label>
                                                      <select name="admin_dept" id="admin_dept" class="form-control">
                                                       
                                                       <option disabled></option>
                                                        <option value="Directorate of Administrative Affairs" <?php if ($row['admin_dept'] == "Directorate of Administrative Affairs") {echo "selected";}?> >Directorate of Administrative Affairs</option>

                                                        <option value="Directorate of Financial Affairs" <?php if ($row['admin_dept'] == "Directorate of Financial Affairs") {echo "selected";}?> >Directorate of Financial Affairs</option>

                                                        <option value="Legal Affairs Directorate" <?php if ($row['admin_dept'] == "Legal Affairs Directorate") {echo "selected";}?> >Legal Affairs Directorate</option>

                                                        <option value="Central Employment Directorate" <?php if ($row['admin_dept'] == "Central Employment Directorate") {echo "selected";}?>>Central Employment Directorate </option>

                                                        <option value="Central Labor Inspection Directorate" <?php if ($row['admin_dept'] == "Central Labor Inspection Directorate") {echo "selected";}?>>Central Labor Inspection Directorate </option>

                                                        <option value="Expatriate Employment Directorate" <?php if ($row['admin_dept'] == "Expatriate Employment Directorate") {echo "selected";}?>>Expatriate Employment Directorate</option>

                                                        <option value="Directorate of International Cooperation" <?php if ($row['admin_dept'] == "Directorate of International Cooperation") {echo "selected";}?>>Directorate of International Cooperation</option>

                                                        <option value="Directorate of Women's Labor" <?php if ($row['admin_dept'] == "Directorate of Women's Labor") {echo "selected";}?>>Directorate of Women's Labor </option>

                                                        <option value="Media and Communication  and Public Relations Unit" <?php if ($row['admin_dept'] == "Media and Communication  and Public Relations Unit") {echo "selected";}?>>Media and Communication  and Public Relations Unit </option>

                                                        <option value="Directorate of Information Technology and Electronic Transformation" <?php if ($row['admin_dept'] == "Directorate of Information Technology and Electronic Transformation") {echo "selected";}?>>Directorate of Information Technology and Electronic Transformation </option>

                                                        <option value="Unit management of productive branches" <?php if ($row['admin_dept'] == "Unit management of productive branches") {echo "selected";}?>>Unit management of productive branches </option>

                                                        <option value="Directorate of Occupational Safety and Health" <?php if ($row['admin_dept'] == "Directorate of Occupational Safety and Health") {echo "selected";}?>>Directorate of Occupational Safety and Health </option>

                                                        <option value="Coordination and Follow-up Unit" <?php if ($row['admin_dept'] == "Coordination and Follow-up Unit") {echo "selected";}?>>Coordination and Follow-up Unit </option>

                                                        <option value="Coordination and Follow-up Unit" <?php if ($row['admin_dept'] == "Coordination and Follow-up Unit") {echo "selected";}?>>Coordination and Follow-up Unit </option>

                                                    </select>  
                                               
                                                  </div>

                                            <div class="form-group">
                                                        <label >Admin Type</label>
                                                      <select name="admin_type" id="admin_type" class="form-control" >
                                                        
                                                        <option value="super" <?php if ($row['admin_type'] == "super") {echo "selected";}?>>super</option>
                                                        <option value="normal" <?php if ($row['admin_type'] == "normal") {echo "selected";}?>>normal</option>
                                                        
                                        
                                                    </select>  
                                                </div>

                                            
                                             <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                               
                                                    <span id="submit">Update</span>
                                                  

                                                </button>

                                     <!-- <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Cancel
                                        </button>
                                    </div>-->


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