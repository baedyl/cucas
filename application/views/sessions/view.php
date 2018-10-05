<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Details Session<a href="<?php echo site_url('session/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Id Client:</label>
                    <p><?php echo !empty($session['ID_CLIENT'])?$session['ID_CLIENT']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Type Session:</label>
                    <p><?php echo !empty($session['TYPE_SESSION'])?$session['TYPE_SESSION']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Date Debut:</label>
                    <p><?php echo !empty($session['DATE_DEBUT'])?$session['DATE_DEBUT']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Date Fin:</label>
                    <p><?php echo !empty($session['DATE_CLOTURE'])?$session['DATE_CLOTURE']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Partenaire:</label>
                    <p><?php echo !empty($session['PARTENAIRE'])?$session['PARTENAIRE']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Financement:</label>
                    <p><?php echo !empty($session['TYPE_FINANCE'])?$session['TYPE_FINANCE']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Etat Session:</label>
                    <p><?php echo !empty($session['ETAT_SESSION'])?$session['ETAT_SESSION']:''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>