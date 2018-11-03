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
               <div class="panel-heading"><h1><?php echo lang('create_user_heading');?><a href="<?php echo site_url('auth/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></h1>
                
               </div>
               <div class="panel-body">


              <p><?php echo lang('create_user_subheading');?></p>

              <div id="infoMessage"><?php echo $message;?></div>

              <?php echo form_open("auth/create_user");?>

                    <p>
                          <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                          <?php echo form_input($first_name);?>
                    </p>

                    <p>
                          <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                          <?php echo form_input($last_name);?>
                    </p>
                    
                    <?php
                    if($identity_column!=='email') {
                        echo '<p>';
                        echo lang('create_user_identity_label', 'identity');
                        echo '<br />';
                        echo form_error('identity');
                        echo form_input($identity);
                        echo '</p>';
                    }
                    ?>

                    <p>
                          <?php echo lang('create_user_company_label', 'company');?> <br />
                          <?php echo form_input($company);?>
                    </p>

                    <p>
                          <?php echo lang('create_user_email_label', 'email');?> <br />
                          <?php echo form_input($email);?>
                    </p>

                    <p>
                          <?php echo lang('create_user_phone_label', 'phone');?> <br />
                          <?php echo form_input($phone);?>
                    </p>

                    <p>
                          <?php echo lang('create_user_password_label', 'password');?> <br />
                          <?php echo form_input($password);?>
                    </p>

                    <p>
                          <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                          <?php echo form_input($password_confirm);?>
                    </p>


                    <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>
              </div>
            </div>
          </div>
        </div>

    <?php echo form_close();?>
