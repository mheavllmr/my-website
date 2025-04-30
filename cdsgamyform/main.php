<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once("connection/connection.php");
$con = connection();

if (isset($_POST['submit'])) {
    // Validate fields first
    if (empty($_POST['gname']) || empty($_POST['lname']) || empty($_POST['uname']) || empty($_POST['pword']) || $_POST['utype'] == "stype") {
        echo '<script>alert("Please complete all fields."); window.history.back();</script>';
        exit;
    }

    // Proceed only if fields are complete
    $gn = strtoupper($_POST['gname']);
    $ln = strtoupper($_POST['lname']);
    $fn = $gn . "" . $ln;
    $un = $_POST['uname'];
    $pw = $_POST['pword'];
    $ut = strtoupper($_POST['utype']);

    $sql1 = "SELECT f_name FROM accounts_tbl WHERE f_name='$fn'";
    $exist = $con->query($sql1) or die($con->error);
    $total = $exist->num_rows;

    if ($total > 0) {
        echo '<script>alert("User account for ' . $fn . ' already exists."); window.history.back();</script>';
    } else {
        $sql = "INSERT INTO accounts_tbl (g_name, l_name, f_name, u_name, p_word, u_type) 
                VALUES ('$gn', '$ln', '$fn', '$un', md5('$pw'), '$ut')";
        $con->query($sql) or die($con->error);

        echo '<script>alert("USER ACCOUNT added successfully."); window.location.href="main.php";</script>';
    }
}

if (isset($_POST['cancel'])) {
    header("Location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My.CDSGA Hub - User Accounts Management</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="C:\Users\Mhea\OneDrive\Documents\Desktop\cdsgaportal\styles.css">
    
    
    <script type="text/javascript">
        function focusOnFirstName(){
            document.getElementById("fname").focus();
        }

        function validateForm() {
            var fn = document.forms["myForm"]["gname"].value;
            if(fn=="" || fn==null){
                alert("Enter First Name");
                return false;
            }
            var ln = document.forms["myForm"]["lname"].value;
            if(ln=="" || ln==null){
                alert("Enter Last Name");
                return false;
            }
            var un = document.forms["myForm"]["uname"].value;
            if(un=="" || un==null){
                alert("Enter Username");
                return false;
            }
            var pw = document.forms["myForm"]["pword"].value;
            if(pw=="" || pw==null){
                alert("Enter Password");
                return false;
            }
            var ut = document.getElementById("utype");
            if(ut.options[ut.selectedIndex].value=="stype"){
                alert("Select Usertype");
                return false;
            }
        }
    </script>
</head>
<body onload="focusOnFirstName()">
    <center><img src="images/cdsga.png" alt="" width=150 height=150></center>    
    <p class="head">My.CDSGA Hub</p>
    <hr style="height: 7px; border-width: 0; color: gray; background-color: gray; border-radius: 2px;">
    
    <div class="row">
        <div class="column left">
            <p class="round" style="background-color:navy"></p>
            <center><img src="images/image-48-useraccount.jpg" alt="User Account Logo" width=200 height=200></center>
            
        </div>
        <div class="column right">
            <p class="round" style="background-color:teal">User Account Registration</p>
            <form name = "myForm" action="" method="POST">
                <table align=center>
                    <tr>
                        <td><label><b>Given Name</b></label></td>
                        <td width=5><br></td>
                        <td><input type="text" name="gname" id="gname" size=50 placeholder="Given Name"></td>
                    </tr>
                    <tr>
                        <td> <label><b>Last Name</b></label></td>
                        <td width=5><br></td>
                        <td><input type="text" name="lname" id="lname" size=50 placeholder="Last Name"></td>        
                    </tr>
                    <tr>
                        <td><label><b>Username</b></label></td>
                        <td width=5><br></td>
                        <td><input type="text" name="uname" id="uname" size=50 placeholder="Username"></td>
                    </tr>
                    <tr>
                        <td><label><b>Password</b></label></td>
                        <td width=5><br></td>
                        <td><input type="password" name="pword" id="pword" size=50 placeholder="Password"></td>
                    </tr>
                    <tr>
                        <td><label><b>User Type</b></label></td>
                        <td width=5><br></td>
                        <td>
                            <select name="utype" id="utype">
                                <option value="stype">Select Usertype</option>
                                <option value="admin">ADMINISTRATOR</option>
                                <option value="faculty">FACULTY</option>
                                <option value="student">STUDENT</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <br>
                <center>
                    <input type="submit"  name="submit" value="Register" onClick="validateForm()">
                    <input type="submit"  name="cancel" value="Cancel">
                </center>
            </form>
        </div>
    </div>

    <div class="footer">
            Developed and Programmed by OLI MHEA VILLAMOR, BSIT 3-1 <br> &copy; 2025
    </div>
</body>
</html>
