<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login and register</title>
    <link rel="stylesheet" href="loginregister.css" />
    <link rel="stylesheet" href="loginregister.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper">
    
      <div class="form-box login">
        <form action="login2.php" method="post">
          <h2 class="animation" style="--i: 0; --j: 21">Login</h2>
          <div class="input-box animation" style="--i: 1; --j: 22">
            <input type="text" name="user" required />
            <label>Username</label>
            <i class="bx bxs-user"></i>
          </div>
          <div class="input-box animation" style="--i: 2; --j: 23">
            <input type="password" name="pass" required />
            <label>Password</label>
            <i class="bx bxs-lock-alt"></i>
          </div>
          <a href="login2.php"><button type="submit" class="btn animation" style="--i: 3; --j: 24">
            Login
          </button></a>
          <div class="loginregister-link animation" style="--i: 4; --j: 25">
            <p>
              Don't have an account?
              <a href="" class="register-link">Sign-up</a>
            </p>
          </div>
        </form>
      </div>

      <div class="form-box register">
        <h2 class="animation" style="--i: 17; --j: 0">Sign Up</h2>
        <form action="register2.php" method="post">
          <div class="input-box animation" style="--i: 18; --j: 1">
            <input type="text" name="user" required />
            <label>Username</label>
            <i class="bx bxs-user"></i>
          </div>
          <div class="input-box animation" style="--i: 19; --j: 2">
            <input type="text" name="email" required />
            <label>Email</label>
            <i class="bx bxs-envelope"></i>
          </div>
          <div class="input-box animation" style="--i: 20; --j: 3">
            <input type="password" name="pass" required />
            <label>Password</label>
            <i class="bx bxs-lock-alt"></i>
          </div>

          <a href="register2.php"><button type="submit" class="btn animation" style="--i: 22; --j: 5">
            Sign Up</button></a>
          <div class="loginregister-link animation" style="--i: 23; --j: 6">
            <p>
              Already have an account?
              <a href="" class="login-link">Login</a>
            </p>
          </div>
        </form>
      </div>
    </div>

    <script src="script.js"></script>
  </body>
</html>