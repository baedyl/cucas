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
                  <form class="navbar-form" action="<?php  echo site_url('session/searchbyfin'); ?>" method = "post">
    <table>
        <tr>
            <td>
                <div class="input-group">
                    <font size="4" color="blue">Recherche par Type Session : </font>              
                    
                </div>

            </td>
            <td>
                <select class="form-control" name = "keywordt" style="width:200px;">
                    <option  selected value=''></option>
                    <option  value='AUTUMN'>AUTUMN</option>
                    <option value='WINTER'>WINTER</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                 <font size="4" color="blue">Recherche par Type Financement : </font>
            </td>
            <td>
                <select class="form-control" name = "keywordf" style="width:200px;">
                    <option  selected value=''></option>
                    <option  value='self-sponsored'>self-sponsored</option>
                    <option value='scolarship'>scolarship</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <div class="input-group-btn">
                    <input type="submit" name="postSubmit" class="btn btn-primary" value="Rechercher">
                </div>
            </td>
        </tr>
    </table>
    
</form>
                <div class="panel-heading">Session <a href="<?php echo site_url('session/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">ID Session</th>
                            <th width="5%">Client</th>
                            <th width="10%">Type Session</th>
                            <th width="15%">Debut</th>
                            <th width="15%">Fin</th>
                            <th width="15%">Partenaire</th>
                            <th width="15%">Fincancement</th>
                            <th width="10%">Etat</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php if(!empty($sessions)): foreach($sessions as $session): ?>
                        <tr>
                            <td><?php echo '#'.$session['ID_SESSION']; ?></td>
                            <td><a href="<?php echo site_url('client/view/'.$session['ID_CLIENT']); ?>">  
                                <?php foreach($clients as $client): 
                                    
                                if($session['ID_CLIENT'] == $client['ID_CLIENT']){
                                    echo $client['NOM_CLIENT'];
                                }
                                    
                                ?>
                                <?php endforeach; ?></a></td>
                            <td><?php echo $session['TYPE_SESSION']; ?></td>
                            <td><?php echo $session['DATE_DEBUT']; ?></td>
                            <td><?php echo $session['DATE_CLOTURE']; ?></td>
                            <td><?php echo $session['PARTENAIRE']; ?></td>
                            <td><?php echo $session['TYPE_FINANCE']; ?></td>
                            <td><?php echo $session['ETAT_SESSION']; ?></td>
                            <td>
                                <a href="<?php echo site_url('session/view/'.$session['ID_SESSION']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('session/edit/'.$session['ID_SESSION']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('session/delete/'.$session['ID_SESSION']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="4">Session(s) non trouvée(s)......</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>