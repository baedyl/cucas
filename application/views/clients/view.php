<style>
    .sidenav {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 1;
    top: 0;
    right: 100;
    background-color: #333;
    overflow-x: hidden;
    padding-top: 20px;
    
    }

    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }

</style>
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Details Client<a href="<?php echo site_url('client/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="sidenav">
                    <a href="<?php echo site_url('session/index/'.$client['ID_CLIENT']); ?>" class="" >Session</a>
                    <a href="<?php echo site_url('traduction/index/'.$client['ID_CLIENT']); ?>" class="" >Traduction</a>
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
                    <label>Date Naissance:</label>
                    <p><?php echo !empty($client['DATE_NAISSANCE'])?$client['DATE_NAISSANCE']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Image:</label>
                    <img id="myImg" src="<?php echo base_url("public/img/").$client['IMAGE'] ?>" alt="<?php $client['NOM_CLIENT'] ?>" width="300" height="200" >
                </div>
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
