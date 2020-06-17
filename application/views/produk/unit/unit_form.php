
<section class="content-header">
    <h1>Units <small>Tambah unit</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Units</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page)?> unit</h3>
            <div class="pull-right">
                <a href="<?= site_url('unit')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <!-- form group -->
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <form action="<?= site_url('unit/process')?>" method="post">
                        <div class="form-group">
                            <input type="hidden" name="unit_id" value="<?= $row->unit_id?>" class="form-control">
                            <label for="unit_name">Nama Kategori *</label>
                            <input type="text" name="unit_name" value="<?= $row->unit_name?>" class="form-control" required>
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