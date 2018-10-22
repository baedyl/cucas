<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Details Visa<a href="<?php echo site_url('visa/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Id Visa:</label>
                    <p><?php echo !empty($visa['ID_VISA'])?$visa['ID_VISA']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Id Session:</label>
                    <p><?php echo !empty($visa['ID_SESSION'])?$visa['ID_SESSION']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Date Visa:</label>
                    <p><?php echo !empty($visa['DATE_VISA'])?$visa['DATE_VISA']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Durée Visa:</label>
                    <p><?php echo !empty($visa['DUREE_VISA'])?$visa['DUREE_VISA']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Pays:</label>
                    <p><?php echo !empty($visa['PAYS'])?$visa['PAYS']:''; ?></p>
                </div>
                      <div class="form-group">
                    <label>Etat Visa:</label>
                    <p><?php echo !empty($visa['ETAT_VISA'])?$visa['ETAT_VISA']:''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>