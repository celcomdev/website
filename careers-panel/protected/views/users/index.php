<div class="portlet mt-4" id="yw0">
    <div class="portlet-decoration">
        <div class="portlet-title" style="width: 100%;">
            <div class="row">
                <div class="col-md-8">
                    <h4>Users</h4>
                </div>
                <div class="col-md-4" style="display: flex; justify-content: end;">
                <?php echo CHtml::link('Add New +', array('form'), array('class'=>'btn btn-primary ui-button')) ?>
                </div>
            </div>
            
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="portlet-content">
        <div id="location-grid" class="grid-view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $key => $user) { ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->phone; ?></td>
                        <td><?php echo $user->username; ?></td>
                        <td>
                        <?php 
                            echo CHtml::link('Edit', array('edit', 
                                'id' => $user->id), 
                                array('class'=>'btn btn-xs btn-primary ui-button')
                            ) 
                        ?>
                        <button class="btn btn-xs btn-danger ui-button">Disable</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
