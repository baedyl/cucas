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
                <div class="panel-heading">Personnel <a href="<?php echo site_url('personnel/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="30%">Nom Complet</th>
                            <th width="50%">Email</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php if(!empty($personnel)): foreach($personnel as $personne): ?>
                        <tr>
                            <td><?php echo '#'.$personne['id']; ?></td>
                            <td><?php echo $personne['nom']; ?></td>
                            <td><?php echo $personne['email']; ?></td>
                            <td>
                                <a href="<?php echo site_url('personnel/view/'.$personne['id']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('personnel/edit/'.$personne['id']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('personnel/delete/'.$personne['id']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="4">Personnel(s) non trouvé......</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>