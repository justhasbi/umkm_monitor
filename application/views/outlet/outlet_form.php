
<section class="content-header">
    <h1>Outlet <small>Tambah Outlet</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Outlet</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page)?> Outlet</h3>
            <div class="pull-right">
                <a href="<?= site_url('outlet')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <!-- form group -->
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <form action="<?= site_url('outlet/process')?>" method="post">
                    
                        <div class="form-group">
                            <?php $userid = $this->fungsi->user_login()->user_id;?>
                            <input type="hidden" name="user_id" value="<?= $userid;?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="outlet_id" value="<?= $row->outlet_id?>" class="form-control">
                            <label for="outlet_name">Nama Outlet *</label>
                            <input type="text" name="outlet_name" value="<?= $row->outlet_name?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat *</label>
                            <textarea type="text" name="address" class="form-control" required><?= $row->address?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="outlet_description">Description</label>
                            <textarea type="text" name="outlet_description" class="form-control"><?= $row->outlet_desc?></textarea>
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