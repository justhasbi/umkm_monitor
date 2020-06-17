<pre>
    <?php print_r($this->session->all_userdata())?>
</pre>

<section class="content-header">
    <h1>Produk</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Outlet</a></li>
        <li class="active">data</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <?php $this->view('messages');?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Produk <?= $this->session->userdata('outlet_name');?></h3>
            <div class="pull-right">
                <a href="<?= site_url('items/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Tambah Produk
                </a>
                <a href="<?= site_url('items')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th>Barcode</th>
                        <th>ID Outlet</th>
                        <th>Nama Outlet</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Unit</th>
                        <th>Kategori</th>
                        <th>Stok</th>
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
                        <td><?= $data->barcode;?></td>
                        <td><?= $data->outlet_id;?></td>
                        <td><?= $data->outlet_name;?></td>
                        <td><?= $data->product_name;?></td>
                        <td><?= $data->price;?></td>
                        <td><?= $data->unit_name;?></td>
                        <td><?= $data->category_name;?></td>
                        <td><?= $data->stock;?></td>
                        <td class="text-center" width="220px">   
                            <a href="<?= site_url('items/edit/'. $data->item_id);?>" class="btn btn-success btn-flat btn-xs">
                                <i class="fa fa-shopping-cart"></i> Edit Produk
                            </a>
                            <a href="<?= site_url('items/delete/'. $data->item_id);?>" class="btn btn-danger btn-flat btn-xs">
                                <i class="fa fa-shopping-cart"></i> Hapus Produk
                            </a>
                        </td>
                    </tr>
                        <?php }?>
                        

                </tbody>
            </table>
        </div>
    </div>
</section>