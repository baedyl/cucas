<?php 
        $this->load->helper('directory'); // Load directory helper
        $dir = "public/css/"; /* Path to CSS folder */
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            <?php echo $title; ?>
        </title>    
        
        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="<?php echo base_url($dir)."style.css" ?>">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        

        <div id="navbar" class="sticky">
            <a href="<?php echo site_url('welcome'); ?>">Acceuil</a>
            <a class="<?php if("Clients" == $title) echo "active"; ?>" href="<?php echo site_url('client'); ?>" >Clients</a>
            <!--<a class="<?php if("Personnel" == $title) echo "active"; ?>" href="<?php echo site_url('personnel'); ?>" >Personnel</a>-->
            <a class="<?php if("Sessions" == $title) echo "active"; ?>" href="<?php echo site_url('session'); ?>" >Sessions</a>
            <a class="<?php if("Traductions" == $title) echo "active"; ?>" href="<?php echo site_url('traduction'); ?>" >Traductions</a>
            <a class="<?php if("Dossiers" == $title) echo "active"; ?>" href="<?php echo site_url('dossier'); ?>" >Dossiers</a>
            <a class="<?php if("Paiements" == $title) echo "active"; ?>" href="<?php echo site_url('paiement'); ?>" >Paiements</a>
            <a class="<?php if("Visas" == $title) echo "active"; ?>" href="<?php echo site_url('visa'); ?>" >Visas</a>
            <a class="<?php if("Affectations" == $title) echo "active"; ?>" href="<?php echo site_url('affectation'); ?>" >Affectations</a>
            <a class="<?php if("Users" == $title) echo "active"; ?>" href="<?php echo site_url('auth'); ?>" >Users</a>
            <a class="<?php if("Validations" == $title) echo "active"; ?>" href="<?php echo site_url('validation'); ?>" >Validations</a>
            <a href="<?php echo site_url('admin'); ?>" >Admin</a>
            <a class="droite" href="<?php echo site_url('auth/logout'); ?>"><i class=" fa fa-fw fa-sign-out"></i>Logout</a>
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

        
    
