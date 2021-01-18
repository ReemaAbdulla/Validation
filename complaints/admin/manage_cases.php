<?php 
// connect to Data Base
include("includes/connection.php");

if (isset($_POST['submit']))
{

    $case_day      = date("l");
    $case_date     = date("Y-m-d");
    $case_time     = date("H:i");
    $case_type     =$_POST['case_type'];
    $directory_name=$_POST['directory_name'];
    $case_priority =$_POST['case_priority'];
    $case_status   =$_POST['case_status'];
    $case_entry    =$_POST['case_entry'];
    $case_desc     =$_POST['case_desc'];
    $case_emp_note =$_POST['case_emp_note'];

    $query="insert into  cases(case_day,case_date,case_time,case_type,directory_name,case_priority,case_status,case_entry,case_desc,case_emp_note)
                         values('$case_day','$case_date','$case_time','$case_type','$directory_name','$case_priority','$case_status','$case_entry','$case_desc','$case_emp_note')";


    mysqli_query($conn,$query);
    //echo $query;
     // die;
         
   }
?>

<?php include('includes/admin_header.php'); ?>

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
                                          <!--  <div class="form-group">
                                                <label for="case_entry" class="control-label mb-1">Case Date</label>
                                                <input id="case_date" name="case_date" type="Date" class="form-control cc-number identified visa" value="<?php //echo date("y,m,d");?>" data-val="true">
                                                <span class="help-block" data-valmsg-for="case_entry" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="case_entry" class="control-label mb-1">Case Time</label>
                                                <input id="case_time" name="case_time" type="Time" class="form-control cc-number identified visa" value="" data-val="true">
                                                <span class="help-block" data-valmsg-for="case_entry" data-valmsg-replace="true"></span>
                                            </div>-->
                                            <div class="form-group">
                                                <label for="day" class="control-label mb-1">Case Day</label>
                                                <input id="case_date" name="case_day"  class="form-control" aria-required="true" aria-invalid="false" value="<?php echo date("l")?>" >
                                            </div>
                                            <div class="form-group">
                                                <label for="date" class="control-label mb-1">Case Date</label>
                                                <input id="case_date" name="case_date"  class="form-control" aria-required="true" aria-invalid="false" value="<?php echo date("d/m/y")?>" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="time" class="control-label mb-1">Case Time</label>
                                                <input id="case_time" name="case_time"  class="form-control cc-name valid" data-val="true" 
                                                     aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo date("h:m:s")?>" >

                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div> 

                                            
                                            <div class="form-group">
                                                        <label >Case Type</label>
                                                      <select name="case_type" id="case_type" class="form-control">
                                                        <option value="complaint">Complaint</option>
                                                        <option value="notice">Notice</option>
                                                        <option value="inquery">Inquery</option>
                                                        <option value="thanks">Thanks </option>
                                            
                                                    </select>  
                                               
                                                  </div>
                                           
                                                   <div class="form-group">
                                                        <label >Directory</label>
                                                      <select name="directory_name" id="directory_name" class="form-control">
                                                       <!-- <option  value="<?php //echo $row['directory_name']?>"><?php //echo $row['directory_name']?></option>-->
                                              
                                                        <option value="Directorate of Administrative Affairs">Directorate of Administrative Affairs</option>
                                                        <option value="Directorate of Administrative Affairs>Directorate of Financial Affairs">Directorate of Administrative Affairs>Directorate of Financial Affairs</option>
                                                        <option value="Legal Affairs Directorate">Legal Affairs Directorate</option>
                                                        <option value="Central Employment Directorate">Central Employment Directorate </option>
                                                        <option value="Central Labor Inspection Directorate">Central Labor Inspection Directorate </option>
                                                        <option value="Expatriate Employment Directorate">Expatriate Employment Directorate</option>
                                                        <option value="Directorate of International Cooperation">Directorate of International Cooperation</option>
                                                        <option value="Directorate of Women's Labor">Directorate of Women's Labor </option>
                                                        <option value="Media and Communication  and Public Relations Unit">Media and Communication  and Public Relations Unit </option>
                                                        <option value="Directorate of Information Technology and Electronic Transformation">Directorate of Information Technology and Electronic Transformation </option>
                                                        <option value="Unit management of productive branches">Unit management of productive branches </option>
                                                        <option value="Directorate of Occupational Safety and Health">Directorate of Occupational Safety and Health </option>
                                                        <option value="Coordination and Follow-up Unit">Coordination and Follow-up Unit </option>
                                                        <option value="Directorate of Occupational Work Regulation">Directorate of Occupational Work Regulation </option>

                                                    </select>  
                                               
                                                  </div>



                                                  <div class="form-group">
                                                        <label >Case Priority</label>
                                                      <select name="case_priority" id="case_priority" class="form-control">
                                                        <option value="hight">Hight </option>
                                                        <option value="middle">Middle </option>
                                                        <option value="low">Low </option>
                                                        
                                                        

                                                    </select>  
                                               
                                                  </div>


                                                   <div class="form-group">
                                                        <label >Case Status</label>
                                                      <select name="case_status" id="case_status" class="form-control">
                                                        <option value="pending">Pending</option>
                                                        <option value="underprocessing">Under Processing</option>
                                                        <option value="closed">Closed</option>
                                                        <option value="cancelled">Cancelled </option>
                                                        

                                                    </select>  
                                               
                                                  </div>


                                                 <div class="form-group">
                                                        <label >Case Entry</label>
                                                      <select name="case_entry" id="case_entry" class="form-control">
                                                        <option value="whats up">Whats up</option>
                                                        <option value="email">Email</option>
                                                        <option value="telephone">Telephone</option>
                                                        <option value="personaltiy">personality </option>
                                                        

                                                    </select>  
                                               
                                                  </div>

                                            <div class="form-group">
                                                <label for="case_desc" class="control-label mb-1">Case Descreption</label>
                                            <div class="col-12 col-md-9">
                                                    <textarea name="case_desc" id="case_desc" rows="9" placeholder="Content..." class="form-control"></textarea>
                                                </div>

                                            </div>


                                            <div class="form-group">
                                                <label for="case_emp_note" class="control-label mb-1">Case Employee Note</label>
                                            <div class="col-12 col-md-9">
                                                    <textarea name="case_emp_note" id="case_emp_note" rows="9" placeholder="Content..." class="form-control"></textarea>
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
               
                     <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Priority</th>
                                                <th>Type</th>
                                                <th>Entry</th>
                                                <th>status</th>
                                                <th>Directory</th>
                                                <th>Descreption</th>
                                                <th>Employee Note</th>
                                                <th>Day</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Edit</th>
                                                <th>Delete</th>

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              $query="select * from cases";
                                              $result=mysqli_query($conn,$query);
                                              while($row=mysqli_fetch_assoc($result))
                                              {
                                                echo "<tr>";
                                                echo "<td>{$row['case_id']}</td>";
                                                echo "<td>{$row['case_priority']}</td>";
                                                echo "<td>{$row['case_type']}</td>";
                                                echo "<td>{$row['case_entry']}</td>";
                                                echo "<td>{$row['case_status']}</td>";
                                                echo "<td>{$row['directory_name']}</td>";
                                                echo "<td>{$row['case_desc']}</td>";
                                                echo "<td>{$row['case_emp_note']}</td>";
                                                echo "<td>{$row['case_day']}</td>";
                                                echo "<td>{$row['case_date']}</td>";
                                                echo "<td>{$row['case_time']}</td>";
                                                echo "<td><a href='edit_case.php?id={$row['case_id']}'>Edit</a></td>";
                                                echo "<td><a href='delete_case.php?id={$row['case_id']}'>Delete</a></td>";
                                                echo "</tr>";


                                              }
                                            ?>

                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>


<?php include('includes/admin_footer.php'); ?>