<!--div class="container">

<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" 
onclick="javascript:opencart()" >
    <span>
      Cart ( <span class="cartcount"><?php echo count($this->cart->contents());  ?></span> )
    </span>
</button>
</div-->
<div class="container">
    <?php if(!empty($success_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-success"><?php echo $success_msg; ?></div>
        </div>
        <?php }elseif(!empty($error_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
        </div>
    <?php } ?>
    <div class="row">     
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">Liste des clients<a href="<?php echo site_url('client/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>                
                    <?php 
                    $this->load->helper('directory'); // Load directory helper
                    $dir = "public/img/"; // Your Path to folder
                    //$map = directory_map($dir); /* This function reads the directory path specified in the first parameter and builds an array representation of it and all its contained files. */
                    ?>
                    <?php if(!empty($clients)): foreach ($clients as $client): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="gallery"> 
                            <div class="card h-100"> 
                                <a href="<?php echo site_url('client/view/'.$client['ID_CLIENT']); ?>"><img class="card-img-top" src="<?php echo base_url($dir)."/".$client['IMAGE'];?>" alt="<?php $client['NOM_CLIENT'] ?>"></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#"><?php echo $client['NOM_CLIENT']; ?></a>
                                    </h4>
                                    <h5><?php  echo $client['NATIONALITE']; ?></h5>
                                    <p class="card-text"></p>
                                    <div class="card-footer">
                                        <a href="<?php echo site_url('client/view/'.$client['ID_CLIENT']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                        <a href="<?php echo site_url('client/edit/'.$client['ID_CLIENT']); ?>" class="glyphicon glyphicon-edit"></a>
                                        <a href="<?php echo site_url('client/delete/'.$client['ID_CLIENT']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                                        <div class="col-md-5">
                                            <input type="number" name="qty" id="<?php echo $client['ID_CLIENT']; ?>" value="1" class="quantity form-control">
                                            <!--button class="add_cart glyphicon glyphicon-plus" data-id="<?php echo $client['ID_CLIENT']; ?>" data-name="<?php echo $client['NOM_CLIENT']; ?>" 
                                        data-price="<?php echo $client['NATIONALITE']; ?>"></button-->
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                
                <?php endforeach; else: ?>
                    <p>Client(s) non trouvé(s)......</p>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div> 
    <!--div class="col-md-4">
        <h4>Shopping Cart</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Items</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="detail_cart">

            </tbody>
                
        </table>
    </div>     
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.add_cart').click(function(){
            var id   = $(this).data("id");
            var name  = $(this).data("name");
            var price = $(this).data("price");
            var qty  = $('#' + id).val();
            $.ajax({
                url : "<?php echo site_url('client/add_to_cart');?>",
                method : "POST",
                data : {id: id, name: name, price: price, qty: qty},
                success: function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
 
         
        $('#detail_cart').load("<?php echo site_url('client/load_cart');?>");
 
         
        $(document).on('click','.romove_cart',function(){
            var row_id=$(this).attr("id"); 
            $.ajax({
                url : "<?php echo site_url('client/delete_cart');?>",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
    });
</script-->

