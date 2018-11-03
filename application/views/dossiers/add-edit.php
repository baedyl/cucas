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
                <div class="panel-heading"><?php  echo $action; ?> Dossier <a href="<?php echo site_url('dossier/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="idSession">Id session</label>
                            <!--input type="text" class="form-control" name="idClient" placeholder="Enter Id Client" value="<?php echo !empty($session['ID_CLIENT'])?$session['ID_CLIENT']:''; ?>"-->
                            <select name="sessions" class="form-control">
                                <?php  foreach($sessions as $session): 
                                  
                                if($dossier['ID_SESSION'] == $session['ID_SESSION']){ 
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
                            <label for="ctr">Contrat</label>
                            <input type="checkbox" class="form-control" name="ctr" value="contrat" 
                                <?php 
                                    if($dossier AND $dossier['CONTRAT'] == 1) echo 'checked';
                                ?> 
                            >
                            <?php echo form_error('ctr','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pst">Passeport</label>
                            <input type="checkbox" class="form-control" name="pst" value="passport" 
                                <?php 
                                    if($dossier AND $dossier['PASSEPORT'] == 1) echo 'checked'; 
                                ?>
                            >
                            <?php echo form_error('pst','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="blt">Billet</label>
                            <input type="checkbox" class="form-control" name="blt" value="billet" 
                                <?php 
                                    if($dossier AND $dossier['BILLET'] == 1) echo 'checked'; 
                                ?>
                            >
                            <?php echo form_error('blt','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                             <label for="rps">Reponse</label>
                            <!--input type="text" class="form-control" name="idClient" placeholder="Enter Id Client" value="<?php echo !empty($session['ID_CLIENT'])?$session['ID_CLIENT']:''; ?>"-->
                            <select name="rps" class="form-control">
                         <?php  echo "<option selected value='".$dossier['REPONSE']."'>".$dossier['REPONSE']."</option>"?>
                                  <option  value='DHL'>DHL</option>
                                    <option value='SF EXPRESS'>SF EXPRESS</option>";
                                
                                    
                                ?>
                               
                            </select>
                          
                            <?php echo form_error('rps','<p class="text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                             <label for="etat">Etat Dossier</label>
                            <!--input type="text" class="form-control" name="idClient" placeholder="Enter Id Client" value="<?php echo !empty($session['ID_CLIENT'])?$session['ID_CLIENT']:''; ?>"-->
                            <select name="etat" class="form-control">
                        <?php  echo "<option selected value='".$dossier['ETAT_DOSSIER']."'>".$dossier['ETAT_DOSSIER']."</option>"?>
                                  <option  value='processing'>processing</option>
                                      <option  value='accepté'>accepté</option>
                                    <option value='transferé'>transferé</option>";
                                
                                    
                                ?>
                               
                            </select>
                          
                            <?php echo form_error('rps','<p class="text-danger">','</p>'); ?>
                        </div>


                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>