<section class="content-header">
    <h1>User <small>Show Detail</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User</a></li>
        <li class="active">Detail</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12 container">
            <div class="pull-right">
                <a href="<?= site_url('user')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box">
            <div class="box-header">
                <h3 class="box-title">User Detail</h3>
                <div class="pull-right">
                    <a href="<?= site_url('user/edit/')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-pencil"></i> Update User
                    </a>
                </div>
            </div>
            <pre>
                <?php ?>
            </pre>
            <div class="box-body">
                <table class="table table-bordered table-striped table-responsive">
                    <?php
                        foreach($row->result() as $key => $data) {
                    ?>
                    <tr>
                        <th>Id User</th>
                        <td><?= $data->user_id;?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><?= $data->username?></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td><?= $data->nama?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?= $data->alamat?></td>
                    </tr>
                    <tr>
                        <th>Tanggal lahir</th>
                        <td><?= $data->tanggal_lahir?></td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td><?= $data->email?></td>
                    </tr>
                    <tr>
                        <th>Hak Akses</th>
                        <td><?= $data->hak_akses == 1 ? 'Admin' : 'UMKM' ?></td>
                    </tr>
                    <?php  }?>
                </table>
            </div>
        </div>

        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Cabang Outlet</h3>
                    <div class="pull-right">
                        <a href="#" class="btn btn-primary btn-flat">
                            <i class="fa fa-eye"></i> Lihat Outlet
                        </a>

                        <a href="#" class="btn btn-success btn-flat">
                            <i class="fa fa-user-plus"></i> Tambah Outlet
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <td>ID Outlet</td>
                                <td>Nama Outlet</td>
                                <td>Alamat</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>OU002</td>
                                <td>Rena Bakery</td>
                                <td>Manyaran</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs">
                                        <i class="fa fa-folder-o"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>OU003</td>
                                <td>Lumpia Bangjo</td>
                                <td>Bendan Ngisor, Semarang</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs">
                                        <i class="fa fa-folder-o"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Laporan</h3>
                    <div class="pull-right">
                        <!-- <div class="form-group">
                            <select name="laporan-periodik" class="form-control">
                                <option value="">- Harian -</option>
                                <option value="" >Mingguan</option>
                                <option value="" >Bulanan</option>
                            </select>
                        </div> -->

                        <a href="#" class="btn btn-primary btn-flat">
                            <i class="fa fa-eye"></i> Lihat Laporan
                        </a>

                        <a href="#" class="btn btn-success btn-flat">
                            <i class="fa fa-user-plus"></i> Tambah Laporan
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>ID Laporan</th>
                                <th>Tanggal</th>
                                <th>Outlet</th>
                                <th>Pemilik</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>LP001</td>
                                <td>2020-03-12</td>
                                <td>Rena Bakery</td>
                                <td>Vido Rizqy Setiardo</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs">
                                        <i class="fa fa-folder-o"></i> Detail
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>LP003</td>
                                <td>2020-05-25</td>
                                <td>Lumpia Bangjp</td>
                                <td>Vido Rizqy Setiardo</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs">
                                        <i class="fa fa-folder-o"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>