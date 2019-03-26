<?php
session_start();
include_once('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload files</title>
</head>
<body>
<?php
if (isset($_SESSION['id'])) {
 if ($_SESSION['id'] == 1) {
     echo "you are logged in as an user no. 1 (admin)";
 }
echo "<!--img upload form-->
<form action='upload.php' method='post' enctype='multipart/form-data'>
    <input type='file' name='soubor'>
    <button type='submit' name='submit'>Nahraj soubor</button>
</form>";
} else {
    echo "you are not logged in";
echo "<form action='signup.php' method='post'>
    <input type='text' name='first' placeholder='First name'>
    <input type='text' name='last' placeholder='Last name'>
    <input type='text' name='username' placeholder='Username'>
    <input type='password' name='password' placeholder='Password'>
    <button type='submit' name='submitsignup'>Signup new user</button>
</form>";


}


?>


<!--login form-->
<form action="login.php" method="post">
    <button type="submit" name="submitlogin">
        Log in
    </button>
</form>

<!--logout form-->
<form action="logout.php" method="post">
    <button type="submit" name="submitlogout">
        Logout
    </button>
</form>
    
</body>
</html>