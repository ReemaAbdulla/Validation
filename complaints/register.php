<?php
include("includes/connection.php");


$n_idErr=$nationalityErr=$first_nameErr=$sec_nameErr=$third_nameErr=$last_nameErr=$cityErr=$addressErr=$mobile_numberErr=$genderErr=$passwordErr="";
$n_id=$nationality=$first_name=$sec_name=$third_name=$last_name=$city=$address=$mobile_number=$gender=$password="";
$errors=[];

if (isset($_POST['submit']))
{

    $n_id         =$_POST['n_id'] ?? null;
    $nationality  =$_POST['nationality'] ?? null;
    $first_name   =$_POST['first_name'] ?? null;
    $sec_name     =$_POST['sec_name'] ?? null;
    $third_name   =$_POST['third_name'] ?? null;
    $last_name    =$_POST['last_name'] ?? null;
    $city         =$_POST['city'] ?? null;
    $address      =$_POST['address'] ?? null;
    $mobile_number=$_POST['mobile_number'] ?? null;
    $gender       =$_POST['gender'] ?? null;
    $password     =$_POST['password'] ?? null;

//first name validation
    if (isset($first_name) && empty($first_name)) 
    {
        $errors['first_name'] = "First name is required ";
    } 
    else {
        if (!preg_match('/^[a-zA-Z\s]+$/',$first_name))
        { 
            $errors['first_name'] =  " The first name contains charachter and spaces only";
        }
        
    }
// second name validation
    if (empty($_POST["sec_name"])) 
    {
        $errors['sec_name'] = "Sec name is required ";
        

    } 
    else {
        if (!preg_match('/^[a-zA-Z\s]+$/',$_POST['sec_name']))
        { 
            $errors['sec_name'] = " The name contains charachter and spaces only";
        }
        else

        { 
         $first_name =$_POST["sec_name"];
     }
 }
//third name validation
 if (empty($_POST["third_name"])) 
 {
    $errors['third_name'] = "Third name is required ";

} 
else {
    if (!preg_match('/^[a-zA-Z\s]+$/',$_POST['third_name']))
    {
       $errors['third_name'] =  " The name contains charachter and spaces only";
   }
   else

   { 

     $third_name =$_POST["third_name"];
 }

}
//validation of last name
if (empty($_POST["last_name"])) 
{
    $errors['last_name'] = "last name is required ";


} 
else {
    if (!preg_match('/^[a-zA-Z\s]+$/',$_POST['last_name']))
    { 
        $errors['last_name'] = " The name contains charachter and spaces only";
    }
    else

    { 

     $last_name =$_POST["last_name"];
 }

}
//validation of city
if (empty($_POST["city"])) 
{
    $errors['city'] = "You have to choose a city ";
  //  echo $cityErr;

} 
else 

{  
    $city =$_POST["city"];
}

//validation of mobilenumber
/*if (empty($_POST["mobile_number"])) 
{
    $mobile_numberErr = "you have to insert your mobile number";
    echo $mobile_numberErr;

}*/
if (!is_numeric($_POST['mobile_number']))
{
    $errors['mobile_number'] = "The mobile number must be numbers only ";

}
else
{
    $x=strlen($_POST['mobile_number']);


    if (!($x==10))
    {
        $errors['mobile_number'] = "the mobile number must be 10 digits only";
    }
    else
    {

        $mobile_number=$_POST['mobile_number'];
    }
}


//validation of password

/*elseif (strlen($_POST["password"]) < 8) 
{
    $passwordErr = "Your Password Must Contain At Least 8 Characters!";
}
elseif(!preg_match("#[0-9]+#",$password)) {
    $passwordErr = "Your Password Must Contain At Least 1 Number!";
}
elseif(!preg_match("#[A-Z]+#",$password)) {
    $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
}

elseif(!preg_match("#[a-z]+#",$password)) {
    $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
} 

else {$password=$_POST['password'];}*/






//    if (preg_match('/^(?=.*[a-zA-Z])(?=.*[0-9]).{8}$/',$_POST['password']))
//    {

//         $password =$_POST["password"];
//     }
//     else

//     {

//         echo " It must be at least 8 character uot to 32 and at least one upper case and one digit";
// die;
//     }
$pass = $_POST['password'];
if (strlen($pass) < 8 || strlen($pass) > 32) {
    $errors['password'] = "Password should be min 8 characters and max 16 characters";
}
if (!preg_match("/\d/", $pass)) {
    $errors['password'] = "Password should contain at least one digit";
}
if (!preg_match("/[A-Z]/", $pass)) {
    $errors['password'] = "Password should contain at least one Capital Letter";
}
if (!preg_match("/[a-z]/", $pass)) {
    $errors['password'] = "Password should contain at least one small Letter";
}
if (!preg_match("/\W/", $pass)) {
    $errors['password'] = "Password should contain at least one special character";
}
if (preg_match("/\s/", $pass)) {
    $errors['password'] = "Password should not contain any white space";
}



if(empty($errors))
{


 $query="insert into citizen(n_id,nationality,first_name,sec_name,third_name,last_name,city,address,mobile_number,gender,password) values('$n_id','$nationality','$first_name','$sec_name','$third_name','$last_name','$city','$address','$mobile_number','$gender','$password')";
   // echo $query;die;

mysqli_query($conn,$query);

 header('Location: http://localhost/complaints/login2.php');


}


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>


</head>

<body class="animation">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/complaints3.jpg" alt="Cmplaints and Thankfull"  style="width:50%;height:50% ">
                            </a>
                        </div>

                        <div class="login-form">
                            <form action="" method="post">

                                <div class="form-group">

                                    <div class="row">

                                        <div class="col-md-6">
                                            <label>National ID</label>
                                            <input class="au-input au-input--full" type="text" name="n_id" required=""> 
                                        </div>
                                        <div class="col-md-6">

                                            <label>Nationality</label>
                                            <select name="nationality" id="nationality" class="input-lg form-control-lg form-control" style="font-size:15px" required="">
                                                <option value="Jordanian">Jordanian</option>
                                                <option value="Others">Others</option>

                                            </select>

                                        </div>


                                    </div>



                                    <div class="form-group">

                                    </div>
                                    <div class="form-group">

                                       <div class="row">

                                        <div class="col-md-6">
                                            <label>First Name </label>
                                            <input 
                                            class="au-input au-input--full" 
                                            type="text" 
                                            name="first_name"  
                                            value="<?= $first_name ?>" >
                                            <?= (isset($errors['first_name']) && !empty($errors['first_name']))? "<label class='text-danger'> $errors[first_name] </label>": "" ?>
                                        </div>


                                        <div class="col-md-6">
                                           <label>Second Name</label>
                                           <input class="au-input au-input--full" type="text" name="sec_name"  required="" value="<?= $sec_name ?>" >
                                           <?= (isset($errors['sec_name']) && !empty($errors['sec_name']))? "<label class='text-danger'> $errors[sec_name] </label>": "" ?>
                                       </div>

                                   </div>
                               </div>

                               <div class="form-group">

                                   <div class="row">

                                    <div class="col-md-6">
                                        <label>Middle Name </label>
                                        <input class="au-input au-input--full" type="text" name="third_name"  required="" value="<?= $third_name ?>" >
                                        <?= (isset($errors['third_name']) && !empty($errors['third_name']))? "<label class='text-danger'> $errors[third_name] </label>": "" ?>
                                    </div>

                                    <div class="col-md-6">
                                       <label>Last Name</label>
                                       <input 
                                        class="au-input au-input--full" 
                                        type="text" 
                                        name="last_name"  
                                        required="" 
                                        value="<?= $last_name ?>" 
                                        >

                                       <?= (isset($errors['last_name']) && !empty($errors['last_name']))? "<label class='text-danger'> $errors[last_name] </label>": "" ?>
                                   </div>
                               </div>

                               </div>



                               <div class="form-group">

                                   <div class="row">

                                    <div class="col-md-6">

                                        <label>Mobile Number</label>
                                        <input class="au-input au-input--full" type="text" name="mobile_number" required="" >

                                    </div>

                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input class="au-input au-input--full" type="password" name="password" required="">
                                        <?= (isset($errors['password']) && !empty($errors['password']))? "<label class='text-danger'> $errors[password] </label>": "" ?>
                                    </div>

                                </div>

                                <div class="form-group">

                                   <div class="row">

                                    <div class="col-md-6">

                                        <label>City</label>
                                        <select name="city" id="city" class="input-lg form-control-lg form-control" style="font-size:15px" required="">
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

                                    <div class="col-md-6">
                                        <label>Address</label>
                                        <input class="au-input au-input--full" type="text" name="address"  value="<?= $address?>" >
                                        <?= (isset($errors['address']) && !empty($errors['addreaa']))? "<label class='text-danger'> $errors[address] </label>": "" ?>>
                                    </div>

                                </div>


                   <!-- <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Gender</label>
                        </div>
                        <div class="col col-md-9">
                            <div class="form-check">
                                <div class="radio">
                                    <label for="male" class="form-check-label ">
                                        <input type="radio" id="male" name="gender" value="male" class="form-check-input">Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="female" class="form-check-label ">
                                        <input type="radio" id="female" name="gender" value="female" class="form-check-input">Female
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>-->

                    <div class="row ">
                        <div class="col-md-7">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Gender</label>
                                </div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">

                                        <label for="gender" class="form-check-label">
                                            <input type="radio" id="gender" name="gender" value="male" class="form-check-input" required=""> Male
                                        </label>

                                        <label for="gender" class="form-check-label ">
                                            <input type="radio" id="gender" name="gender" value="female" class="form-check-input" required=""> Female
                                        </label>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">register</button>

                    <p>
                     <button class="au-btn au-btn--block au-btn--blue m-b-20">  <a href="login2.php" style="color:white;background-color: none"> Log In   </a> </button>
                 </p>

             </form>

         </div>
     </div>
 </div>

 <!-- </div>-->
</div>

</body>

</html>
<!-- end document-->