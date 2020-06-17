<!-- Content Wrapper -->

<section class="content-header">
    <h1>Dashboard <small>Version 2.0</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">UMKM Terdaftar</span>
                    <span class="info-box-number"><?= $this->fungsi->count_user();?></span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-cutlery"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Outlet Terdaftar</span>
                    <span class="info-box-number"><?= $this->fungsi->count_outlet();?></span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Produk</span>
                    <span class="info-box-number"><?= $this->fungsi->count_item();?></span>
                </div>
            </div>
        </div>
    </div>
</section>