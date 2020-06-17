
<section class="content-header">
    <h1>Categories <small>Tambah category</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> categories</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page)?> Category</h3>
            <div class="pull-right">
                <a href="<?= site_url('category')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <!-- form group -->
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <form action="<?= site_url('category/process')?>" method="post">
                        <div class="form-group">
                            <input type="hidden" name="category_id" value="<?= $row->category_id?>" class="form-control">
                            <label for="category_name">Nama Kategori *</label>
                            <input type="text" name="category_name" value="<?= $row->category_name?>" class="form-control" required>
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