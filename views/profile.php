
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit</h6>
    </div>
    <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info">If you don't want to change, leave it default</div>
                </div>
                <div class="col-12">
                    <div class="alert alert-warning">if you don't want to change the photo, don't upload it</div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" 
                        value="<?= $obj_login->nama ?>">
                    </div>
                    <div class="col-12 mt-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" 
                        value="<?= $obj_login->email ?>">
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
                        <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                    </div>
                </form>

            </div>

    </div>
</div>
