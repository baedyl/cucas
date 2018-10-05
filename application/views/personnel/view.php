<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Details Personnel<a href="<?php echo site_url('personnel/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Nom:</label>
                    <p><?php echo !empty($personnel['NOM_PERSONNEL'])?$personnel['NOM_PERSONNEL']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>CIN:</label>
                    <p><?php echo !empty($personnel['CIN_PERSONNEL'])?$personnel['CIN_PERSONNEL']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Tel:</label>
                    <p><?php echo !empty($personnel['NUM_TEL'])?$personnel['NUM_TEL']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <p><?php echo !empty($personnel['EMAIL'])?$personnel['EMAIL']:''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>