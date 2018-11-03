
<?php echo form_open("auth/login");?>

<div class="container">
  <h1><?php echo lang('login_heading');?></h1>
  <p><?php echo lang('login_subheading');?></p>

  <div id="infoMessage"><?php echo $message;?></div>
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default ">
        <table class="table table-striped">
          <thead>
          </thead>
          <tbody>
            <tr>
              <td><?php echo lang('login_identity_label', 'identity');?></td>
              <td><?php echo form_input($identity);?></td>
            </tr>
            <tr>
              <td><?php echo lang('login_password_label', 'password');?></td>
              <td><?php echo form_input($password);?></td>
            </tr>
            <tr>
              <td><?php echo lang('login_remember_label', 'remember');?></td>
              <td><?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?></td>
            </tr>
            <tr>
              <td><input type="submit" name="login_submit_btn" class="btn btn-primary" value="Login">
                

               
              <td><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php echo form_close();?>

