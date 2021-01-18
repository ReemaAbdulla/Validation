<?php 
// connect to Data Base
include('includes/connection.php');

if (isset($_POST['submit']))
{
    $case_day      =date("l");
    $case_date     =date("y,m,d");
    $case_time     =date("h:i");
    $case_type     =$_POST['case_type'];
    $directory_name=$_POST['directory_name'];
    $case_priority =$_POST['case_priority'];
    $case_status   =$_POST['case_status'];
    $case_entry    =$_POST['case_entry'];
    $case_desc     =$_POST['case_desc'];
    $case_emp_note =$_POST['case_emp_note'];

    $query="update  cases set case_day       ='$case_day',
                              case_date      ='$case_date',
                              case_time      ='$case_time',
                              case_type      ='$case_type',
                              directory_name ='$directory_name',
                              case_priority  ='$case_priority',
                              case_status    ='$case_status',
                              case_entry     ='$case_entry',
                              case_desc      ='$case_desc',
                              case_emp_note  ='$case_emp_note'

                        where case_id={$_GET['id']}";

mysqli_query($conn,$query);
header("location:manage_cases2.php");   

         
}

//fetch old data using function mysqli_fetch_assoc and result variable

$query="select * from cases where case_id={$_GET['id']}";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
?>


<?php include('includes/public_header.php'); ?>

