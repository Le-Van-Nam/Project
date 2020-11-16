<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                    <a href="index.php?controller=category&action=create"><i class="mdi mdi-plus text-muted"></i></a>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Category List</p>
                <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category name</th>
                            <th>Avatar</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created_at</th>
                            <th>Update_at</th>
                            <th></th>
                        </tr>
                        </thead>
                        <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $values): ?>
                        <tbody>
                        <tr>
                            <td><?php echo $values['id']; ?></td>
                            <td><?php echo $values['name']; ?></td>
                            <td>
                                <?php if (!empty($values['avatar'])): ?>
                                    <img src="assets/upload/<?php echo $values['avatar'] ?>" width="60"/>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $values['description']; ?></td>
                            <td>
                                <?php
                                $status='Active';
                                if($values['status']==0){
                                    $status='Disabled';
                                }
                                echo $status;
                                ?>
                            </td>
                            <td><?php echo date('d-m-y H:i:s',strtotime($values['created_at']));?></td>
                            <td>
                                <?php
                                if (!empty($values['updated_at'])) {
                                echo date('d-m-Y H:i:s', strtotime($values['updated_at']));
                                }
                                ?>
                            </td>
                            <td>
                                <a href="index.php?controller=category&action=detail&id=<?php echo $values['id'] ?>"
                                   title="Chi tiết"><i class="mdi mdi-eye"></i></a>
                                <a href="index.php?controller=category&action=update&id=<?php echo $values['id'] ?>" title="Sửa">
                                    <i class="mdi mdi-auto-fix"></i>
                                </a>
                                <a href="index.php?controller=category&action=delete&id=<?php echo $values['id'] ?>" title="Xóa"
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                                    <i class="mdi mdi-delete-forever"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td>Not Data Found</td>

                        <?php endif;?>
                            </tbody>
                    </table>
                </div>
                <?php echo $pages; ?>
            </div>
        </div>
    </div>
</div>