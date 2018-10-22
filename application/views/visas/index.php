<div class="container">
    <?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">Visa <a href="<?php echo site_url('visa/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">ID Visa</th>
                            <th width="5%">ID Session</th>
                            <th width="15%">Date</th>
                            <th width="10%">Durée</th>  
                            <th width="15%">Pays</th>
                            <th width="10%">Etat</th>
                            <th width="10%">Action</th>

                            
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php if(!empty($visas)): foreach($visas as $visa): ?>
                        <tr>
                            <td><?php echo '#'.$visa['ID_VISA']; ?></td>
                            <td><a href="<?php echo site_url('session/view/'.$visa['ID_SESSION']); ?>"><?php echo $visa['ID_SESSION']; ?></a></td>
                            <td><?php echo $visa['DATE_VISA']; ?></td>
                            <td><?php echo $visa['DUREE_VISA']; ?></td>
                            <td><?php echo $visa['PAYS']; ?></td>
                            <td><?php echo $visa['ETAT_VISA']; ?></td>
                            <td>
                                <a href="<?php echo site_url('visa/view/'.$visa['ID_VISA']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('visa/edit/'.$visa['ID_VISA']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('visa/delete/'.$visa['ID_VISA']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="4">Visa(s) non trouvé(s)......</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>