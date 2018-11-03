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
            <form class="navbar-form" action="<?php  echo site_url('affectation/searchbydate'); ?>" method = "post">
    <div class="input-group">
    <table>
    <tr>
        <td>
            <input type="text" class="form-control" placeholder="Rechercher par date" name = "keyword" size="15px; ">
            <div class="input-group-btn">
                <input type="submit" name="postSubmit" class="btn btn-primary" value="Rechercher">
            </div>
        </td>
        <td>
            <a style="margin-left:50px;" href="<?php echo site_url('affectation/createcsv') ?>" class="btn btn-primary"> Exporter fichier Excel </a>
        </td>
    </tr>
    </table>
    </div>
</form>
         <div class="panel-heading">Affectations 
            <a href="<?php  echo site_url('affectation/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a>
         </div>
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">User</th>
                            <th width="20%">Session</th>
                            <th width="15%">Date</th>
                            <th width="15%">Commentaire</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php  if(!empty($affectations)): foreach($affectations as $affectation):  ?>
                        <tr>
                            <td><a href="<?php echo site_url('auth/view/'.$affectation['ID_USER']); ?>"> 
                                <?php foreach($users as $user): 
                                    
                                if($affectation['ID_USER'] == $user['id']){
                                    echo $user['last_name'];
                                }
                                    
                                ?>
                                <?php endforeach; ?></a></td>
                             <td><a href="<?php echo site_url('session/view/'.$affectation['ID_SESSION']); ?>"> 
                                <?php foreach($sessions as $session): 
                                    
                                if($affectation['ID_SESSION'] == $session['ID_SESSION']){
                                    echo $session['ETAT_SESSION'];
                                }
                                    
                                ?>
                                <?php endforeach; ?></a></td>
                            <td><?php echo $affectation['DATE']; ?></td>
                            <td><?php echo $affectation['COMMENTAIRE']; ?></td>
                            <td>
                            <!--<a href="<?php echo site_url('affectation/view/'.$affectation['ID_SESSION'].'/'.$affectation['ID_PERSONNEL'].'/'.$affectation['DATE']); ?>" class="glyphicon glyphicon-eye-open"></a>-->
                        
                              <a href="
                                <?php 
                                    $dte = $affectation['DATE'];
                                    
                                    echo site_url('affectation/view/'.$affectation['ID_SESSION'].'/'.$affectation['ID_USER'].'/'.$dte); 
                                ?>
                                " class="glyphicon glyphicon-eye-open">
                                </a>
                            <a href="<?php echo site_url('affectation/edit/'.$affectation['ID_SESSION'].'/'.$affectation['ID_USER'].'/'.$affectation['DATE']); ?>" class="glyphicon glyphicon-edit"></a>
                            <a href="<?php echo site_url('affectation/delete/'.$affectation['ID_SESSION'].'/'.$affectation['ID_USER'].'/'.$affectation['DATE']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
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