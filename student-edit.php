<?php

session_start();

include("connections.php");

?>


<?php
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $query = "SELECT * FROM student WHERE std_id='$user_id'";
    $query_run = mysqli_query($connect, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $dean = mysqli_fetch_array($query_run);
        // print_r($admin);

?>


<?php
    } else {
        echo ("NO Sunch Record Found !");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Update</title>
    <link rel="stylesheet" href="css/register-styles.css" />
</head>

<body>
    <div class="container">
        <header>Personal Details</header>
        <form action="view-code.php" method="POST">
            <div class="first-form">
                <div class="personal info">
                    <span class="title">Personal Information</span>
                    <div class="fields">

                        <div class="input-field">
                            <label for="ID">ID</label>
                            <input type="number" name="dean_id" value="<?= $dean['std_id']; ?>" placeholder="101####" />
                        </div>

                        <div class="input-field">
                            <label for="Full Name">Full Name</label>
                            <input type="text" name="fullname" value="<?= $dean['full_name']; ?>"
                                placeholder="Enter Full Name" />
                        </div>

                        <div class="input-field">
                            <label for="DOB">DOB</label>
                            <input type="date" name="dob" value="<?= $dean['dob']; ?>"
                                placeholder="Enter Date Of Birth" />
                        </div>

                        <div class="input-field">
                            <label for="Email">Email Address</label>
                            <input type="email" name="email" value="<?= $dean['email']; ?>"
                                placeholder="Enter Email Address" />
                        </div>

                        <div class="input-field">
                            <label for="Mobile">Mobile Number</label>
                            <input type="number" name="number" value="<?= $dean['phone']; ?>"
                                placeholder="Enter Mobile Number" />
                        </div>

                        <div class="input-field">
                            <label for="salary">Semester Fee</label>
                            <input type="number" name="salary" value="<?= $dean['salary']; ?>" placeholder="1000.00" />
                        </div>

                        <div class="input-field">
                            <label for="Mobile">Password</label>
                            <input type="text" value="<?= $dean['passkey']; ?>" name="pass" placeholder="Password" />
                        </div>

                        <div class="input-field">
                            <label for="Gender">Gender</label>
                            <input type="text" value="<?= $dean['gender']; ?>" name="gender"
                                placeholder="Male/Female" />
                        </div>



                        <div class="input-field">
                            <label for="NID/PassportNumber">NID</label>
                            <input type="text" name="nid" value="<?= $dean['nid_pass']; ?>"
                                placeholder="Enter NID/Passport Number" />
                        </div>

                        <div class="input-field">
                            <label for="Department">Department</label>
                            <input type="text" value="<?= $dean['dept']; ?>" name="dept" placeholder="" />
                        </div>



                        <div class="input-field">
                            <label for="Address">Address</label>
                            <input type="text" name="address" value="<?= $dean['address']; ?>"
                                placeholder="Enter Address" />
                        </div>



                        <div class="input-field">
                            <label for="Joining Date">Joining Date</label>
                            <input type="date" name="JOD" value="<?= $dean['sdate']; ?>"
                                placeholder="Enter Joining Date" />
                        </div>

                        <div class="input-field">
                            <label for="Status">Status</label>
                            <input type="text" value="<?= $dean['stat']; ?>" name="stat"
                                placeholder="Regular/Probation/Suspended" />
                        </div>

                        <div class="input-field">
                            <label for="CGPA">CGPA</label>
                            <input type="text" value="<?= $dean['cgpa']; ?>" name="cgpa"
                                placeholder="" />
                        </div>

                        <div class="input-field">
                            <label for="credit">Total Credit</label>
                            <input type="text" value="<?= $dean['credit']; ?>" name="credit"
                                placeholder="" />
                        </div>






                    </div>
                    <button class="submit" name="Student-Update">
                        <span class="btnText">Update</span>
                    </button>
                    <a href="faculty-table-view.php" class="btn btn-danger">Return</a>
                </div>

            </div>
        </form>
    </div>
</body>

</html>