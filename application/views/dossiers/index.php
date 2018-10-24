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
                <div class="panel-heading">Dossier <a href="<?php echo site_url('dossier/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">ID Dossier</th>
                            <th width="5%">ID Session</th>
                            <th width="10%">Contrat</th>
                            <th width="10%">Passeport</th>  
                            <th width="10%">Billet</th>
                            <th width="10%">Reponse</th>
                            <th width="10%">Etat</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php if(!empty($dossiers)): foreach($dossiers as $dossier): ?>
                        <tr>
                            <td><?php echo '#'.$dossier['ID_DOSSIER']; ?></td>
                            <td><a href="<?php echo site_url('session/view/'.$dossier['ID_SESSION']); ?>"><?php echo $dossier['ID_SESSION']; ?></a></td>
                            <td>
                                <?php
                                     if($dossier['CONTRAT']==1){
                                        echo 'OUI';
                                    }else{
                                        echo 'NON';
                                    } 
                                 ?>
                                 
                             </td>
                            <td>
                                <?php
                                     if($dossier['PASSEPORT']==1){
                                        echo 'OUI';
                                    }else{
                                        echo 'NON';
                                    } 
                                 ?>
                            </td>
                            <td>
                                <?php
                                     if($dossier['BILLET']==1){
                                        echo 'OUI';
                                    }else{
                                        echo 'NON';
                                    } 
                                 ?>
                            </td>
                            <td><?php echo $dossier['REPONSE']; ?></td>
                            <td><?php echo $dossier['ETAT_DOSSIER']; ?></td>
                            <td>
                                <a href="<?php echo site_url('dossier/view/'.$dossier['ID_DOSSIER']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('dossier/edit/'.$dossier['ID_DOSSIER']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('dossier/delete/'.$dossier['ID_DOSSIER']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="4">Dossier(s) non trouvée(s)......</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>