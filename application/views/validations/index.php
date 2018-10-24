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
                <div class="panel-heading">Validation <a href="<?php echo site_url('validation/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">ID Validation</th>
                            <th width="5%">ID Client</th>
                            <th width="10%">ID Personnel</th>
                            <th width="20%">Message</th>  
                            <th width="15%">Date</th>
                            <th width="15%">Valide</th>
                            
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php if(!empty($validations)): foreach($validations as $val): ?>
                        <tr>
                            <td><?php echo '#'.$val['ID_VALIDATION']; ?></td>
                            <td><a href="<?php echo site_url('client/view/'.$val['ID_CLIENT']); ?>"><?php echo $val['ID_CLIENT']; ?></a></td>
                            <td><a href="<?php echo site_url('personnel/view/'.$val['ID_PERSONNEL']); ?>"><?php echo $val['ID_PERSONNEL']; ?></a></td>
                            <td><?php echo $val['MESSAGE']; ?></td>
                            <td><?php echo $val['DATE']; ?></td>
                            <td>
                                <?php
                                     if($val['VALIDE'] == 1){
                                        echo 'OUI';
                                    }else{
                                        echo 'NON';
                                    } 
                                 ?>
                                 
                             </td>
                            
                            <td>
                                <a href="<?php echo site_url('validation/view/'.$val['ID_VALIDATION']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('validation/edit/'.$val['ID_VALIDATION']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('validation/delete/'.$val['ID_VALIDATION']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="4">Validation(s) non trouvée(s)......</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>