<?php

  if(!$this->session->userdata('username'))
  {
    redirect(base_url('UserController/index'));
  }
  foreach($users as $u):
    if($u['username'] == $this->session->userdata('username')):
        if($u['status'] == 'Admin'):
          redirect(base_url('UserController/index'));

        endif;
    endif;
  endforeach;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('../bootstrapv5/css/style.css')?>">
    <title>Document</title>
</head>
<body>

    <div class="wrap">
        <input type="text" placeholder="Search">
    </div>

    <nav>
       <div class="wrap">
           <div class="topnav">
               <a class="active" href="#home">Home</a>
               <div class="topnav-right">
                 <a href="<?php echo base_url('UserController/mycart')?>" class="badge1" data-badge="1" id="notif"><img src="<?php echo base_url('../bootstrapv5/images/shopping-cart.png')?>" alt="" ></a>
                 <div class="dropdown">
                 <?php foreach($users as $u):?>
                   <?php if($this->session->userdata('username') == $u['username']): ?>
                   <button class="dropbtn"><?php echo $u['name']; ?></button>
                   <div class="dropdown-content">
                       <a href="<?php echo base_url('UserController/profile')?>/<?php echo $u['user_id']; ?>">Profile</a>
                       <a href="<?php echo base_url('UserController/logout')?>">Logout</a>
                     </div>
                   <?php endif; ?>
                   <?php endforeach; ?>
                 </div>
               </div>
             </div>
           </div>
       </div>
   </nav>

    <div class="wrap">
        <h1>New Products</h1>
        <div class="flex-container">
          <?php foreach($products as $p): ?>
            <div class="card">
                <div class="img">
                    <figure>
                        <img src="<?php echo base_url('../upload/'. $p['image']);?>" alt="" style="width:100%">
                    </figure>
                </div>
                <div class="container">
                        <h4><b><?php echo $p['product_name']?></b></h4>
                        <button class="btnBlue">Add to Cart</button>
                        <button class="btnGreen">View</button>
                </div>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- End of New Product -->
    </div>





</body>

</html>
