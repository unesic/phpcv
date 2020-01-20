<div class="row py-5">
    <div class="col col-md-12 p-3 card shadow">
        <table class="table table-borderless table-striped mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Phone</th>
                    <th>E-mail</th>
                    <th>Country</th>
                    <th>City</th>
                    <th></th>
                </tr>
            </thead>
            
            <tbody>
            
                <?php foreach ($profiles as $profile): ?>
                    <tr>
                        <td><?php echo $profile['name']             ?></td>
                        <td><?php echo $profile['title']            ?></td>
                        <td><?php echo $profile['phone_number']     ?></td>
                        <td><?php echo $profile['email']            ?></td>
                        <td><?php echo $profile['country']          ?></td>
                        <td><?php echo $profile['city']             ?></td>
                        
                        <td>
                            <a href="<?php echo PATH . '/p/?pid=' . $profile['id'] . '&view=1'; ?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="<?php echo PATH . '/p/?pid=' . $profile['id'] . '&edit=1'; ?>">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="<?php echo PATH . '/p/?pid=' . $profile['id'] . '&remove=1'; ?>">
                                <i class="fa fa-remove"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            
            </tbody>
        </table>
    </div>
</div>
