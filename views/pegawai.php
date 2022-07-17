<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pegawai</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="#" data-toggle="modal" data-target="#refuelmodal">
        <i class="fas fa-solid fa-plus"></i> Add</a>
    </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th colspan="2">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no=1; while($pgw = $pegawai->fetch_object()): ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $pgw->nama ?></td>
                            <td><?= $pgw->email ?></td>
                            <td>
                                <img class="img-profile" src="assets/img/<?= $pgw->foto ?>" alt="" width="150px">
                            </td>
                            <td>
                                <a href="edit/pegawai/<?= $pgw->id ?>" class="btn btn-secondary">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input name="_id" type="hidden" value="<?= $pgw->id ?>" />
                                    <button class="btn btn-danger" type="submit" name="delete">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php $no++; endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Pegawai Modal-->
<div class="modal fade" id="refuelmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Pegawai</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="col-12 mt-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="col-12 mt-3">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" name="pass" id="pass">
                    </div>
                    <div class="col-12 mt-3">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" name="photo" id="photo">
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