
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Page Edit</h1>
</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit <?= ucwords($edit) ?></h6>
    </div>
    <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info">If you don't want to change, leave it default</div>
                </div>
                <?php 
                if($edit == 'gas'): 
                    $gas = $bensin->fetch_object();
                    ?>
                <form action="" method="post">
                    <div class="col-12">
                        <label for="jenis">Gas Type</label>
                        <input type="text" class="form-control" name="type" id="type" 
                            value="<?= $gas->jenis ?>">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="isi">Quantity</label>
                            <input type="text" class="form-control" name="qty" id="qty"
                            value="<?= $gas->isi ?>">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="harga">Price (/ltr)</label>
                        <input type="text" class="form-control" name="price" id="price"
                        value="<?= $gas->harga ?>">
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary" name="gas">Edit</button>
                    </div>
                </form>
                <?php 
                    elseif($edit=='topup'):
                        $top = $topup->fetch_object();
                ?>
                <form action="" method="post">
                    <div class="col-12">
                        <label for="users">user</label>
                        <select name="user" id="users" class="form-control">
                            <?php while($users = $user->fetch_object()): ?>
                            <option value="<?= $users->id_users ?>"><?= $users->nama ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" class="form-control" placeholder="Input Cash Amount"
                        value="<?= $top->amount ?>">
                    </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary" name="topup">Edit</button>
                    </div>
                </form>

                <?php 
                    elseif($edit=='tra-ed'):
                        $trans = $transaction->fetch_object();
                ?>
                <form action="" method="post">
                    <div class="row ml-1">
                        <div class="col-12">
                            <label for="users">user</label>
                            <select name="user" id="users" class="form-control">
                                <?php while($users = $user->fetch_object()): ?>
                                <option value="<?= $users->id_users ?>"><?= $users->nama ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="gas">Gas Type</label>
                            <select name="gases" id="gases" class="form-control">
                                <option value="">-- Choose --</option>
                                <?php while($gases = $bensin->fetch_object()): ?>
                                <option class="gases-<?= $gases->id_bensin ?>" value="<?= $gases->id_bensin ?>" data-price="<?= $gases->harga ?>"><?= $gases->jenis ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="gases">Price Gas</label>
                            <input type="text" class="price form-control" readonly>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="refuel">Refuel</label>
                            <input type="text" class="form-control" name="refuel" placeholder="Enter cash amount to edit">
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary" name="tra-ed">Edit</button>
                        </div>

                    </div>
                </form>

            </div>

                <?php 
                    elseif($edit=='user'):
                        $users = $user_e->fetch_object();
                ?>
                <div class="col-12">
                    <div class="alert alert-warning">if you don't want to change the photo, don't upload it</div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" 
                        value="<?= $users->nama ?>">
                    </div>
                    <div class="col-12 mt-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" 
                        value="<?= $users->email ?>">
                    </div>
                    <div class="col-12 mt-3">
                        <label for="photo">photo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary" name="user_edit">Edit</button>
                    </div>
                </form>
                <?php 
                    elseif($edit=='pegawai'):
                        $pgw = $pegawai_e->fetch_object();
                ?>
                <div class="col-12">
                    <div class="alert alert-warning">if you don't want to change the photo, don't upload it</div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" 
                        value="<?= $pgw->nama ?>">
                    </div>
                    <div class="col-12 mt-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" 
                        value="<?= $pgw->email ?>">
                    </div>
                    <div class="col-12 mt-3">
                        <label for="pass">Password</label>
                        <input type="pass" name="pass" class="form-control" placeholder="Masukan password baru">
                    </div>
                    <div class="col-12 mt-3">
                        <label for="photo">photo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary" name="pegawai_edit">Edit</button>
                    </div>
                </form>

            </div>

            <?php endif; ?>

    </div>
</div>
