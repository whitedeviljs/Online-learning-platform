<?php 
include "connection.php";
session_start();
if(isset($_POST['login']))
{
    $fetch="select * from admin where unm='".$_POST['unm']."' AND pass='".$_POST['pass']."'";
    $q=mysqli_query($con,$fetch);

    if(mysqli_num_rows($q)>0)
    {
        $row=mysqli_fetch_assoc($q);
        $_SESSION['unm']=$row['unm'];
        header("location:admindash.php");
    }
}
?>
<html>
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: arial;
            font-size: 16px;
        }

        body {
            height: 95vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            background-image: url("bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            margin-top: 17px;
            width: 400px;
            padding: 20px;
            border: 1px solid #eee;
            box-shadow: 0px 0px 20px white;
            border-radius: 10px;
            /* color:white; */
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        a {
            color: black;
        }

        p {
            margin: 0;
            font-size: 25px;
            font-weight: bold;
            color: black;
            margin-bottom: 20px;
            text-align: center;
        }

        u {
            color: black;
        }

        input {
            width: 90%;
            height: 40px;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 5px;
            outline: none;
            border: none;
            background-color: #d3d3d3;
            border-radius: 10px;
            border-bottom: 1.5px solid white;
            background-color: transparent;
            transition: background-color 0.3s ease;
        }

        input:hover {
            background-color: #fefde2;
        }

        button {
            margin-bottom: 15px;
            border: none;
            padding: 5px 20px;
            background-color: white;
            color: black;
            cursor: pointer;
            border-radius: 10px;
        }

        button:hover {
            background-color: #eee;
            color: black;
            box-shadow: 0 0 50px black;
        }

        input[type="submit"] {
            margin-bottom: 15px;
            border: none;
            padding: 5px 20px;
            background-color: black;
            color: white;
            cursor: pointer;
            border-radius: 10px;
        }

        input[type="submit"]:hover {
            background-color: #fefde2;
            color: black;
            box-shadow: 0 0 10px white;
        }

        label {
            display: flex;
            color: white;
            align-items: center;
        }

        @media screen and (max-width: 600px) {
            .container {
                width: 80%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <u>
            <p>LOGIN!!!</p>
        </u>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <br><label for="unm"><img src="reg_user.png" height="25px"></img>&nbsp;&nbsp;
                Username:-</label><input type="text"  name="unm" placeholder="Enter Username."><br>
            <label for="pass"><img src="reg_pass.png" height="25px"></img>&nbsp;&nbsp;Password:-</label>
            <input type="text" name="pass" placeholder="Enter Password.">
            <input type="submit" name="login" value="Login"><br><br><br>
        </form>
    </div>
</body>

</html>