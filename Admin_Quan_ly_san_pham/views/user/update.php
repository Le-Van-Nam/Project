<?php
?>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update New User</h4>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : $user['username'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="<?php echo isset($_POST['first_name'])?$_POST['first_name']: $user['first_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="<?php echo isset($_POST['last_name'])?$_POST['last_name']:$user['last_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone" value="<?php echo isset($_POST['phone'])?$_POST['phone']:$user['phone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo isset($_POST['email'])?$_POST['email']:$user['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?php echo isset($_POST['address'])?$_POST['address']:$user['address']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" class="form-control" id="avatar" />
                        <?php if (!empty($user['avatar'])): ?>
                            <img height="80" src="assets/upload_avatar/<?php echo $user['avatar'] ?>"/>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" name="position" class="form-control" id="position" value="<?php echo isset($_POST['position'])?$_POST['position']:$users['position']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <?php
                        $selected_active = '';
                        $selected_disabled = '';
                        if (isset($_POST['status'])) {
                            switch ($_POST['status']) {
                                case 0:
                                    $selected_disabled = 'selected';
                                    break;
                                case 1:
                                    $selected_active = 'selected';
                                    break;
                            }
                        }
                        ?>
                        <select class="form-control" name="status" id="status">
                            <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>
                            <option value="1" <?php echo $selected_active ?>>Active</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary mr-2" name="submit" value="Update"/>
                    <a href="index.php?controller=user&action=index" class="btn btn-default">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
