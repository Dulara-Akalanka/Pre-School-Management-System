<?php   
session_start();  
?>

<!DOCTYPE html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <div class="background"></div>
 <img src="images\logo2.png"  width="300px" height="100px" class="LOGIN">
 <img src="images\logo2.png"  width="300px" height="100px" align="right" class="LOGIN2">
    <form method="post" action="login.php">
        <h3>LOGIN</h3>
        <label for="username">UserName</label>
         <input type="text" name="username" placeholder="Username" required>
         <label for="password">Password</label>
         <input type="password" name="password" placeholder="Password" required>
         </placehold>
         <button  type="submit" name="submit" >LOGIN</button>
        
        
 </div>
</form>
</body>
</html>