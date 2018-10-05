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
                <div class="panel-heading"><?php echo $action; ?> personnel <a href="<?php echo site_url('personnel/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="nom">Nom Personnel</label>
                            <input type="text" class="form-control" name="nom" placeholder="Enter nom" value="<?php echo !empty($personnel['NOM_PERSONNEL'])?$personnel['NOM_PERSONNEL']:''; ?>">
                            <?php echo form_error('nom','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="cin">CIN Personnel</label>
                            <input type="text" class="form-control" name="cin" placeholder="Enter CIN" value="<?php echo !empty($personnel['CIN_PERSONNEL'])?$personnel['CIN_PERSONNEL']:''; ?>">
                            <?php echo form_error('nom','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tel">Telephone</label>
                            <input type="text" class="form-control" name="tel" placeholder="Enter tel" value="<?php echo !empty($personnel['NUM_TEL'])?$personnel['NUM_TEL']:''; ?>">
                            <?php echo form_error('nom','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <textarea name="email" class="form-control" placeholder="Enter Email"><?php echo !empty($personnel['EMAIL'])?$personnel['EMAIL']:''; ?></textarea>
                            <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                        </div>

                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>