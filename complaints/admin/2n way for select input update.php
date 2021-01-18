<?php 
// connect to Data Base
include('includes/connection.php');

if (isset($_POST['submit']))
{
    $case_date     =$_POST['case_date'];
    $case_time     =$_POST['case_time'];
    $case_type     =$_POST['case_type'];
    $directory_name=$_POST['directory_name'];
    $case_priority =$_POST['case_priority'];
    $case_status   =$_POST['case_status'];
    $case_entry    =$_POST['case_entry'];
    $case_desc     =$_POST['case_desc'];
    $case_emp_note =$_POST['case_emp_note'];

    $query="update  cases set case_date     ='$case_date',
                              case_time     ='$case_time',
                              case_type      ='$case_type',
                              directory_name='$directory_name',
                              case_priority ='$case_priority',
                              case_status   ='$case_status',
                              case_entry    ='$case_entry',
                              case_desc     ='$case_desc',
                              case_emp_note ='$case_emp_note'

                        where case_id={$_GET['id']}";


if(mysqli_query($conn,$query)){
header("location:manage_cases.php");
}else{
    print_r(mysqli_error($conn));die;
}

echo $query;
die;

    mysqli_query($conn,$query);
         
   
      
         
}

//fetch old data using function mysqli_fetch_assoc and result variable

$query="select * from cases where case_id={$_GET['id']}";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

$caseStatus = [
    "pending" => "Pending",
    "underprocessing" => "Under Processing",
    "closed" => "Closed",
    "cancelled" => "Cancelled"
];
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
                                            <div class="form-group">
                                                <label for="date" class="control-label mb-1">Case Date</label>
                                                <input id="date" name="case_date" type="date" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $row['case_date']?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="time" class="control-label mb-1">Case Time</label>
                                                <input id="time" name="case_time" type="time" class="form-control cc-name valid" value="<?php echo $row['case_time']?>" 
                                                     aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">

                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>

                                            
                                            <div class="form-group">
                                                        <label >Case Type</label>
                                                      <select name="case_type" id="case_type" class="form-control" value="<?php echo $row['case_type']?>">
                                                        <option disabled=""></option>
                                                        <option value="complaint">Complaint</option>
                                                        <option value="notice">Notice</option>
                                                        <option value="inquery">Inquery</option>
                                                        <option value="thanks">Thanks </option>
                                            
                                                    </select>  
                                               
                                                  </div>
                                           
                                                    <div class="form-group">
                                                        <label >Directory</label>
                                                      <select name="directory_name" id="directory_name" class="form-control" value="<?php echo $row['directory_name']?>">
                                                        <option disabled=""></option>
                                                        <option value="amman">Amman</option>
                                                        <option value="zarqa">Zarqa</option>
                                                        <option value="irbid">Irbid</option>
                                                        <option value="mafraq">Mafraq </option>
                                                        <option value="ramtha">Ramtha </option>
                                                        <option value="shona_shamalieh">AL shona shamalieh</option>
                                                        <option value="shona_janobieh">AL shona janobieh</option>
                                                        <option value="maan">Maan </option>
                                                        <option value="karak">Al-karak </option>

                                                    </select>  
                                               
                                                  </div>



                                                  <div class="form-group">
                                                        <label >Case Priority</label>
                                                      <select name="case_priority" id="case_priority" class="form-control" value="<?php echo $row['case_priority']?>">
                                                        <option value="hight">Hight </option>
                                                        <option value="middle">Middle </option>
                                                        <option value="low">Low </option>
                                                        
                                                        

                                                    </select>  
                                               
                                                  </div>


                                                   <div class="form-group">
                                                        <label >Case Status</label>
                                                      <select name="case_status" id="case_status" class="form-control">

                                                        <?php foreach ($caseStatus as $key => $status): ?>
                                                        
                                                            <option 
                                                                value="<?= $key ?>"
                                                                <?= ($key == $row['case_status'])? "selected" : ""; ?>
                                                            ><?= $status ?>
                                                                
                                                            </option>

                                                        <?php endforeach; ?>
                                        
                                                    </select>  
                                               
                                                  </div>


                                                <div class="form-group">
                                                <label for="case_entry" class="control-label mb-1">Case Entry</label>
                                                <input id="case_entry" name="case_entry" type="text" class="form-control cc-number identified visa" value="<?php echo $row['case_entry']?>" data-val="true">
                                                <span class="help-block" data-valmsg-for="case_entry" data-valmsg-replace="true"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="case_desc" class="control-label mb-1">Case Descreption</label>
                                            <div class="col-12 col-md-9">
                                                    <textarea name="case_desc" id="case_desc" rows="9" placeholder="Content..." class="form-control" >"<?php echo $row['case_desc']?>"</textarea>
                                                </div>

                                            </div>


                                            <div class="form-group">
                                                <label for="case_emp_note" class="control-label mb-1">Case Employee Note</label>
                                            <div class="col-12 col-md-9">
                                                    <textarea name="case_emp_note" id="case_emp_note" rows="9" placeholder="Content..." class="form-control" >"<?php echo $row['case_emp_note']?>"</textarea>
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


<?php include('includes/admin_footer.php'); ?>