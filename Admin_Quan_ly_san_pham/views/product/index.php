<?php
require_once 'helper/Helper.php';

?>
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
                <p class="card-title">Category List</p>
                <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category name</th>
                            <th>Title</th>
                            <th>Avatar</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Created_at</th>
                            <th>Update_at</th>
                            <th></th>
                        </tr>
                        </thead>
                        <?php if(!empty($products)):?>
                        <?php foreach($products As $product):?>
                                <tbody>
                                <tr>
                                    <td><?php echo $product['id']; ?></td>
                                    <td><?php echo $product['category_name']; ?></td>
                                    <td><?php echo $product['title']; ?></td>
                                    <td>
                                        <?php if (!empty($product['avatar'])): ?>
                                            <img height="80" src="assets/upload/<?php echo $product['avatar'] ?>"/>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo number_format($product['price']); ?></td>
                                    <td><?php echo $product['amount']; ?></td>
                                    <td><?php echo Helper::getStatusText($product['status']); ?></td>
                                    <td><?php echo date('d-m-Y H:i:s', strtotime($product['created_at'])); ?></td>
                                    <td><?php echo !empty($product['updated_at']) ? date('d-m-Y H:i:s', strtotime($product['updated_at'])) : '--' ?></td>
                                    <td>
                                        <a href="index.php?controller=product&action=detail&id=<?php echo $product['id'] ?>"
                                           title="Chi tiết"><i class="mdi mdi-eye"></i></a>
                                        <a href="index.php?controller=product&action=update&id=<?php echo $product['id'] ?>" title="Sửa">
                                            <i class="mdi mdi-auto-fix"></i>
                                        </a>
                                        <a href="index.php?controller=product&action=delete&id=<?php echo $product['id'] ?>" title="Xóa"
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