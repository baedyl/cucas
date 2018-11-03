<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Details User<a href="<?php echo site_url('auth/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Id User:</label>
                    <p><?php echo !empty($user['id'])?$user['id']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>IP Adress:</label>
                    <p><?php echo !empty($user['ip_address'])?$user['ip_address']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Username:</label>
                    <p><?php echo !empty($user['username'])?$user['username']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <p><?php echo !empty($user['email'])?$user['email']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Phone:</label>
                    <p><?php echo !empty($user['phone'])?$user['phone']:''; ?></p>
                </div>
                   <a href="<?php echo site_url('affectation/index/'.$user['id']); ?>">Affectation</a>
                   
            </div>
        </div>
    </div>
</div>
</div>