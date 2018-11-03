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
                <form class="navbar-form" action="<?php  echo site_url('paiement/searchbyetat'); ?>" method = "post">

                <table>
                    <tr>
                        <td>
                   <font size="4" color="blue">Recherche par état : </font>
                   </td>
                   <td>
        <div class="input-group" style="margin-left:10px;">
            <select class="form-control" name = "keyword"> 
                <option  value='reglé'>reglé</option>
                <option value='non reglé'>non reglé</option>"
                <option value='en cours'>en cours</option>";
        </select>

        <div class="input-group-btn">
            <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit">
    </div>
</td>
</tr>
</table>
    </div>
</form>
                <div class="panel-heading">Paiement <a href="<?php echo site_url('paiement/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">ID Paiement</th>
                            <th width="5%">Session</th>
                            <th width="10%">Montant</th>
                            <th width="10%">A payé</th>  
                            <th width="10%">Methode</th>
                            <th width="10%">Etat</th>
                            <th width="10%">date</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php if(!empty($paiements)): foreach($paiements as $paiement): ?>
                        <tr>
                            <td><?php echo '#'.$paiement['ID_PAIEMENT']; ?></td>
                            <td><a href="<?php echo site_url('session/view/'.$paiement['ID_SESSION']); ?>"> 
                                <?php foreach($sessions as $session): 
                                    
                                if($paiement['ID_SESSION'] == $session['ID_SESSION']){
                                    echo $session['ETAT_SESSION'];
                                }
                                    
                                ?>
                                <?php endforeach; ?></a></td>
                            <td><?php echo $paiement['MONTANT_PAIEM']; ?></td>
                            <td><?php echo $paiement['A_PAYE']; ?></td>
                            <td><?php echo $paiement['METHOD_PAIEMENT']; ?></td>
                            <td><?php echo $paiement['ETAT_PAIEMENT']; ?></td>
                            <td><?php echo $paiement['DATE_PAIEMENT']; ?></td>
                            <td>
                                <a href="<?php echo site_url('paiement/view/'.$paiement['ID_PAIEMENT']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('paiement/edit/'.$paiement['ID_PAIEMENT']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('paiement/delete/'.$paiement['ID_PAIEMENT']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="4">paiement(s) non trouvée(s)......</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>