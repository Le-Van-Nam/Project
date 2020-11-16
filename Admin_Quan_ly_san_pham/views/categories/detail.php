<?php
?>
<div class="row">
<div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail id = <?php echo $category['id']; ?></h4>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <td><?php echo $category['id']; ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?php echo $category['name']; ?></td>
                    </tr>
                    <tr>
                        <th>Avatar</th>
                        <td>
                            <?php if (!empty($category['avatar'])): ?>
                                <img src="assets/upload/<?php echo $category['avatar'] ?>" width="60"/>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><?php echo $category['description']; ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <?php
                            $status = 'Active';
                            if ($category['status'] == 0) {
                                $status_text = 'Disabled';
                            }
                            echo $status;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Created_at</th>
                        <td>
                            <?php echo date('d-m-Y H:i:s', strtotime($category['created_at'])); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Updated_at</th>
                        <td>
                            <?php echo date('d-m-Y H:i:s', strtotime($category['updated_at'])); ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<a class="btn btn-primary" href="index.php?controller=category&action=index">Back</a>
