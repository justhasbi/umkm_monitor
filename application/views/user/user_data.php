
<section class="content-header">
    <h1>User <small>Show User</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Users</h3>
            <div class="pull-right">
                <a href="<?= site_url('user/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create User
                </a>
            </div>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Hak Akses</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach($row->result() as $key => $data) {
                    ?>
                    <tr>
                        <td><?= $no++;?>.</td>
                        <td><?= $data->username ;?></td>
                        <td><?= $data->nama ;?></td>
                        <td><?= $data->alamat ;?></td>
                        <td><?= $data->hak_akses == 1? "Admin" : "Umkm";?></td>
                        <td class="text-center" width="220px">
                            
                            <form action="<?= site_url('user/delete')?>" method="post">
                                <a href="<?= site_url('user/detail/'.$data->user_id);?>" class="btn btn-success btn-flat btn-xs">
                                    <i class="fa fa-user"></i> Detail
                                </a>

                                <a href="<?= site_url('user/edit/'.$data->user_id);?>" class="btn btn-primary btn-flat btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>

                                <input type="hidden" name="user_id" value="<?= $data->user_id?>">
                                <button onclick="return confirm('Anda yakin menghapus user <?= $data->username ?> ?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                        <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>