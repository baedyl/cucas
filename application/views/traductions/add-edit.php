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
                <div class="panel-heading"><?php echo $action; ?> Traductions <a href="<?php echo site_url('traduction/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="clients">Id Client</label>
                            <!--input type="text" class="form-control" name="idClient" placeholder="Enter Id Client" value="<?php echo !empty($session['ID_CLIENT'])?$session['ID_CLIENT']:''; ?>"-->
                            
                            <select name="clients" class="form-control">
                                <?php foreach($clients as $client): 
                                    
                                if($traduction['ID_CLIENT'] == $client['ID_CLIENT']){
                                    echo "<option selected value='".$client['ID_CLIENT']."'>".$client['NOM_CLIENT']."</option>";
                                }
                                else{
                                    echo "<option value='".$client['ID_CLIENT']."'>".$client['NOM_CLIENT']."</option>";
                                }
                                    
                                ?>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('clients','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                         <div class="form-group">
                       <!--     <label for="users">Id User</label>
                            <!--input type="text" class="form-control" name="idClient" placeholder="Enter Id Client" value="<?php echo !empty($session['ID_CLIENT'])?$session['ID_CLIENT']:''; ?>"
                            
                            <select name="users" class="form-control">
                                <?php foreach($users as $user): 
                                    
                                if($traduction['ID_USER'] == $user['ID_USER']){
                                    echo "<option selected value='".$user['ID_USER']."'>".$user['FIRST_NAME']."</option>";
                                }
                                else{
                                    echo "<option value='".$user['ID_USER']."'>".$user['ID_USER']."</option>";
                                }
                                    
                                ?>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('users','<p class="help-block text-danger">','</p>'); ?>
                        </div>-->
                        <div class="form-group">
                            <label for="manus">Manuscrit</label>
                           <select name="manus" class="form-control">
                             <?php  echo "<option selected value='".$traduction['TYPE_MANUS']."'>".$traduction['TYPE_MANUS']."</option>"?>
                                <option  value='Diplôme Bac'>Diplôme Bac</option>
                                <option value='Diplôme Licence'>Diplôme Licence</option>
                                <option  value='Diplôme Master'>Diplôme Master</option>
                                <option  value='Diplôme'>Diplôme</option>
                                <option  value='Relevé Recap'>Relevé Recap</option>
                                <option  value='Relevé'>Relevé</option>
                                <option  value='Analyse'>Analyse</option>
                                <option  value='Attestation'>Attestation</option>
                                <option  value='Fiche anthropométrique'>Fiche anthropométrique</option>
                                <option value='Certificat medical'>Certificat medical</option>";
                                
                                    
                                ?>
                               
                            </select>
                            <?php echo form_error('manus','<p class="help-block text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="mnt">Montant</label>
                            <input type="text" name="mnt" class="form-control" placeholder="Entrer Montant" value="<?php echo !empty($traduction['MONTANT'])?$traduction['MONTANT']:''; ?>">
                            <?php echo form_error('mnt','<p class="text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="pmt">Paiement</label>
                            <input type="text" class="form-control" name="pmt" value="<?php echo !empty($traduction['PAIEMENT'])?$traduction['PAIEMENT']:''; ?>">
                            <?php echo form_error('pmt','<p class="help-block text-danger">','</p>'); ?>
                        </div>

                        
                        <div class="form-group">
                            <label for="etat">Etat</label>
                             <select name="etat" class="form-control">
                             <?php  echo "<option selected value='".$traduction['ETAT_TRAD']."'>".$traduction['ETAT_TRAD']."</option>"?>
                                  <option  value='payé'>payé</option>
                                    <option value='non payé'>non payé</option>;
                                ?>
                               
                            </select>
                            <?php echo form_error('etat','<p class="help-block text-danger">','</p>'); ?>
                        </div>

                        
                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>