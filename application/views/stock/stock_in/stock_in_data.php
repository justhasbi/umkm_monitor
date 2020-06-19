<section class="content-header">
    <h1>Stok Masuk</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Stok</a></li>
        <li class="active">Masuk</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <?php $this->view('messages');?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Barang Masuk</h3>
            <div class="pull-right">
                <?php if( $this->fungsi->user_login()->hak_akses == 1) {?>  
                <a href="<?= site_url('stock/stock_in_add/'. $this->session->userdata('outlet_id'))?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Stok Masuk
                </a>
                <?php }?>
                <a href="<?= site_url('stock/')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Outlet</th>
                        <th>Barcode</th>
                        <th>Produk</th>
                        <th>QTY</th>
                        <th>Keterangan</th>
                        <th>Tanggal Masuk</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach ($row as $key => $data) :?>
                    <tr>
                        <td><?= $no++;?>.</td>
                        <td><?= $data->outlet_name?></td>
                        <td><?= $data->barcode?></td>
                        <td><?= $data->product_name?></td>
                        <td><?= $data->qty?></td>
                        <td><?= $data->keterangan?></td>
                        <td><?= $data->date?></td>
                        <td>
                            <a id="set_dtl" class="btn btn-xs btn-default" 
                                data-toggle="modal" data-target="#modal-detail"
                                data-outlet_id="<?= $data->outlet_id?>"
                                data-outlet_name="<?= $data->outlet_name?>"
                                data-barcode="<?= $data->barcode?>"
                                data-product_name="<?= $data->product_name?>"
                                data-qty="<?= $data->qty?>"
                                data-keterangan="<?= $data->keterangan?>"
                                data-date="<?= $data->date?>"
                            >
                                <i class="fa fa-eye"></i> Detail
                            </a>
                            <?php if( $this->fungsi->user_login()->hak_akses == 1) {?>  
                            <a href="<?= site_url('stock/stock_in_del/' . $data->stock_id . '/' . $data->item_id)?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Hapus Data')">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                            <?php }?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Stok Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>ID Outlet</th>
                            <td><span id="outlet_id"></span></td>
                        </tr>
                        <tr>
                            <th>Nama Outlet</th>
                            <td><span id="outlet_name"></span></td>
                        </tr>

                        <tr>
                            <th>Barcode</th>
                            <td><span id="barcode"></span></td>
                        </tr>

                        <tr>
                            <th>Produk</th>
                            <td><span id="product_name"></span></td>
                        </tr>

                        <tr>
                            <th>QTY</th>
                            <td><span id="qty"></span></td>
                        </tr>

                        <tr>
                            <th>Keterangan</th>
                            <td><span id="keterangan"></span></td>
                        </tr>

                        <tr>
                            <th>Tanggal Masuk</th>
                            <td><span id="date"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(document).on('click', '#set_dtl', function(){
            var outlet_id = $(this).data('outlet_id');
            var outlet_name = $(this).data('outlet_name');
            var barcode = $(this).data('barcode');
            var product_name = $(this).data('product_name');
            var qty = $(this).data('qty');
            var keterangan = $(this).data('keterangan');
            var date = $(this).data('date');

            $('#outlet_id').text(outlet_id);
            $('#outlet_name').text(outlet_name);
            $('#barcode').text(barcode);
            $('#product_name').text(product_name);
            $('#qty').text(qty);
            $('#keterangan').text(keterangan);
            $('#date').text(date);

            $('#modal-item').modal('hide');
        })
    })
</script>