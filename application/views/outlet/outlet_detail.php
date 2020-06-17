<pre>
    <?php print_r($this->session->all_userdata());?>
</pre>

<section class="content-header">
    <h1>Outlet <small>Show Detail</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Outlet</a></li>
        <li class="active">Detail</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12 container">
            <div class="pull-right">
                <a href="<?= site_url('outlet')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Outlet Detail</h3>
                    <div class="pull-right">
                        <a href="<?= site_url()?>" class="btn btn-primary btn-flat">
                            <i class="fa fa-pencil"></i> Update Outlet
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <?php foreach ($data_outlet->result() as $key => $data) :?>
                        
                        <small>Nama Outlet :</small><h1 style="font-weight: bold;"><?= $data->outlet_name?></h1>
                        <small>Pemilik :</small><h3><?= $data->nama?></h3>
                        <small>Alamat :</small><h3><?= $data->address?></h3>
                        <small>Deskripsi :</small><p><?= $data->outlet_desc?></p>
                    <?php endforeach?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Produk</h3>
                    <div class="pull-right">
                        <a href="<?= site_url('items/product_data/'. $this->session->userdata('outlet_id'))?>" class="btn btn-success btn-xs">
                            <i class="fa fa-pencil"></i> Lihat Produk
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped table-responsive" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Produk</th>
                                <th>Produk</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        foreach ($data_produk->result() as $key => $data) :?>
                            <tr>
                                <td width="5%"><?= $no++;?></td>
                                <td><?= $data->item_id?></td>
                                <td><?= $data->product_name?></td>
                                <td><?= $data->stock?></td>
                            </tr>
                        <?php endforeach?>
                        </tbody>
                            
                            
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</section>