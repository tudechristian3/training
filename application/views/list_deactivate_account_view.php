<?php

  if(!$this->session->userdata('username'))
  {
    redirect(base_url('AdminController/index'));
  }


?>
<html>
  <head>
    <title>Admin</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
				<li><a href="<?php echo base_url('AdminController/home')?>">Dashboard</a></li>
				<li><a href="<?php echo base_url('ProductController/product')?>">Products</a></li>
				<li class="active"><a href="#">Users</a></li>
			</ul>
		</div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
              <?php if($this->session->flashdata('message')){ ?>
                              <div id="notif">
                                <div class="alert alert-success">
                               <strong>Successfully</strong> Added
                              </div>
                              </div>

                            <?php }else if($this->session->flashdata('delete')): ?>
                                      <div id="notif">
                                        <div class="alert alert-danger">
                                       <strong>Deleted!</strong>
                                      </div>
                                      </div>

                                  <?php endif; ?>
                <div class="panel-heading">

                    <h3>Deactivate Users</h3>


                <div class="panel-body">
                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Status</th>
                      <th scope="col" style="align:center">Actions</th>
                    </tr>
                  </thead>
                    <?php foreach($users as $u): ?>
                      <?php if($u['status'] == "Deactivate" ): ?>
                  <tbody id="show_data">
                    <td><?php echo $u['user_id']; ?></td>
                    <td><?php echo $u['name']; ?></td>
                    <td><?php echo $u['status']; ?></td>
                    <td><a href="<?php echo base_url('AdminController/activate_account')?>/<?php echo $u['user_id']; ?>" class="btn btn-primary">Activate</a></td>
                  </tbody>
                  <?php endif; ?>
                    <?php endforeach; ?>
                </table>
                </div>
            </div>
		</div>
	</div>
  </body>
</html>
