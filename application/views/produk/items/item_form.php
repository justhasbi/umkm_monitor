<pre>
    <?php print_r($this->session->all_userdata())?>
</pre>
<section class="content-header">
    <h1>Produk <small>Tambah Produk</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> produk</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <?php $this->view('messages');?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page)?> Produk <?= $this->session->userdata('outlet_name');?></h3>
            <div class="pull-right">
                <a href="<?= site_url('items/product_data/'. $this->session->userdata('outlet_id'))?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <!-- form group -->
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <form action="<?= site_url('items/process')?>" method="post">
                        <div class="form-group">
                            <label for="outlet_id">Outlet ID</label>
                            <input type="text" name="outlet_id" value="<?= $this->session->outlet_id?>" readonly="readonly" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="barcode">Barcode *</label>
                            <input type="hidden" name="id" value="<?= $row->item_id?>">
                            <input type="text" name="barcode" value="<?= $row->barcode?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="product_name">Nama Produk *</label>
                            <input type="text" name="product_name" id="product_name" value="<?= $row->product_name?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Kategori *</label>
                            <?= form_dropdown('category', $category, $selectedcategory, ['class' => 'form-control', 'required' => 'required'])?>
                        </div>
                        
                        <div class="form-group">
                            <label for="unit">Unit *</label>
                            <?= form_dropdown('unit', $unit, $selectedunit, ['class' => 'form-control', 'required' => 'required'])?>
                        </div>

                        <div class="form-group">
                            <label for="price">Harga *</label>
                            <input type="number" name="price" value="<?= $row->price?>" class="form-control" required>
                        </div>

                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat" name="<?= $page?>">
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