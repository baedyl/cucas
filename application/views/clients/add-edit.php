<div class="container">
    <div class="col-xs-12">
    <?php 
        if(!empty($success_msg)){
            echo '<div class="alert alert-success">'.$success_msg.'</div>';
        }elseif(!empty($error_msg)){
            echo '<div class="alert alert-danger">'.$error_msg.'</div>';
        }
    ?>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $action; ?> clients <a href="<?php echo site_url('client/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                <?php echo form_open_multipart();?>
                
                        <div class="form-group">
                            <label for="nomClient">Nom Client</label>
                            <input type="text" class="form-control" name="nomClient" placeholder="Entrer Nom Client" value="<?php echo !empty($client['NOM_CLIENT'])?$client['NOM_CLIENT']:''; ?>">
                            <?php echo form_error('nomClient','<p class="help-block text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nat">Nationalite</label>
                            <input type="text" name="nat" class="form-control" placeholder="Entrer Nationalite" value="<?php echo !empty($client['NATIONALITE'])?$client['NATIONALITE']:''; ?>">
                            <?php echo form_error('nat','<p class="text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="lnaissance">Lieu de naissance</label>
                            <input type="text" name="lnaissance" class="form-control" placeholder="Entrer lieu de naissance" value="<?php echo !empty($client['LIEU_NAISSANCE'])?$client['LIEU_NAISSANCE']:''; ?>">
                            <?php echo form_error('lnaissance','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="naissance">Date Naissance</label>
                            <input type="date" class="form-control" name="naissance" value="<?php echo !empty($client['DATE_NAISSANCE'])?$client['DATE_NAISSANCE']:''; ?>">
                            <?php echo form_error('naissance','<p class="help-block text-danger">','</p>'); ?>
                        </div>

                         <div class="form-group">
                            <label for="cin">CIN</label>
                            <input type="text" name="cin" class="form-control" placeholder="Entrer CIN" value="<?php echo !empty($client['CIN_CLIENT'])?$client['CIN_CLIENT']:''; ?>">
                            <?php echo form_error('cin','<p class="text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="tel">NUM Tel</label>
                            <input type="text" name="tel" class="form-control" placeholder="Entrer NUM" value="<?php echo !empty($client['NUM_TEL'])?$client['NUM_TEL']:''; ?>">
                            <?php echo form_error('tel','<p class="text-danger">','</p>'); ?>
                        </div>

                         <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Entrer email" value="<?php echo !empty($client['EMAIL'])?$client['EMAIL']:''; ?>">
                            <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="adr">ADRESSE</label>
                            <input type="text" name="adr" class="form-control" placeholder="Entrer adresse" value="<?php echo !empty($client['ADR_CLIENT'])?$client['ADR_CLIENT']:''; ?>">
                            <?php echo form_error('adr','<p class="text-danger">','</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="niv">Niveau d'étude</label>
                            <input type="text" name="niv" class="form-control" placeholder="Entrer niveau etude" value="<?php echo !empty($client['NIVEAU_ETUDE'])?$client['NIVEAU_ETUDE']:''; ?>">
                            <?php echo form_error('niv','<p class="text-danger">','</p>'); ?>
                        </div>                  
                        <div class="form-group">
                            <label for="dmn">Domaine d'étude</label>
                            <input type="text" name="dmn" class="form-control" placeholder="Entrer domaine etude" value="<?php echo !empty($client['DOMAINE_ETUDE'])?$client['DOMAINE_ETUDE']:''; ?>">
                            <?php echo form_error('dmn','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="det">Dernière etablissement</label>
                            <input type="text" name="det" class="form-control" placeholder="Entrer niveau etude" value="<?php echo !empty($client['DERNIER_ETABLISEMENT'])?$client['DERNIER_ETABLISEMENT']:''; ?>">
                            <?php echo form_error('det','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="crt">Certificat d'Anglais</label>
                            <input type="text" name="crt" class="form-control" placeholder="Entrer Certificat Anglais" value="<?php echo !empty($client['CERTIF_ANGLAIS'])?$client['CERTIF_ANGLAIS']:''; ?>">
                            <?php echo form_error('crt','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="prg">Programme </label>
                            <input type="text" name="prg" class="form-control" placeholder="Entrer Programme " value="<?php echo !empty($client['PROGRAM'])?$client['PROGRAM']:''; ?>">
                            <?php echo form_error('prg','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="cmt">Commentaire</label>
                            <input type="text" name="cmt" class="form-control" placeholder="Entrer Commentaire " value="<?php echo !empty($client['COMMENTAIRE'])?$client['COMMENTAIRE']:''; ?>">
                            <?php echo form_error('cmt','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pere">Nom du père</label>
                            <input type="text" name="pere" class="form-control" placeholder="Entrer nom du pere " value="<?php echo !empty($client['NOM_PERE'])?$client['NOM_PERE']:''; ?>">
                            <?php echo form_error('pere','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="fctp">Fonction du père</label>
                            <input type="text" name="fctp" class="form-control" placeholder="Entrer fonction du pere " value="<?php echo !empty($client['FCT_PERE'])?$client['FCT_PERE']:''; ?>">
                            <?php echo form_error('fctp','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="telp">Tel du père</label>
                            <input type="text" name="telp" class="form-control" placeholder="Entrer tel du pere " value="<?php echo !empty($client['TEL_PERE'])?$client['TEL_PERE']:''; ?>">
                            <?php echo form_error('telp','<p class="text-danger">','</p>'); ?>
                        </div>
                         <div class="form-group">
                            <label for="mere">Nom du mère</label>
                            <input type="text" name="mere" class="form-control" placeholder="Entrer nom du mere " value="<?php echo !empty($client['NOM_MERE'])?$client['NOM_MERE']:''; ?>">
                            <?php echo form_error('mere','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="fctm">Fonction du mère</label>
                            <input type="text" name="fctm" class="form-control" placeholder="Entrer fonction du mère" value="<?php echo !empty($client['FCT_MERE'])?$client['FCT_MERE']:''; ?>">
                            <?php echo form_error('fctm','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="telm">Tel du mère</label>
                            <input type="text" name="telm" class="form-control" placeholder="Entrer tel du mere" value="<?php echo !empty($client['TEL_MERE'])?$client['TEL_MERE']:''; ?>">
                            <?php echo form_error('telm','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="Image">Image</label>
                            <input type="file" name="Image" size="20" class="form-control" />
                            <input type="text" name="oldimg" disable hidden value="<?php echo !empty($client['IMAGE'])?$client['IMAGE']:''; ?>"/>
                            <?php echo form_error('image file','<p class="text-danger">','</p>'); ?>
                        </div>

                        
                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>