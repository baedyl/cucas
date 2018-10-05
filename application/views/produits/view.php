<div class="container">

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Details Produit<a href="<?php echo site_url('produit/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>name Produit:</label>
                    <p><?php echo !empty($produit['name'])?$produit['name']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Price:</label>
                    <p><?php echo !empty($produit['price'])?$produit['price']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Qte:</label>
                    <p><?php echo !empty($produit['quantite'])?$produit['quantite']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Image:</label>
                    <img id="myImg" src="<?php echo base_url("public/img/").$produit['image'] ?>" alt="<?php $produit['name'] ?>" width="300" height="200" >
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
