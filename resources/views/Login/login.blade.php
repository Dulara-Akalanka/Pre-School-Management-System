<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet"  href="{{asset('loginStyle.css') }}">
       
    </head>
    <body>
        <section>
            <h2 style="word-spacing: 22px;">Anjana Little Friends</h2>
            <div class="form-container">
                <h1><b>Login Form</b></h1>
                <form action="{{route('sign-in')}}" method="post" enctype="multipart/form-data">
                    @csrf
                     <div class="control">
                       <label class="labeluser"  for="name">Username</label>
                        <input type="text" name="username" id="Username" required>
                       

                    </div>
                    <div class="control">
                        <label for="psw" class="lablepsw">Password</label>
                        <input type="password" name="password" id="Password" required>
                       

                   </div>
                   <span><input type="checkbox"> Remember me.</span>
                   <div class="control">
                   <button type="submit">Login</button>
                   </div>
                </form>
            <div class="link">
            <a href="#">Forgot Password ?</a>
            </div>
        </div>
    </section>
</body>
</html>