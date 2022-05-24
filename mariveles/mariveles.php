<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="loc.css"> 
    </head>
<body>
    <header>
         <img src="../images/I-EatLogo.png" alt="LOGO" usemap="#workmap" width="200" height="200">
        <map name="workmap">
            <area shape="circle" coords="100,100,400,400" alt="logo" href="home.php">
        </map>
    </header>


<main>
    <button class="loginbtn" onclick="openForm()">Login</button>
        <div class="form-popup" id="myForm">
        <form action="login.php" class="form-container">
            <h1>Login as</h1>
            <button type="submit" class="ownerbtn" href="login.php">Owner</button>
            <button type="submit" class="customerbtn" href="login.php">Customer</button>
            <button type="submit" class="adminbtn" href="login.php">Admin</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</main>
</body>
</html>