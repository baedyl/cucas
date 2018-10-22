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
                <div class="panel-heading"><?php echo $action; ?> Paiement <a href="<?php echo site_url('paiement/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="idSession">Id session</label>
                            <!--input type="text" class="form-control" name="idClient" placeholder="Enter Id Client" value="<?php echo !empty($session['ID_CLIENT'])?$session['ID_CLIENT']:''; ?>"-->
                            <select name="sessions" class="form-control">
                                <?php foreach($sessions as $session): 
                                  
                                if($paiement['ID_SESSION'] == $session['ID_SESSION']){
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
                            <label for="mnt">Montant</label>
                             <input type="text" class="form-control" name="mnt" placeholder="Enter Montant" value="<?php echo !empty($paiement['MONTANT_PAIEM'])?$paiement['MONTANT_PAIEM']:''; ?>">
                            <?php echo form_error('mnt','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="paid">Montant Payé</label>
                            <input type="text" class="form-control" name="paid" placeholder="Enter Montant payé" value="<?php echo !empty($paiement['A_PAYE'])?$paiement['A_PAYE']:''; ?>">
                            <?php echo form_error('paid','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="mtd">Methode</label>
                            <input type="text" class="form-control" name="mtd" placeholder="Enter Methode paiement" value="<?php echo !empty($paiement['METHOD_PAIEMENT'])?$paiement['METHOD_PAIEMENT']:''; ?>">
                            <?php echo form_error('mtd','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="etat">Etat</label>
                            <input type="text" name="etat" class="form-control" placeholder="Enter Etat paiement" value="<?php echo !empty($paiement['ETAT_PAIEMENT'])?$paiement['ETAT_PAIEMENT']:''; ?>">
                            <?php echo form_error('etat','<p class="text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="dte">Date paiement</label>
                            <input type="date" name="dte" class="form-control" placeholder="Enter date" value="<?php echo !empty($paiement['DATE_PAIEMENT'])?$paiement['DATE_PAIEMENT']:''; ?>">
                            <?php echo form_error('dte','<p class="text-danger">','</p>'); ?>
                        </div>


                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>