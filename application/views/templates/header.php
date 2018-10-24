<html>
    <head>
        <meta charset="utf-8">
        <title>
            <?php echo $title; ?>
        </title>
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <?php 
        $this->load->helper('directory'); // Load directory helper
        $dir = "public/css/"; // Path to CSS folder 
        ?>
        <link rel="stylesheet" href="<?php echo base_url($dir)."style.css" ?>">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div id="navbar">
            <a class="active" href="<?php echo site_url('welcome'); ?>">Acceuil</a>
            <a href="<?php echo site_url('client'); ?>" >Clients</a>
            <a href="<?php echo site_url('personnel'); ?>" >Personnel</a>
            <a href="<?php echo site_url('session'); ?>" >Sessions</a>
            <a href="<?php echo site_url('traduction'); ?>" >Traductions</a>
            <a href="<?php echo site_url('dossier'); ?>" >Dossiers</a>
            <a href="<?php echo site_url('paiement'); ?>" >Paiements</a>
            <a href="<?php echo site_url('visa'); ?>" >Visas</a>
            <a href="<?php echo site_url('affectation'); ?>" >Affectations</a>
            <a href="<?php echo site_url('auth'); ?>" >Users</a>
            <a href="<?php echo site_url('validation'); ?>" >Validations</a>
            <a class="droite" href="<?php echo site_url('auth/logout'); ?>">Logout</a>
        </div>
        <script>
        window.onscroll = function() {myFunction()};

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
        }
        </script>
        
    
