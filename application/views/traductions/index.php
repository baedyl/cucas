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
                <form class="navbar-form" action="<?php  echo site_url('traduction/searchbyetat'); ?>" method = "post">
    <table>
        <tr>
            <td>
                <font size="4" color="blue">Recherche par état : </font>
            </td>
                 
            <td>
    <div class="input-group" style="margin-left:10px;">
        <select class="form-control" name = "keyword">
            <option  value='payé'>payé</option>
            <option value='non payé'>non payé</option>;
        </select>
        <div class="input-group-btn">
            <input type="submit" name="postSubmit" class="btn btn-primary" value="Rechercher">

        </div>
         </td>
        </tr>
                </table>
    </div>
</form>
                <div class="panel-heading">Traduction <a href="<?php echo site_url('traduction/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">ID Traduction</th>
                            <th width="5%">Client</th>
                            <th width="5%">User</th>
                            <th width="10%">Manuscrit traduit</th>
                            <th width="10%">Montant</th>  
                            <th width="10%">Paiement</th>
                            <th width="10%">Etat</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php if(!empty($traductions)): foreach($traductions as $traduction): ?>
                        <tr>
                            <td><?php echo '#'.$traduction['ID_TRADUCTION']; ?></td>
                            <td><a href="<?php echo site_url('client/view/'.$traduction['ID_CLIENT']); ?>">   
                                <?php foreach($clients as $client): 
                                    
                                if($traduction['ID_CLIENT'] == $client['ID_CLIENT']){
                                    echo $client['NOM_CLIENT'];
                                }
                                    
                                ?>
                                <?php endforeach; ?>
                                    
                                </a></td>
                            <td><a href="<?php echo site_url('auth/view/'.$traduction['ID_USER']); ?>">
                             <?php foreach($users as $user): 
                                    
                                if($traduction['ID_USER'] == $user['id']){
                                    echo $user['last_name'];
                                }
                                    
                                ?>
                                <?php endforeach; ?></a></td>
                            <td><?php echo $traduction['TYPE_MANUS']; ?></td>
                            <td><?php echo $traduction['MONTANT']; ?></td>
                            <td><?php echo $traduction['PAIEMENT']; ?></td>
                            <td><?php echo $traduction['ETAT_TRAD']; ?></td>
                            <td>
                                <a href="<?php echo site_url('traduction/view/'.$traduction['ID_TRADUCTION']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('traduction/edit/'.$traduction['ID_TRADUCTION']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('traduction/delete/'.$traduction['ID_TRADUCTION']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="4">traduction(s) non trouvée(s)......</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>