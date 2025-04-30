<?php
    if(!isset($_SESSION)){
        session_start(); 
    }

    if(isset($_POST['out'])){
        unset($_SESSION['userlogin']);
        unset($_SESSION['usertype']);
        echo header("location: index.php");
    }


    include_once("connection/connection.php");
    $con = connection()
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My.CDSGA Hub - Main Page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <center><img src="images/cdsga.png" alt="" width=150 height=150></center>    
        <p class="head">My.CDSGA Hub</p> 
        <hr style="height: 7px; border-width: 0; color: gray; background-color: gray; border-radius: 2px;">
        <form action="" method="post">
            <input type="submit" value="Logout" name="out">
            <div class="row">
                <div class="column left">
                    <p class="round" style="background-color:navy">Main Menu</p>
                    <center>
                        <table>
                            <tr>
                                <td>
                                    <button class="button" style="border-radius: 3px;" class="widebutton" onclick="">
                                        <a href="accounts.php">
                                            <img src="images/accounts.jpg" alt="" width=40 height=40><br>Accounts Management 
                                        </a>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="button" style="border-radius: 3px;" class="widebutton">
                                        <img src="images/students.jpg" alt="" width=40 height=40><br>Student Management 
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="button" style="border-radius: 3px;" class="widebutton">
                                        <a href="faculty.php">
                                            <img src="images/professors.jpg" alt="" width=40 height=40><br>Faculty Management 
                                        </a>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="button" style="border-radius: 3px;" class="widebutton">
                                    <a href="toolkit.php">
                                        <img src="images/image-48-config1.jpg" alt="" width=50 height=55><br>Toolkit Management
                                    </a>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="button" style="border-radius: 3px;" class="widebutton">
                                        <img src="images/icon-48-sched.png" alt="" width=40 height=40><br>Schedule Management 
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="button" style="border-radius: 3px;" class="widebutton">
                                        <img src="images/grades.png" alt="" width=40 height=40><br>Grades Management 
                                    </button>
                                </td>
                            </tr>
                            
                        </table>
                    </center>   
                </div>
                <div class="column right">
                    <p class="round" style="background-color:green">CDSGA Mission - Vision Statement</p>
                    
                    <table>
                        <tr>
                            <td>
                                <p style="color: darkred; font-size: 25px;">
                                    <b>MISSION</b>
                                </p> 
                                <p>
                                    <b>CDSGA commits itself to give AFFORDABLE, TRANSFORMATIVE, PSYCHOLOGICALLY INNOVATIVE, QUALITY EDUCATION and a CARING SERVICE that makes a difference towards self-actualization."</b>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <p style="color: darkred; font-size: 25px;">
                                    <b>VISION</b>
                                </p>
                                <p>
                                    <b>Man of God - Vir Enim Dei.<br>
                                    A leading transformational leadership institution with a unique Gabrielian culture of Discipline, Socially Responsible, Interdependent, Functionally Productive, Godly Individuals and reaching the marginalized to thrive in the global community."</b>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <p class="round" style="background-color:green">Gabrieliean Identities</p>
                    <table>
                        <tr>
                            <td>
                                <b>Punctual, Industrious, Good Character, Good Listener, Grateful/Thankful, Helpful, Honest, and Humble with Integrity.</b>    
                            </td>
                        </tr>
                    </table>
                </div>    
            </div>
        </form>
        <div class="footer">
                Developed and Programmed by OLI MHEA VILLAMOR,BSIT 3-1 <br> &copy; 2025
        </div>    
    </body>
</html>
