
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php if($type_login != 'user'): ?>
        Refuel Users
        <?php else: ?>
        History Pembelian Bensin
        <?php endif; ?>
    </h1>
    <?php if($type_login != 'user'): ?>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="#" data-toggle="modal" data-target="#refuelmodal">
            <i class="fas fa-solid fa-plus"></i> Add</a>
        </a>
    <?php endif; ?>    
</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <?php if($type_login != 'user'): ?>
            Refuel Data
            <?php else: ?>
            Data Transaksi Pembelian Bensin
            <?php endif; ?>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <?php if($type_login != 'user'): ?>
                        <th>User</th>
                        <?php endif; ?>
                        <th>Pegawai</th>
                        <th>Pengisian</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <?php if($type_login != 'user'): ?>
                        <th colspan="2">Action</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>No</th>
                        <?php if($type_login != 'user'): ?>
                        <th>User</th>
                        <?php endif; ?>
                        <th>Pegawai</th>
                        <th>Pengisian</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <?php if($type_login != 'user'): ?>
                        <th colspan="2">Action</th>
                        <?php endif; ?>
                    </tr>
                </tfoot>
                <tbody>
                <?php 
                $no=1;
                while($obj = $transaction->fetch_object()): 
                $id_u = $obj->id_user;
                $id_p = $obj->id_pegawai;
                $user_akun = $koneksi->query("SELECT * FROM users WHERE id_users='$id_u'");
                $pegawai_akun = $koneksi->query("SELECT * FROM pengelola WHERE id='$id_p'");
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <?php if($type_login != 'user'): ?>
                        <td><?= $user_akun->fetch_object()->nama; ?></td>
                        <?php endif; ?>
                        <td><?= $pegawai_akun->fetch_object()->nama; ?></td>
                        <td><?= $obj->pengisian ?> liter</td>
                        <td>Rp <?= $obj->total_harga?>,-</td>
                        <td><?= $obj->tgl?></td>
                        <?php if($type_login != 'user'): ?>
                        <td>
                            <a href="edit/tra-ed/<?= $obj->id_transaksi ?>" class="btn btn-secondary">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input name="_id" type="hidden" value="<?= $obj->id_transaksi ?>" />
                                <button class="btn btn-danger" type="submit" name="delete">
                                    Delete
                                </button>
                            </form>
                        </td>
                        <?php endif; ?>
                    </tr>
                <?php $no++;endwhile; ?>
                </tbody>
            
            </table>
        </div>
    </div>
</div>


<?php if($type_login != 'user'): ?>
<!-- Refuel Modal-->
<div class="modal fade" id="refuelmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Refule</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="" method="post">
            <div class="row">
                <div class="col-12 mt-3">
                    <label for="users">user</label>
                    <select name="user" id="users" class="form-control">
                        <?php while($users = $user->fetch_object()): ?>
                        <option value="<?= $users->id_users ?>"><?= $users->nama ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="col-12 mt-3">
                    <label for="gas">Gas Type</label>
                    <select name="gas" id="gas" class="form-control">
                        <option value="">-- Choose --</option>
                        <?php while($gas = $bensin->fetch_object()): ?>
                        <option class="gas-<?= $gas->id_bensin ?>" value="<?= $gas->id_bensin ?>" data-price="<?= $gas->harga ?>"><?= $gas->jenis ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="col-12 mt-3">
                    <label for="gas">Price Gas</label>
                    <input type="text" class="price form-control" readonly>
                </div>
                <div class="col-12 mt-3">
                    <label for="refuel">Refuel</label>
                    <input type="text" class="form-control" name="refuel" placeholder="Enter cash amount">
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
<?php endif; ?>