<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Details traduction<a href="<?php echo site_url('traduction/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Id Client:</label>
                    <p><?php echo !empty($traduction['ID_CLIENT'])?$traduction['ID_CLIENT']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Manuscrit:</label>
                    <p><?php echo !empty($traduction['TYPE_MANUS'])?$traduction['TYPE_MANUS']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Montant:</label>
                    <p><?php echo !empty($traduction['MONTANT'])?$traduction['MONTANT']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Paiement:</label>
                    <p><?php echo !empty($traduction['PAIEMENT'])?$traduction['PAIEMENT']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Etat:</label>
                    <p><?php echo !empty($traduction['ETAT_TRAD'])?$traduction['ETAT_TRAD']:''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>