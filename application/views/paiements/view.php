<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Details paiement<a href="<?php echo site_url('paiement/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Id Session:</label>
                    <p><?php echo !empty($paiement['ID_SESSION'])?$paiement['ID_SESSION']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Montant:</label>
                    <p><?php echo !empty($paiement['MONTANT_PAIEM'])?$paiement['MONTANT_PAIEM']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>A payé:</label>
                    <p><?php echo !empty($paiement['A_PAYE'])?$paiement['A_PAYE']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Methode:</label>
                    <p><?php echo !empty($paiement['METHOD_PAIEMENT'])?$paiement['METHOD_PAIEMENT']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Etat:</label>
                    <p><?php echo !empty($paiement['ETAT_PAIEMENT'])?$paiement['ETAT_PAIEMENT']:''; ?></p>
                </div>
                      <div class="form-group">
                    <label>Date:</label>
                    <p><?php echo !empty($paiement['DATE_PAIEMENT'])?$paiement['DATE_PAIEMENT']:''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>