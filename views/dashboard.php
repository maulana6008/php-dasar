
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Refuel Incomes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= $total->fetch_object()->Penjualan; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-gas-pump fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Top-up Incomes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= $tot_top->fetch_object()->Total_topup; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Users
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $tot_us->fetch_object()->Total_user; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<h3 class="h4 mb-0 ml-3 text-gray-800" >Gas Information </h3>
<div class="row">
    <?php $no=1;if($no>3): ?>
    <?php while($obj = $bensin->fetch_object()): ?>
    <?PHP $no=1;?>
        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="cart-title"><?= $obj->jenis?></h5>
                </div>
                <div class="card-body">
                    Rp <?= $obj->harga?>
                </div>
            </div>
        </div>
    </div>
    <?php $no++;endwhile; ?>
    <div class="row">
    <?php else:?>
    <?php while($obj = $bensin->fetch_object()): ?>
    
        <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-header">
            <h5 class="cart-title"><?= $obj->jenis?></h5>
            </div>
            <div class="card-body">
                Rp <?= $obj->harga?>
            </div>
        </div>
    </div>
    <?php $no++;endwhile; ?>
    <?php endif;?>
</div>
