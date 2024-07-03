<?php
session_start();
include("connections.php");
include("functions.php");
include("script.php");


//if(isset())
if ($_SERVER['REQUEST_METHOD'] == "POST") {

   // $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $salary = $_POST['salary'];
    $pass = $_POST['pass'];
    $gender = $_POST['gender'];
    $nid = $_POST['nid'];
    $dept = $_POST['dept'];
    $address = $_POST['address'];
    $jod = $_POST['JOD'];
    $stat = $_POST['stat'];





    if (
        !empty($salary) && !empty($pass) &&
        !empty($fullname) && !empty($dob) && !empty($email) && !empty($number)
        && !empty($gender) &&
        !empty($nid) && !empty($dept) && !empty($address) && !empty($jod)
    ) {

        $checkedid = "SELECT * FROM dean ORDER BY dean_id DESC LIMIT 1";
        $checkedResult = mysqli_query($connect, $checkedid);
        
        if(mysqli_num_rows($checkedResult)>0){

            if($row = mysqli_fetch_assoc($checkedResult)){
                $id = $row['dean_id'];
                $get_numbers = str_replace("DN", "", $id);
                $get_increase = $get_numbers+1;
                $get_string = str_pad($get_increase, 5, 0, STR_PAD_LEFT);
                $id = "DN".$get_string;

                $query = "INSERT INTO dean (dean_id, full_name, dob, gender, phone, email, dept, sdate, stat, nid_pass, address, salary, passkey) 
                VALUES('$id','$fullname','$dob','$gender','$number','$email','$dept','$jod','$stat'
                ,'$nid','$address','$salary','$pass')";

                $result = mysqli_query($connect, $query);
                if($result){
                    $_SESSION['status'] = "New Dean added";
                    $_SESSION['status_code'] = "success";
                    header("Location:dean-table-view.php");
                    //die;
                }
                else{
                    echo "Error";
                }
                
            }
        }
        else{
            $id = "DN00001";
            $query = "INSERT INTO dean (dean_id, full_name, dob, gender, phone, email, dept, sdate, stat, nid_pass, address, salary, passkey) 
                VALUES('$id','$fullname','$dob','$gender','$number','$email','$dept','$jod','$stat'
                ,'$nid','$address','$salary','$pass')";

                $result = mysqli_query($connect, $query);
                if($result){
                    $_SESSION['status'] = "New Dean added";
                    $_SESSION['status_code'] = "success";
                        header("Location:dean-table-view.php");
                        //die;
                }
                else{
                    echo "Error";
                }

        }


        

    } else {
        echo ("please enter valid data");
    }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dean Registration</title>
    <link rel="stylesheet" href="css/register-styles.css" />

</head>

<body>
    <div class="container">
        <header>Personal Details</header>
        <form action="#" method="POST">
            <div class="first-form">
                <div class="personal info">
                    <span class="title">Personal Information</span>
                    <div class="fields">

                        <!-- <div class="input-field">
                            <label for="ID">ID</label>
                            <input type="number" name="id" placeholder="101####" />
                        </div> -->

                        <div class="input-field">
                            <label for="Full Name">Full Name</label>
                            <input type="text" name="fullname" placeholder="Enter Full Name" />
                        </div>

                        <div class="input-field">
                            <label for="DOB">DOB</label>
                            <input type="date" name="dob" placeholder="Enter Date Of Birth" />
                        </div>

                        <div class="input-field">
                            <label for="Email">Email Address</label>
                            <input type="email" name="email" placeholder="Enter Email Address" />
                        </div>

                        <div class="input-field">
                            <label for="Mobile">Mobile Number</label>
                            <input type="number" name="number" placeholder="Enter Mobile Number" />
                        </div>

                        <div class="input-field">
                            <label for="salary">Monthly Salary</label>
                            <input type="number" name="salary" placeholder="1000.00" />
                        </div>

                        <div class="input-field">
                            <label for="Mobile">Password</label>
                            <input type="text" value="123456789" name="pass" placeholder="Password" />
                        </div>

                        <div class="input-field">
                            <label for="Gender">Gender</label>
                            <select required name="gender">
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="NID/PassportNumber">NID</label>
                            <input type="text" name="nid" placeholder="Enter NID/Passport Number" />
                        </div>

                        <div class="input-field">
                            <label for="Department">Department</label>
                            <select required name="dept">
                                <option disabled selected>Department</option>
                                <option>Electrical & Computer Engineering</option>
                                <option>Mathematics & Physics</option>
                                <option>Architecture</option>
                                <option>Environmental Science</option>
                                <option>Business & Economics</option>
                                <option>Pharmacology & Bioengineering</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="Address">Address</label>
                            <input type="text" name="address" placeholder="Enter Address" />
                        </div>



                        <div class="input-field">
                            <label for="Joining Date">Joining Date</label>
                            <input type="date" name="JOD" placeholder="Enter Joining Date" />
                        </div>



                        <div class="input-field">
                            <label for="Status">Status</label>
                            <select required name="stat">
                                <option disabled selected>Select Status</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>


                    </div>
                    <button class="submit">
                        <span class="btnText">Register</span>
                    </button>
                    <a href="dean-table-view.php" class="btn btn-danger">Return</a>
                </div>

            </div>
        </form>
    </div>
</body>

</html>