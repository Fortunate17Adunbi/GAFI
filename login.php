<?php
    session_start();
    $con =  mysqli_connect("localhost", "root", "", "gafi");
    if($con->errno)
    {
        die($con->error);
    }
    if(isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM gafi_info WHERE username='$username' AND password = '$password'";
        $result = $con->query($query);
        if($result->num_rows == 1)
        {
            $userdata = mysqli_fetch_object($result);
            $_SESSION['username'] = $userdata->username;
            header("location: userpage.php");
        }
        else
        {
            echo "<script type='text/javascript'>";
            echo "alert('You have ERROR signnig in')";
            echo "</script>";
            header("location: login.php?<script type='text/javascript'>alert('You have ERROR signnnig in');</script>;");
        }
        if($result)
        {
            echo "<script type='text/javascript'>";
            echo "alert('You have successfully signed in')";
            echo "</script>";
        }
    }