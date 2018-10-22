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
                <div class="panel-heading"><?php echo $action; ?> Visa <a href="<?php echo site_url('visa/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="idSession">Id session</label>
                            <!--input type="text" class="form-control" name="idClient" placeholder="Enter Id Client" value="<?php echo !empty($session['ID_CLIENT'])?$session['ID_CLIENT']:''; ?>"-->
                            <select name="idSession" class="form-control">
                                <?php foreach($sessions as $session): 
                                  
                                if($visa['ID_SESSION'] == $session['ID_SESSION']){
                                    echo "<option selected value='".$session['ID_SESSION']."'>".$session['ID_SESSION']."</option>";
                                }
                                else{
                                    echo "<option value='".$session['ID_SESSION']."'>".$session['ID_SESSION']."</option>";
                                }
                                    
                                ?>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('sessions','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="date">Date Visa</label>
                             <input type="date" class="form-control" name="date" value="<?php echo !empty($visa['DATE_VISA'])?$visa['DATE_VISA']:''; ?>">
                            <?php echo form_error('date','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="duree">Durée Visa</label>
                            <input type="text" class="form-control" name="duree" placeholder="Enter durée visa" value="<?php echo !empty($visa['DUREE_VISA'])?$visa['DUREE_VISA']:''; ?>">
                            <?php echo form_error('duree','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pays">Pays</label>
                            <input type="text" class="form-control" name="pays" placeholder="Enter Pays" value="<?php echo !empty($visa['PAYS'])?$visa['PAYS']:''; ?>">
                            <?php echo form_error('pays','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="etat">Etat visa</label>
                            <input type="text" name="etat" class="form-control" placeholder="Enter Etat visa" value="<?php echo !empty($visa['ETAT_VISA'])?$visa['ETAT_VISA']:''; ?>">
                            <?php echo form_error('etat','<p class="text-danger">','</p>'); ?>
                        </div>

                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>