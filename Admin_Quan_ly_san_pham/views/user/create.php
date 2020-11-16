<?php
?>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New User</h4>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo isset($_POST['username'])?$_POST['username']:''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo isset($_POST['password'])?$_POST['password']:''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Confirm Password</label>
                        <input type="text" name="password_confirm" class="form-control" id="password_confirm" placeholder="Confirm Password" value="">
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="<?php echo isset($_POST['first_name'])?$_POST['first_name']:''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="<?php echo isset($_POST['last_name'])?$_POST['last_name']:''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone" value="<?php echo isset($_POST['phone'])?$_POST['phone']:''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo isset($_POST['email'])?$_POST['email']:''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?php echo isset($_POST['address'])?$_POST['address']:''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" class="form-control" id="avatar" />
                        <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" name="position" class="form-control" id="position" value="<?php echo isset($_POST['position'])?$_POST['position']:''; ?>"/>
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
                    <input type="submit" class="btn btn-primary mr-2" name="submit" value="Save"/>
                    <a href="index.php?controller=user&action=index" class="btn btn-default">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
