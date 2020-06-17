<pre>
<?php print_r($this->session->all_userdata())?>
</pre>
<section class="content-header">
    <h1>Categories <small>Tambah stock</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> categories</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah stock: <?= $this->session->userdata('outlet_name');?></h3>
            <div class="pull-right">
                <a href="<?= site_url('stock/stock_in_data/'. $this->session->userdata('outlet_id'))?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <!-- form group -->
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <form action="<?= site_url('stock/process')?>" method="post">

                        <div class="form-group">
                            <label for="outlet_id">ID Outlet *</label>
                            <input type="text" name="outlet_id" id="outlet_id" value="<?= $this->session->userdata('outlet_id');?>" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Masuk*</label>
                            <input type="date" name="date_add" class="form-control" value="<?= date('Y-m-d'); ?>" required>
                        </div>

                        <div>
                            <label for="barcode">Barcode </label>
                        </div>
                        
                        <div class="form-group input-group">
                            <input type="hidden" name="item_id" id="item_id">
                            <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button> 
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="product_name">Nama Produk *</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="unit_nama">Item Unit</label>
                                    <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
                                </div>

                                <div class="col-md-4">
                                    <label for="unit_nama">Stock Awal</label>
                                    <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="qty">Qty *</label>
                            <input type="number" name="qty" id="qty" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat" name="stock_add">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Pilih Produk</h4>
            </div>
            <div class="modal-body">
                
                <table class="table table-bordered table-striped table-responsive" id="table1">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Nama Produk</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($item as $i => $data) { ?>
                        <tr>
                            <td><?= $data->barcode?></td>
                            <td><?= $data->product_name?></td>
                            <td><?= $data->unit_name?></td>
                            <td class="text-right"><?= indo_currency($data->price)?></td>
                            <td class="text-right"><?= $data->stock?></td>
                            <td>
                                <button class="btn btn-info btn-xs" id="select_product"
                                    data-id="<?= $data->item_id?>"
                                    data-barcode="<?= $data->barcode?>"
                                    data-product_name="<?= $data->product_name?>"
                                    data-unit_name="<?= $data->unit_name?>"
                                    data-stock="<?= $data->stock?>"
                                    >
                                    <i class="fa fa-check"></i> Pilih
                                </button>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(document).on('click', '#select_product', function(){
            var item_id = $(this).data('id');
            var barcode = $(this).data('barcode');
            var product_name = $(this).data('product_name');
            var unit_name = $(this).data('unit_name');
            var stock = $(this).data('stock');

            $('#item_id').val(item_id);
            $('#barcode').val(barcode);
            $('#product_name').val(product_name);
            $('#unit_name').val(unit_name);
            $('#stock').val(stock);

            $('#modal-item').modal('hide');
        })
    })
</script>