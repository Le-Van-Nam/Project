
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                    <a href="index.php?controller=user&action=create"><i class="mdi mdi-plus text-muted"></i></a>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">User</p>
                <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Avatar</th>
                            <th>Position</th>
                            <th>Created_at</th>
                            <th></th>
                        </tr>
                        </thead>
                        <?php if(!empty($users)):?>
                            <?php foreach($users As $user):?>
                                <tbody>
                                <tr>
                                    <td><?php echo $user['id']; ?></td>
                                    <td><?php echo $user['username']; ?></td>
                                    <td><?php echo $user['first_name']." ".$user['last_name']; ?></td>
                                    <td><?php echo $user['phone'];?></td>
                                    <td><?php echo $user['address'];?></td>
                                    <td><?php echo $user['email'];?></td>
                                    <td>
                                        <?php if (!empty($user['avatar'])): ?>
                                            <img height="80" src="assets/upload_avatar/<?php echo $user['avatar'] ?>"/>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $user['position'];?></td>
                                    <td><?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])); ?></td>
                                    <td>
                                        <a href="index.php?controller=user&action=detail&id=<?php echo $user['id'] ?>"
                                           title="Chi tiết"><i class="mdi mdi-eye"></i></a>
                                        <a href="index.php?controller=user&action=update&id=<?php echo $user['id'] ?>" title="Sửa">
                                            <i class="mdi mdi-auto-fix"></i>
                                        </a>
                                        <a href="index.php?controller=user&action=delete&id=<?php echo $user['id'] ?>" title="Xóa"
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                                            <i class="mdi mdi-delete-forever"></i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            <?php endforeach;?>
                        <?php else: ?>
                            <tr>
                                <td>No data found</td>
                            </tr>
                        <?php endif;?>
                    </table>
                </div>
                <?php echo $pages; ?>
            </div>
        </div>
    </div>
</div>
