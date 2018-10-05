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
                <div class="panel-heading">Produit<a href="<?php echo site_url('produit/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="50%">name produit</th>
                            <th width="15%">Qte</th>
                            <th width="15%">price</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php if(!empty($produits)): foreach ($produits as $produit): ?>
                        <tr>
                            <td><?php echo '#'.$produit['id']; ?></td>
                            <td><?php echo $produit['name']; ?></td>
                            <td><?php echo $produit['quantite']; ?></td>
                            <td><?php  echo $produit['price']; ?></td>
                            <td>
                                <a href="<?php echo site_url('produit/view/'.$produit['id']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('produit/edit/'.$produit['id']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('produit/delete/'.$produit['id']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                            <tr><td colspan="4">Produit(s) non trouvé(s)......</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/360x240" alt=""></a>
                <div class="card-body">
                <h4 class="card-title">
                    <a href="#"></a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text"></p>
                </div>
                <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/360x240" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Two</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text"></p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
        </div>
    </div>
</div>