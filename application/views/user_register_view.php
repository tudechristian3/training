<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('../bootstrapv5/css/style.css')?>">
    <title>Document</title>
</head>
<body style="background-color:#0da4f5">

    <div class="card-profile"><br/>
        <center><h3>User Registration</h3></center>
        <div class="container-profile">
          <form action="<?php echo base_url('UserController/register_account')?>" method="post">
              <input type="text" name="txtname" placeholder="Name" required><br>
              <input type="text" name="txtaddress" placeholder="Address" required><br>
              <input type="text" name="username" placeholder="Username" required><br>
              <input type="password" name="password" placeholder="Password" required><br>
              <button>Login</button>
          </form>
        </div>
    </div>

</body>
</html>
