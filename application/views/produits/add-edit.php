<div class="container">
    <div class="col-xs-12">
    <?php 
        if(!empty($success_msg)){
            echo '<div class="alert alert-success">'.$success_msg.'</div>';
        }elseif(!empty($error_msg)){
            echo '<div class="alert alert-danger">'.$error_msg.'</div>';
        }
    ?>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $action; ?> produits <a href="<?php echo site_url('produit/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                <?php echo form_open_multipart();?>
                
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" name="name" placeholder="Entrer Nom" value="<?php echo !empty($produit['name'])?$produit['name']:''; ?>">
                            <?php echo form_error('name','<p class="help-block text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="price">price</label>
                            <textarea name="price" class="form-control" placeholder="Entrer prix Produit"><?php echo !empty($produit['price'])?$produit['price']:''; ?></textarea>
                            <?php echo form_error('price','<p class="text-danger">','</p>'); ?>
                        </div>

                        
                        <div class="form-group">
                            <label for="Image">Image</label>
                            <input type="file" name="Image" size="20" class="form-control" />
                            <input type="text" name="oldimg" disable hidden value="<?php echo !empty($produit['image'])?$produit['image']:''; ?>"/>
                            <?php echo form_error('image file','<p class="text-danger">','</p>'); ?>
                        </div>
                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>