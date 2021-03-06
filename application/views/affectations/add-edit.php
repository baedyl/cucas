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
                <div class="panel-heading"><?php echo $action; ?> affectation <a href="<?php echo site_url('affectation/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                       <div class="form-group">
                            <label for="user">Id Personnel</label>
                            <!--input type="text" class="form-control" name="idClient" placeholder="Enter Id Client" value="<?php echo !empty($session['ID_CLIENT'])?$session['ID_CLIENT']:''; ?>"-->
                            <select name="user" class="form-control">
                                <?php  foreach($users as $user): 
                                  
                                if($affectations['ID_USER'] == $user['id']){
                                    echo "<option selected value='".$user['ID_PERSONNEL']."'>".$user['last_name']."</option>";
                                }
                                else{
                                    echo "<option value='".$user['id']."'>".$user['last_name']."</option>";
                                }
                                    
                                ?>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('user','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                         <div class="form-group">
                            <label for="sessions">Id Session</label>
                            <!--input type="text" class="form-control" name="idClient" placeholder="Enter Id Client" value="<?php echo !empty($session['ID_CLIENT'])?$session['ID_CLIENT']:''; ?>"-->
                            <select name="sessions" class="form-control">
                                <?php foreach($sessions as $session): 
                                  
                                if($affectations['ID_SESSION'] == $session['ID_SESSION']){
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
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" value="<?php echo !empty($affectations['DATE'])?$affectations['DATE']:''; ?>">
                            <?php echo form_error('date','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tel">Commentaire</label>
                            <input type="text" class="form-control" name="cmt" placeholder="Enter Commentaire" value="<?php echo !empty($affectations['COMMENTAIRE'])?$affectations['COMMENTAIRE']:''; ?>">
                            <?php echo form_error('cmt','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>