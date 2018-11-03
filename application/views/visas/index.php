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
            <form class="navbar-form" action="<?php  echo site_url('visa/searchbyetat'); ?>" method = "post">
            <table>
                <tr>
                    <td>
                        <font size="4" color="blue">Recherche par état : </font>
                    </td>
                    <td>
                     <div class="input-group" style="margin-left:10px;">
                        <select class="form-control" name = "keyword">
                            <option  value='accepted'>accepted</option>
                            <option  value='delivered'>delivered</option>
                            <option  value='not confirmed'>not confirmed</option>
                            <option  value='not started'>not started</option>
                            <option value='processing'>processing</option>
                        </select>
                        <div class="input-group-btn">
                            <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit">
                        </div>
                    </td>
                </tr>
            </table>
    </div>
</form>
                <div class="panel-heading">Visa <a href="<?php echo site_url('visa/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">ID Visa</th>
                            <th width="5%">Session</th>
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
                            <td><a href="<?php echo site_url('session/view/'.$visa['ID_SESSION']); ?>"> 
                                <?php foreach($sessions as $session): 
                                    
                                if($visa['ID_SESSION'] == $session['ID_SESSION']){
                                    echo $session['ETAT_SESSION'];
                                }
                                    
                                ?>
                                <?php endforeach; ?></a></td>
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