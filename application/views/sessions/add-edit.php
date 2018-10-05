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
                <div class="panel-heading"><?php echo $action; ?> session <a href="<?php echo site_url('session/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="idClient">Id Client</label>
                            <input type="text" class="form-control" name="idClient" placeholder="Enter Id Client" value="<?php echo !empty($session['ID_CLIENT'])?$session['ID_CLIENT']:''; ?>">
                            <?php echo form_error('idClient','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="type">Type Session</label>
                            <input type="text" class="form-control" name="type" placeholder="Enter Type Session" value="<?php echo !empty($session['TYPE_SESSION'])?$session['TYPE_SESSION']:''; ?>">
                            <?php echo form_error('type','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="debut">Date Debut</label>
                            <input type="date" class="form-control" name="debut" value="<?php echo !empty($session['DATE_DEBUT'])?$session['DATE_DEBUT']:''; ?>">
                            <?php echo form_error('debut','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="fin">Date Fin</label>
                            <input type="date" class="form-control" name="fin" value="<?php echo !empty($session['DATE_CLOTURE'])?$session['DATE_CLOTURE']:''; ?>">
                            <?php echo form_error('fin','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="partenaire">Partenaire</label>
                            <input name="partenaire" class="form-control" placeholder="Enter Partenaire" value="<?php echo !empty($session['PARTENAIRE'])?$session['PARTENAIRE']:''; ?>">
                            <?php echo form_error('partenaire','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="finance">Type Financement</label>
                            <input name="finance" class="form-control" placeholder="Enter finance" value="<?php echo !empty($session['TYPE_FINANCE'])?$session['TYPE_FINANCE']:''; ?>">
                            <?php echo form_error('finance','<p class="text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="etat">Etat Session</label>
                            <input name="etat" class="form-control" placeholder="Enter etat" value="<?php echo !empty($session['ETAT_SESSION'])?$session['ETAT_SESSION']:''; ?>">
                            <?php echo form_error('etat','<p class="text-danger">','</p>'); ?>
                        </div>


                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>