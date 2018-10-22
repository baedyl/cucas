<div class="container">
    <?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php  } ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">Affectations <a href="<?php  echo site_url('affectation/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">Nom personnel</th>
                            <th width="20%">ID Session</th>
                            <th width="15%">Date</th>
                            <th width="15%">Commentaire</th>
                            
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php  if(!empty($affectations)): foreach($affectations as $affectation): ?>
                        <tr>
                            <td><a href="<?php echo site_url('personnel/view/'.$affectation['ID_PERSONNEL']); ?>"><?php echo $affectation['ID_PERSONNEL']; ?></a></td>
                             <td><a href="<?php echo site_url('session/view/'.$affectation['ID_SESSION']); ?>"><?php echo $affectation['ID_SESSION']; ?></a></td>
                            <td><?php echo $affectation['DATE']; ?></td>
                            <td><?php echo $affectation['COMMENTAIRE']; ?></td>
                            <td>
                                <a href="<?php echo site_url('affectation/view/'.$affectation['ID_PERSONNEL']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('affectation/edit/'.$affectation['ID_PERSONNEL']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('affectation/delete/'.$affectation['ID_PERSONNEL']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="4">    Affectation(s) non trouvé......</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>