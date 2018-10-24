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
                <div class="panel-heading"><?php echo $action; ?> Validation <a href="<?php echo site_url('validation/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="clients">Id Client*</label>
                            <!--input type="text" class="form-control" name="idClient" placeholder="Enter Id Client" value="<?php echo !empty($client['ID_CLIENT'])?$client['ID_CLIENT']:''; ?>"-->
                            <select name="clients" class="form-control">
                                <?php foreach($clients as $client): 
                                  
                                if($validation['ID_CLIENT'] == $client['ID_CLIENT']){
                                    echo "<option selected value='".$client['ID_CLIENT']."'>".$client['ID_CLIENT']."</option>";
                                }
                                else{
                                    echo "<option value='".$client['ID_CLIENT']."'>".$client['ID_CLIENT']."</option>";
                                }
                                    
                                ?>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('clients','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="personnels">Id Personnel</label>
                            <!--input type="text" class="form-control" name="idClient" placeholder="Enter Id Client" value="<?php echo !empty($personnel['ID_PERSONNEL'])?$personnel['ID_PERSONNEL']:''; ?>"-->
                            <select name="personnels" class="form-control">
                                <?php foreach($personnels as $personnel): 
                                  
                                if($validation['ID_PERSONNEL'] == $personnel['ID_PERSONNEL']){
                                    echo "<option selected value='".$personnel['ID_PERSONNEL']."'>".$personnel['ID_PERSONNEL']."</option>";
                                }
                                else{
                                    echo "<option value='".$personnel['ID_PERSONNEL']."'>".$personnel['ID_PERSONNEL']."</option>";
                                }
                                    
                                ?>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('personnels','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="message">Message</label>
                            <input name="message" class="form-control" placeholder="Enter message" value="<?php echo !empty($validation['MESSAGE'])?$validation['MESSAGE']:''; ?>">
                            <?php echo form_error('message','<p class="text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" class="form-control" placeholder="" value="<?php echo !empty($validation['DATE'])?$validation['DATE']:''; ?>">
                            <?php echo form_error('date','<p class="text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="valide">Valide</label>
                            <input type="checkbox" class="form-control" name="valide" value="valide" 
                                <?php 
                                    if($validation AND $validation['VALIDE'] == 1) echo 'checked';
                                ?> 
                            >
                            <?php echo form_error('valide','<p class="help-block text-danger">','</p>'); ?>
                        </div>


                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>