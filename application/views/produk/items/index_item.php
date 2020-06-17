<pre>
    <?php print_r($this->session->all_userdata())?>
</pre>
<section class="content-header">
    <h1>Outlet <small>Outlet data</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Outlet</a></li>
        <li class="active">data</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Outlet</h3>
            
        </div>

        <div class="box-body">
            <table class="table table-bordered table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th>ID Outlet</th>
                        <th>ID User</th>
                        <th>Nama Outlet</th>
                        <th>Alamat</th>
                        <th style="width:20%">Deskirpsi</th>
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
                        <td><?= $data->outlet_id;?></td>
                        <td><?= $data->user_id;?></td>
                        <td><?= $data->outlet_name;?></td>
                        <td><?= $data->address;?></td>
                        <td width="350px"><?= $data->outlet_desc;?></td>
                        <td class="text-center" width="220px">   
                            <a href="<?= site_url('items/product_data/'. $data->outlet_id);?>" class="btn btn-success btn-flat btn-xs">
                                <i class="fa fa-shopping-cart"></i> Lihat Produk
                            </a>
                        </td>
                    </tr>
                        <?php }?>
                        

                </tbody>
            </table>
        </div>
    </div>
</section>