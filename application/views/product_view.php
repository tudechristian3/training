<?php

  if(!$this->session->userdata('username'))
  {
    redirect(base_url('AdminController/index'));
  }


?>
<html>
  <head>
    <title>Admin</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				Brand
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="http://www.pingpong-labs.com" target="_blank">Profile</a></li>
				<li><a href="<?php echo base_url('AdminController/logout')?>" target="_blank">Logout</a></li>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
		<div class="col-md-2 sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="#">Dashboard</a></li>
				<li class="active"><a href="#">Products</a></li>
				<li><a href="#">Users</a></li>
			</ul>
		</div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new Product</a>
                </div>
                <div class="panel-body">
                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Product Quantity</th>
                      <th scope="col">Product Price</th>
                      <th scope="col" style="align:center">Actions</th>
                    </tr>
                  </thead>
                    <?php foreach($products as $p): ?>
                  <tbody>
                    <tr>
                      <th scope="row"><?php echo $p['product_id']?></th>
                      <td><?php echo $p['product_name']?></td>
                      <td><?php echo $p['product_quantity']?></td>
                      <td><?php echo $p['product_quantity']?></td>
                      <td>
                        <a class="btn btn-primary">Edit</a>
                        <a class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  </tbody>
                    <?php endforeach; ?>
                </table>
                </div>
            </div>
		</div>
	</div>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </body>
</html>
