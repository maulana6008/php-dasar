<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Gas Type</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="#" data-toggle="modal" data-target="#refuelmodal">
        <i class="fas fa-solid fa-plus"></i> Add</a>
    </a>
        
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Gas Type</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Type</th>
                        <th>Quantity</th>
                        <th>Price (/ltr)</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Type</th>
                        <th>Quantity</th>
                        <th>Price (/ltr)</th>
                        <th colspan="2">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no=1;while($obj = $bensin->fetch_object()): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $obj->jenis ?></td>
                        <td><?= $obj->isi ?></td>
                        <td><?= $obj->harga ?></td>
                        <td>
                            <a href="edit/gas/<?= $obj->id_bensin; ?>" class="btn btn-secondary">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input name="_id" type="hidden" value="<?= $obj->id_bensin ?>" />
                                <button class="btn btn-danger" type="submit" name="delete">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php $no++;endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bensin Modal-->
<div class="modal fade" id="refuelmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Gas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-12">
                                <label for="jenis">Gas Type</label>
                                <input type="text" class="form-control" name="type" id="type">
                            </div>
                            <div class="col-12 mt-3">
                                <label for="isi">Quantity</label>
                                <input type="text" class="form-control" name="qty" id="qty">
                            </div>
                            <div class="col-12 mt-3">
                                <label for="harga">Price (/ltr)</label>
                                <input type="text" class="form-control" name="price" id="price">
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary" name="add">Add</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>