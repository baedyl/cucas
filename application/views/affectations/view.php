<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Details affectations<a href="<?php echo site_url('affectation/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>ID P:</label>
                    <p><?php echo !empty($affectation['ID_PERSONNEL'])?$affectation['ID_PERSONNEL']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>ID S:</label>
                    <p><?php echo !empty($affectation['ID_SESSION'])?$affectation['ID_SESSION']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Date:</label>
                    <p><?php echo !empty($affectation['DATE'])?$affectation['DATE']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Commentaire:</label>
                    <p><?php echo !empty($affectation['COMMENTAIRE'])?$affectation['COMMENTAIRE']:''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>