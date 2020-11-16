<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New Product</h4>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category_id">Choose Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <?php
                            foreach($categories As $category):
                                $selected='';
                                if(isset($_POST['category_id'])&& $category['id']==$_POST['category_id']){
                                    $selected='selected';
                            }
                            ?>
                            <option value="<?php echo $category['id']; ?>" <?php echo $selected;?>><?php echo $category['name'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Name Product</label>
                        <input type="text" name="title" class="form-control" id="name" placeholder="Name product" value="<?php echo isset($_POST['title'])?$_POST['title']:''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="product-avatar">File upload</label>
                        <input type="file" name="avatar" class="form-control" id="product-avatar" />
                        <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" id="price" value="<?php echo isset($_POST['price'])?$_POST['price']:''; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" class="form-control" id="amount" value="<?php echo isset($_POST['amount'])?$_POST['amount']:''; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="summary">Description</label>
                        <textarea name="summary" id="summary" class="form-control" rows="4"><?php echo isset($_POST['summary'])?$_POST['summary']:''; ?></textarea>
                    </div>
            <div class="form-group">
                <label for="description"> Detail Description</label>
                <textarea name="content" id="description" class="form-control" rows="4"><?php echo isset($_POST['content'])?$_POST['content']:''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="seo_title">Seo Title</label>
                <input type="text" name="seo_title" class="form-control" id="seo_title" placeholder="Seo Title" value="<?php echo isset($_POST['seo_title'])?$_POST['seo_title']:''; ?>">
            </div>
            <div class="form-group">
                <label for="seo_description">Seo Description</label>
                <input type="text" name="seo_description" class="form-control" id="seo_description" placeholder="Seo Description" value="<?php echo isset($_POST['seo_description'])?$_POST['seo_description']:''; ?>">
            </div>
            <div class="form-group">
                <label for="seo_keywords">Seo Keyword</label>
                <input type="text" name="seo_keywords" class="form-control" id="seo_keywords" placeholder="Seo Keyword" value="<?php echo isset($_POST['seo_keywords'])?$_POST['seo_keywords']:''; ?>">
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
                    <input type="reset" class="btn btn-light" name="submit" value="Reset"/>
                </form>
            </div>
        </div>
    </div>
</div>