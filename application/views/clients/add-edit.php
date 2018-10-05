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
                <div class="panel-heading"><?php echo $action; ?> clients <a href="<?php echo site_url('client/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                <?php echo form_open_multipart();?>
                
                        <div class="form-group">
                            <label for="nomClient">Nom Client</label>
                            <input type="text" class="form-control" name="nomClient" placeholder="Entrer Nom Client" value="<?php echo !empty($client['NOM_CLIENT'])?$client['NOM_CLIENT']:''; ?>">
                            <?php echo form_error('nomClient','<p class="help-block text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nat">Nationalite</label>
                            <input type="text" name="nat" class="form-control" placeholder="Entrer Nationalite" value="<?php echo !empty($client['NATIONALITE'])?$client['NATIONALITE']:''; ?>">
                            <?php echo form_error('nat','<p class="text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="naissance">Date Naissance</label>
                            <input type="date" class="form-control" name="naissance" value="<?php echo !empty($client['DATE_NAISSANCE'])?$client['DATE_NAISSANCE']:''; ?>">
                            <?php echo form_error('naissance','<p class="help-block text-danger">','</p>'); ?>
                        </div>

                        
                        <div class="form-group">
                            <label for="Image">Image</label>
                            <input type="file" name="Image" size="20" class="form-control" />
                            <input type="text" name="oldimg" disable hidden value="<?php echo !empty($client['IMAGE'])?$client['IMAGE']:''; ?>"/>
                            <?php echo form_error('image file','<p class="text-danger">','</p>'); ?>
                        </div>

                        
                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>