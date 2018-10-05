<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Personnel Details <a href="<?php echo site_url('personnel/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>nom:</label>
                    <p><?php echo !empty($personnel['nom'])?$personnel['nom']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>email:</label>
                    <p><?php echo !empty($personnel['email'])?$personnel['email']:''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>