<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Details Dossier<a href="<?php echo site_url('dossier/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Id Session:</label>
                    <p><?php echo !empty($dossier['ID_SESSION'])?$dossier['ID_SESSION']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Contrat:</label>
                    <p><?php echo !empty($dossier['CONTRAT'])?$dossier['CONTRAT']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Passeport:</label>
                    <p><?php echo !empty($dossier['PASSEPORT'])?$dossier['PASSEPORT']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Billet:</label>
                    <p><?php echo !empty($dossier['BILLET'])?$dossier['BILLET']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Etat:</label>
                    <p><?php echo !empty($dossier['ETAT_DOSSIER'])?$dossier['ETAT_DOSSIER']:''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>