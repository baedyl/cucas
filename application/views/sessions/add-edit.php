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
                            <!--input type="text" class="form-control" name="idClient" placeholder="Enter Id Client" value="<?php echo !empty($session['ID_CLIENT'])?$session['ID_CLIENT']:''; ?>"-->
                            <select name="clients" class="form-control">
                                <?php foreach($clients as $client): 
                                if($session['ID_CLIENT'] == $client['ID_CLIENT']){
                                    echo "<option selected value='".$client['ID_CLIENT']."'>".$client['NOM_CLIENT']."</option>";
                                }
                                else{
                                    echo "<option value='".$client['ID_CLIENT']."'>".$client['NOM_CLIENT']."</option>";
                                }
                                    
                                ?>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('idClient','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="type">Type Session</label>
                            <select name="type" class="form-control">
                             <?php  echo "<option selected value='".$session['TYPE_SESSION']."'>".$session['TYPE_SESSION']."</option>"?>
                                  <option  value='AUTUMN'>AUTUMN</option>
                                    <option value='WINTER'>WINTER</option>";
                                
                                    
                                ?>
                               
                            </select>
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
                            <select name="finance" class="form-control">
                             <?php  echo "<option selected value='".$session['TYPE_FINANCE']."'>".$session['TYPE_FINANCE']."</option>"?>
                                  <option  value='self-sponsored'>self-sponsored</option>
                                    <option value='scolarship'>scolarship</option>";
                                
                                    
                                ?>
                               
                            </select>
                            <?php echo form_error('finance','<p class="text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="etat">Etat Session</label>
                         <select name="etat" class="form-control">
                             <?php  echo "<option selected value='".$session['ETAT_SESSION']."'>".$session['ETAT_SESSION']."</option>"?>
                                  <option  value='en cours'>en cours</option>
                                    <option value='cloturé'>cloturé</option>"
                                    <option value='rejeté'>rejeté</option>";
                                    
                                ?>
                               
                            </select>
                            <?php echo form_error('etat','<p class="text-danger">','</p>'); ?>
                        </div>


                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>