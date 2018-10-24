<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Details Validation<a href="<?php echo site_url('validation/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Id Validation:</label>
                    <p><?php echo !empty($validation['ID_VALIDATION'])?$validation['ID_VALIDATION']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Client:</label>
                    <p><?php echo !empty($validation['ID_CLIENT'])?$validation['ID_CLIENT']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Personnel:</label>
                    <p><?php echo !empty($validation['ID_PERSONNEL'])?$validation['ID_PERSONNEL']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Message:</label>
                    <p><?php echo !empty($validation['MESSAGE'])?$validation['MESSAGE']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Date:</label>
                    <p><?php echo !empty($validation['DATE'])?$validation['DATE']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Valide:</label>
                    <p><?php 
                        $valide = $validation['VALIDE'];
                        if($valide == 1){
                            echo "Oui";
                        }else{
                            echo "Non";
                        }
                        //echo !empty($validation['VALIDE'])?$validation['VALIDE']:''; 
                    ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>