<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header" style="background-color: #EEEEEE">Manage Cases</div>
                                    <div class="card-body" style="background-color: #F0F0F0">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add New Case</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                             <div class="form-group">
                                                <label for="day" class="control-label mb-1">Case Day</label>
                                                <input id="day" name="case_day" type="text" class="form-control"  aria-invalid="false" value="<?php echo date("l")?>" >
                                           <div class="form-group">
                                                <label for="date" class="control-label mb-1">Case Date</label>
                                                <input id="date" name="case_date" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo date("d/m/y")?>" >
                                            </div>
                                           <div class="form-group has-success">
                                                <label for="time" class="control-label mb-1">Case Time</label>
                                                <input id="time" name="case_time" type="text" class="form-control cc-name valid" data-val="true" 
                                                     aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo date("h:m:s")?>" >
                                                     <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>


                                            
                                          <div class="form-group">
                                                        <label >Case Type</label>
                                                      <select name="case_type" id="case_type" class="form-control" >
                                                        <!--<option value="<?php //echo $row['case_type']?>"><?php //echo $row['case_type']?></option>-->
                                                        <option value="complaint" <?php if ($row['case_type'] == "complaint") {echo "selected";}?>>Complaint</option>
                                                        <option value="notice" <?php if ($row['case_type'] == "notice") {echo "selected";}?>>Notice</option>
                                                        <option value="inquery" <?php if ($row['case_type'] == "inquery") {echo "selected";}?>>Inquery</option>
                                                        <option value="thanks" <?php if ($row['case_type'] == "thanks") {echo "selected";}?>>Thanks </option>
                                            
                                                    </select>  
                                               
                                                  </div>
                                           
                                                    <div class="form-group">
                                                        <label >Directory</label>
                                                      <select name="directory_name" id="directory_name" class="form-control">
                                                       <!-- <option  value="<?php //echo $row['directory_name']?>"><?php //echo $row['directory_name']?></option>-->
                                                       <option disabled></option>
                                                        <option value="Directorate of Administrative Affairs" <?php if ($row['directory_name'] == "Directorate of Administrative Affairs") {echo "selected";}?> >Directorate of Administrative Affairs</option>

                                                        <option value="Directorate of Financial Affairs" <?php if ($row['directory_name'] == "Directorate of Financial Affairs") {echo "selected";}?> >Directorate of Financial Affairs</option>

                                                        <option value="Legal Affairs Directorate" <?php if ($row['directory_name'] == "Legal Affairs Directorate") {echo "selected";}?> >Legal Affairs Directorate</option>

                                                        <option value="Central Employment Directorate" <?php if ($row['directory_name'] == "Central Employment Directorate") {echo "selected";}?>>Central Employment Directorate </option>

                                                        <option value="Central Labor Inspection Directorate" <?php if ($row['directory_name'] == "Central Labor Inspection Directorate") {echo "selected";}?>>Central Labor Inspection Directorate </option>

                                                        <option value="Expatriate Employment Directorate" <?php if ($row['directory_name'] == "Expatriate Employment Directorate") {echo "selected";}?>>Expatriate Employment Directorate</option>

                                                        <option value="Directorate of International Cooperation" <?php if ($row['directory_name'] == "Directorate of International Cooperation") {echo "selected";}?>>Directorate of International Cooperation</option>

                                                        <option value="Directorate of Women's Labor" <?php if ($row['directory_name'] == "Directorate of Women's Labor") {echo "selected";}?>>Directorate of Women's Labor </option>

                                                        <option value="Media and Communication  and Public Relations Unit" <?php if ($row['directory_name'] == "Media and Communication  and Public Relations Unit") {echo "selected";}?>>Media and Communication  and Public Relations Unit </option>

                                                        <option value="Directorate of Information Technology and Electronic Transformation" <?php if ($row['directory_name'] == "Directorate of Information Technology and Electronic Transformation") {echo "selected";}?>>Directorate of Information Technology and Electronic Transformation </option>

                                                        <option value="Unit management of productive branches" <?php if ($row['directory_name'] == "Unit management of productive branches") {echo "selected";}?>>Unit management of productive branches </option>

                                                        <option value="Directorate of Occupational Safety and Health" <?php if ($row['directory_name'] == "Directorate of Occupational Safety and Health") {echo "selected";}?>>Directorate of Occupational Safety and Health </option>

                                                        <option value="Coordination and Follow-up Unit" <?php if ($row['directory_name'] == "Coordination and Follow-up Unit") {echo "selected";}?>>Coordination and Follow-up Unit </option>

                                                        <option value="Coordination and Follow-up Unit" <?php if ($row['directory_name'] == "Coordination and Follow-up Unit") {echo "selected";}?>>Coordination and Follow-up Unit </option>

                                                    </select>  
                                               
                                                  </div>



                                                   <div class="form-group">
                                                        <label >Case Priority</label>
                                                      <select name="case_priority" id="case_priority" class="form-control" >
                                                       <!-- <option value="<?php //echo $row['case_priority']?>"> <?php //echo $row['case_priority']?> </option>-->
                                                        <option value="hight" <?php if ($row['case_priority'] == "hight") {echo "selected";}?> >Hight </option>
                                                        <option value="middle" <?php if ($row['case_priority'] == "middle") {echo "selected";}?>>Middle </option>
                                                        <option value="low" <?php if ($row['case_priority'] == "low") {echo "selected";}?> >Low </option>
                                                        
                                                        

                                                    </select>  
                                               
                                                  </div>
                                               
                                                  </div>


                                                   <div class="form-group">
                                                        <label >Case Status</label>
                                                    <select name="case_status" id="case_status" class="form-control">
                                                        <option value="pending"  <?php if ($row['case_status'] == "pending") {echo "selected";}?>>pending </option>
                                                        <option value="under Processing" <?php if ($row['case_status'] == "under Processing") {echo "selected";}?>>under Processing </option>
                                                        <option value="closed" <?php if ($row['case_status'] == "closed") {echo "selected";}?>>closed </option>
                                                        <option value="canceled" <?php if ($row['case_status'] == "canceled") {echo "selected";}?>>canceled </option>

                                                    </select>  
                                               
                                                  </div>


                                                 <div class="form-group">
                                                        <label >Case Entry</label>
                                                      <select name="case_entry" id="case_entry" class="form-control">
                                                        <option value="whats up" <?php if ($row['case_entry'] == "whats up") {echo "selected";}?>>Whats up</option>
                                                        <option value="email" <?php if ($row['case_entry'] == "email") {echo "selected";}?> >Email</option>
                                                        <option value="telephone" <?php if ($row['case_entry'] == "telephone") {echo "selected";}?>>Telephone</option>
                                                        <option value="personaltiy" <?php if ($row['case_entry'] == "personaltiy") {echo "selected";}?>>personality </option>
                                                        

                                                    </select>  
                                               
                                                  </div>

                                            <div class="form-group">
                                                <label for="case_desc" class="control-label mb-1">Case Descreption</label>
                                            <div class="col-12 col-md-9">
                                                    <textarea name="case_desc" id="case_desc" rows="9" placeholder="Content..." class="form-control" ><?php echo $row['case_desc']?></textarea>
                                                </div>

                                            </div>


                                            <div class="form-group">
                                                <label for="case_emp_note" class="control-label mb-1">Case Employee Note</label>
                                            <div class="col-12 col-md-9">
                                                    <textarea name="case_emp_note" id="case_emp_note" rows="9" placeholder="Content..." class="form-control" ><?php echo $row['case_emp_note']?></textarea>
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


<?php include('includes/public_footer.php'); ?>