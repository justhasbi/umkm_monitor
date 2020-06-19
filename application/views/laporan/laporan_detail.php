<!-- main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lembar Laporan</h3>
            
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                <?php foreach ($data_outlet->result() as $key => $data2) {?>
                
                    <h4><strong><?= $data2->outlet_name?></strong></h4>
                    <p>ID Laporan : <strong><?= $data2->laporan_id?></strong></p>
                    <p>Tanggal : <strong><?= $data2->tanggal?></strong></p>
                </div>
                <?php }?>
            </div> <br>
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($data_laporan->result() as $key => $data) {?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?= $data->product_name;?></td>
                        <td><?= $data->terjual;?></td>
                        <td><?= $data->price;?></td>
                        <td><?= $data->sub_total;?></td>
                    </tr>
                    <?php }?>
                    
                </tbody>
            </table>
        </div>
    </div>
</section>