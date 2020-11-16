<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Category</h4>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Category name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="category-avatar">File upload</label>
                        <input type="file" name="avatar" class="form-control" id="category-avatar" />
                        <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
                    </div>
                    <div class="form-group">
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
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                        <option value="0" <?php echo $selected_disabled;?> >Active</option>
                        <option value="1" <?php echo $selected_active;?> >Disabled</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary mr-2" name="submit" value="Save"/>
                    <input type="reset" class="btn btn-light" name="submit" value="Reset"/>
                </form>
            </div>
        </div>
    </div>
</div>