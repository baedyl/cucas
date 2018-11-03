

<div class="container">

    <div class="row">
   
        <div class="panel panel-default">
            <div class="panel-heading">Details Client<a href="<?php echo site_url('client/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
        <div class="split left">
            <div class="panel-body">
                 <div class="form-group">
                    <label>Image:</label>
                    <img id="myImg" src="<?php echo base_url("public/img/").$client['IMAGE'] ?>" alt="<?php $client['NOM_CLIENT'] ?>" width="300" height="200" >
                </div>
                <div class="form-group">
                    <label>Nom Client:</label>
                    <p><?php echo !empty($client['NOM_CLIENT'])?$client['NOM_CLIENT']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Nationalite:</label>
                    <p><?php echo !empty($client['NATIONALITE'])?$client['NATIONALITE']:''; ?></p>
                </div>
                 <div class="form-group">
                    <label>Lieu Naissance:</label>
                    <p><?php echo !empty($client['LIEU_NAISSANCE'])?$client['LIEU_NAISSANCE']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Date Naissance:</label>
                    <p><?php echo !empty($client['DATE_NAISSANCE'])?$client['DATE_NAISSANCE']:''; ?></p>
                </div>
                 <div class="form-group">
                    <label>CIN:</label>
                    <p><?php echo !empty($client['CIN_CLIENT'])?$client['CIN_CLIENT']:''; ?></p>
                </div>
                 <div class="form-group">
                    <label>NUM TEL:</label>
                    <p><?php echo !empty($client['NUM_TEL'])?$client['NUM_TEL']:''; ?></p>
                </div>
                 <div class="form-group">
                    <label>Email:</label>
                    <p><?php echo !empty($client['EMAIL'])?$client['EMAIL']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Adresse:</label>
                    <p><?php echo !empty($client['ADR_CLIENT'])?$client['ADR_CLIENT']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Niveau d'etude:</label>
                    <p><?php echo !empty($client['NIVEAU_ETUDE'])?$client['NIVEAU_ETUDE']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Domaine d'etude:</label>
                    <p><?php echo !empty($client['DOMAINE_ETUDE'])?$client['DOMAINE_ETUDE']:''; ?></p>
                </div>
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <span class="close">×</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
            </div>
            <div class="panel-body">
                   <div class="split right">
                <div class="form-group">
                    <label>Derniere Etablissement:</label>
                    <p><?php echo !empty($client['DERNIER_ETABLISEMENT'])?$client['DERNIER_ETABLISEMENT']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Certificat anglais:</label>
                    <p><?php echo !empty($client['CERTIF_ANGLAIS'])?$client['CERTIF_ANGLAIS']:''; ?></p>
                </div>
                 <div class="form-group">
                    <label>Programme:</label>
                    <p><?php echo !empty($client['PROGRAM'])?$client['PROGRAM']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Commentaire:</label>
                    <p><?php echo !empty($client['COMMENTAIRE'])?$client['COMMENTAIRE']:''; ?></p>
                </div>
                 <div class="form-group">
                    <label>Nom du pere:</label>
                    <p><?php echo !empty($client['NOM_PERE'])?$client['NOM_PERE']:''; ?></p>
                </div>
                 <div class="form-group">
                    <label>Fonction du Pere:</label>
                    <p><?php echo !empty($client['FCT_PERE'])?$client['FCT_PERE']:''; ?></p>
                </div>
                 <div class="form-group">
                    <label>Tel du pere:</label>
                    <p><?php echo !empty($client['TEL_PERE'])?$client['TEL_PERE']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Nom du mere:</label>
                    <p><?php echo !empty($client['NOM_MERE'])?$client['NOM_MERE']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Fonction du mere:</label>
                    <p><?php echo !empty($client['FCT_MERE'])?$client['FCT_MERE']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Tel du mere:</label>
                    <p><?php echo !empty($client['TEL_MERE'])?$client['TEL_MERE']:''; ?></p>
                </div>
                 <a href="<?php echo site_url('session/index/'.$client['ID_CLIENT']); ?>">Sessions</a>
                    <a href="<?php echo site_url('traduction/index/'.$client['ID_CLIENT']); ?>">Traductions</a>
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <span class="close">×</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
            </div>
        </div>
        </div>
    </div>

</div>
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }
</script>
