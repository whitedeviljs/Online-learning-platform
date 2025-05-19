<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet">
        <script>        
            function showpassword()
            {
                var pass=document.getElementById("pass");
                var eyeicon=document.getElementById("eyeicon");
                if(pass.type=="password")
                {
                    pass.type="text";
                    eyeicon.src="hide.png";
                }
                else
                {
                    pass.type="password";
                    eyeicon.src="show.png";
                }
            }
        </script>
    </head>
    <body>            
        <div class="container">
            <u><p>Sign up!!</p></u><br>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <label for="unm"><img src="reg_user.png" height="23px"></img>&nbsp;&nbsp;
                <b>Username:-</label><input type="text" id="unm" name="unm" placeholder="Enter username." required></b><br><br>
                <label for="email"><img src="reg_email.png" height="23px"></img>&nbsp;&nbsp;
                <b>Email:-</label><input type="email" id="email" name="email" placeholder="Enter email" required></b><br><br>
                <input type="submit" name="signup"><br><br>
            </form>    
            <b>Already have an account?&nbsp;<a href="login.php">Log in</a></b>
        </div>
    </body>
</html>


<?php
include "connection.php";
if(isset($_POST['signup']))
{
    $fetch="select email from user where email='".$_POST['email']."'";
    $e=mysqli_query($con,$fetch);
    if(!mysqli_num_rows($e))
    {
        $ins="insert into user(username,email)values('".$_POST['unm']."','".$_POST['email']."')";
        $q=mysqli_query($con,$ins);
        ?>
        <script>
            Swal.fire({
                title: 'Registration Successful',
                text: 'You have successfully registered. Please login to continue.',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#007bff' 
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php';
                }
            });
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
             Swal.fire({
                title: 'Error',
                text: 'This email is already used.',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#0000A0'
            });
        </script>
        <?php
    }
}
?>

