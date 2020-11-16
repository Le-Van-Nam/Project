<?php
require_once 'helper/Helper.php';
?>
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail id = <?php echo $user['id']; ?></h4>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td><?php echo $user['id']; ?></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td><?php echo $user['username']; ?></td>
                        </tr>
                        <tr>
                            <th>Fullname</th>
                            <td><?php echo $user['first_name']." ".$user['last_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?php echo $user['phone']; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo $user['address']; ?></td>
                        </tr>
                        <tr>
                            <th>Avatar</th>
                            <td>
                                <?php if (!empty($user['avatar'])): ?>
                                    <img src="assets/upload_avatar/<?php echo $user['avatar'] ?>" width="60"/>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Position</th>
                            <td><?php echo $user['position']; ?></td>
                        </tr>
                        <tr>
                            <th>Last Login</th>
                            <td><?php echo !empty($user['last_login']) ? date('d-m-Y H:i:s', strtotime($user['last_login'])) : '' ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?php echo Helper::getStatusText($user['status']); ?></td>
                        </tr>
                        <tr>
                            <th>Created_at</th>
                            <td>
                                <?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Updated_at</th>
                            <td>
                                <?php echo date('d-m-Y H:i:s', strtotime($user['updated_at'])); ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-primary" href="index.php?controller=user&action=index">Back</a>
