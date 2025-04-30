<?php
    include_once("connection/connection.php");
    $con = connection();
    $logout_disabled = true;

    if(isset($_POST['login'])){
        if(empty($_POST['uname'])){
            echo "USERNAME is required.";
        }
        elseif(empty($_POST['pword'])){
            echo "PASSWORD is required.";
        }
        else{
            $un = $_POST['uname'];
            $pwd = $_POST['pword'];
            

            $sql1 = "select * from accounts_tbl where u_name = '$un' and p_word=md5('$pwd')";
            $exist=$con->query($sql1) or die($con->error);
            $row = $exist->fetch_assoc();
            $total = $exist->num_rows;

            if($total > 0){
                $_SESSION['userlogin'] = $row['g_name'].' '.$row['l_name'];
                $_SESSION['usertype'] = $row['u_type'];
                $logout_disabled = false;
                
                echo "<b>Welcome, </b>"."<b>".$_SESSION['userlogin']."</b>";
                echo "<form action='' method='post'><input type='submit' name='index' value='Go to Main'></form>";
                echo "<script type='text/javascript'>enableLogout();</script>";
            } else{
                echo "Account not Found!";
            }
        }
    }

    if(isset($_POST['index'])){
        echo header("location: main2.php");
    }

    

    if(isset($_POST['out'])){
        unset($_SESSION['userlogin']);
        unset($_SESSION['usertype']);
        echo header("location: index.php");
    }

    if(isset($_POST['signin'])){
        header("Location: main.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang=en>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="C:\Users\Mhea\OneDrive\Documents\Desktop\cdsgaportal\style.css">
        <title>My Portal - Login</title>
    </head>
    <body>
        <form name="myForm" action="" method="POST">
            <table align=center>
            <center><img src="images/image-48-useraccount.jpg" alt="User Account Logo" width=200 height=200></center>
                <tr>
                    <td><label><b>Username</b></label></td>
                    <td width=5><br></td>
                    <td><input type="text" name="uname" id="uname" size=50 placeholder="Account Username" autofocus></td>
                </tr>
                <tr>
                    <td> <label><b>Password</b></label></td>
                    <td width=5><br></td>
                    <td><input type="password" name="pword" id="pword" size=50 placeholder="Account Password"></td>        
                </tr>        
            </table>
            <br> 
            <center>
                <input type="submit" name="login" value="Login" <?php echo isset($_POST['login']) ? "disabled": "";  ?>>
                <input type="submit" name="signin" value="Sign In" <?php echo isset($_POST['login']) ? "disabled" : ""; ?>>
                <input type="submit" name="out" value="Logout" <?php if($logout_disabled){echo 'disabled="disabled"';} ?>>   
            </center>
        </form>
    </body>
</html>

