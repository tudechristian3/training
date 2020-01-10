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
				<li class="active"><a href="#">Products</a></li>
				<li><a href="<?php echo base_url('AdminController/users')?>">Users</a></li>
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

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Product</button>


                <div class="panel-body">
                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Product Description</th>
                      <th scope="col">Product Quantity</th>
                      <th scope="col">Product Price</th>
                      <th scope="col" style="align:center">Actions</th>
                    </tr>
                  </thead>
                    <!-- <?php foreach($products as $p): ?> -->
                  <tbody id="show_data">

                  </tbody>
                    <!-- <?php endforeach; ?> -->
                </table>
                </div>
            </div>
		</div>
	</div>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Product</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url('ProductController/add_product')?>">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                  <input type="file" name="product_image" required /><br/>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Product Name" name="product_name" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Product Description" name="product_description" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control" placeholder="Product Quantity" name="product_quantity" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                  <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="material-icons">attach_money</i>
                                          </span>
                                          <div class="form-line">
                                              <input type="number" class="form-control money-dollar" placeholder="Ex: 99,99 $" name="product_price" required>
                                          </div>
                                  </div>
                                </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-primary">Add Product</button>
        </div>
      </form>
      </div>

    </div>
  </div>

</div>
<div id="myModalEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Product</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="text" name="product_id_edit" id="product_id_edit" class="form-control" placeholder="Product Name">
                          <div class="row clearfix">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <input type="text" class="form-control" placeholder="Product Name" name="product_name_edit" id="product_name_edit" required />
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <input type="text" class="form-control" placeholder="Product Description" name="product_description_edit" id="product_description_edit" required />
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <input type="number" class="form-control" placeholder="Product Quantity" name="product_quantity_edit" id="product_quantity_edit" required />
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-6">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">attach_money</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" class="form-control money-dollar" placeholder="Ex: 99,99 $" name="product_price_edit" id="product_price_edit" required>
                                        </div>
                                </div>
                              </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" id="btn_update">Add Product</button>
      </div>
    </form>
    </div>

  </div>
</div>
</div>


<div id="myModalDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Product</h4>
      </div>
      <div class="modal-body">
        <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="product_id_delete" id="product_id_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>

      </div>
    </form>
    </div>

  </div>
</div>
</div>
<script>
  $(document).ready(function(){

    show_product();

    function show_product(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo base_url('ProductController/all_data')?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                  		'<td>'+data[i].product_id+'</td>'+
		                        '<td>'+data[i].product_name+'</td>'+
		                        '<td>'+data[i].product_description+'</td>'+
		                        '<td>'+data[i].product_quantity+'</td>'+
		                        '<td>'+data[i].product_price+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-product_id="'+data[i].product_id+'" data-product_name="'+data[i].product_name+'" data-product_description="'+data[i].product_description+'" data-product_quantity="'+data[i].product_quantity+'" data-product_price="'+data[i].product_price+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-product_id="'+data[i].product_id+'">Delete</a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}

    $('#show_data').on('click','.item_edit',function(){
        var product_id = $(this).data('product_id');
        var product_name = $(this).data('product_name');
        var product_description = $(this).data('product_description');
        var product_quantity = $(this).data('product_quantity');
        var product_price = $(this).data('product_price');

        $('#myModalEdit').modal('show');
        $('[name="product_id_edit"]').val(product_id);
        $('[name="product_name_edit"]').val(product_name);
        $('[name="product_description_edit"]').val(product_description);
        $('[name="product_quantity_edit"]').val(product_quantity);
        $('[name="product_price_edit"]').val(product_price);
    });



    $('#btn_update').on('click',function(){
           var product_id = $('#product_id_edit').val();
           var product_name = $('#product_name_edit').val();
           var product_description = $('#product_description_edit').val();
           var product_quantity = $('#product_quantity_edit').val();
           var product_price = $('#product_price_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('ProductController/edit_product')?>",
                dataType : "JSON",
                data : {product_id:product_id, product_name:product_name , product_description:product_description, product_quantity:product_quantity, product_price:product_price},
                success: function(data){
                    $('[name="product_id_edit"]').val("");
                    $('[name="product_name_edit"]').val("");
                    $('[name="product_description_edit"]').val("");
                    $('[name="product_quantity_edit"]').val("");
                    $('[name="product_price_edit"]').val("");
                    $('#myModalEdit').modal('hide');
                    show_product();
                }
            });
            return false;
        });

        $('#show_data').on('click','.item_delete',function(){
            var product_id = $(this).data('product_id');

            $('#myModalDelete').modal('show');
            $('[name="product_id_delete"]').val(product_id);
        });

        $('#btn_delete').on('click',function(){
            var product_id = $('#product_id_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('ProductController/delete')?>",
                dataType : "JSON",
                data : {product_id:product_id},
                success: function(data){
                    $('[name="product_id_delete"]').val("");
                    $('#myModalDelete').modal('hide');
                    show_product();
                }
            });
            return false;
        });

  });

</script>
  </body>
</html>
