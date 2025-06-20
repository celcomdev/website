<div class="portlet mt-4" id="yw0">
    <div class="portlet-decoration">
        <div class="portlet-title" style="width: 100%;">
            <h4>Update User</h4>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="portlet-content">
        <div id="location-grid" class="grid-view p-2">
            <form method="POST" action='<?php echo Yii::app()->baseUrl."/index.php?r=users/update&id={$data->id}";  ?>' class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="grid-name">Name</label>
                        <input name="name" id="grid-name" value="<?php echo $data->name; ?>" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="grid-email">Email</label>
                        <input name="email" value="<?php echo $data->email; ?>" id="grid-email" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="grid-username">Username</label>
                        <input name="username" value="<?php echo $data->username; ?>" id="grid-username" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="grid-phone">Phone</label>
                        <input name="phone" id="grid-phone" value="<?php echo $data->phone; ?>" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="grid-password">Password</label>
                        <input name="password" required id="grid-password" class="form-control" type="password">
                    </div>
                </div>
                <div class="col-md-12">
                    <?php if(isset($errors) && count($errors)) { ?>
                    <ul>
                        <?php foreach($errors as $error) { ?>
                        <ol><?php echo $error; ?></ol>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <div class="col-md-12 text-right mt-4">
                    <?php echo CHtml::link('Back', array('/users'), array('class' => 'btn btn-secondary ui-button')) ?>
                    <button type="submit" class="btn btn-primary ui-button"> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
