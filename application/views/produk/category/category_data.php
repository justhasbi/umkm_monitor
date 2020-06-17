<section class="content-header">
    <h1>Categories</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> categories</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <?php $this->view('messages');?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Kategori</h3>
            <div class="pull-right">
                <a href="<?= site_url('category/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Tambah Kategori
                </a>
            </div>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama category</th>
                        <th>Dibuat pada</th>
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
                        <td><?= $data->category_name;?></td>
                        <td><?= $data->created;?></td>
                        <td class="text-center" width="220px">   
                            
                            <a href="<?= site_url('category/edit/'.$data->category_id);?>" class="btn btn-primary btn-flat btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>

                            <a href="<?= site_url('category/delete/'.$data->category_id);?>" class="btn btn-danger btn-flat btn-xs">
                                <i class="fa fa-pencil"></i> Delete
                            </a>
                        </td>
                    </tr>
                        <?php }?>
                        

                </tbody>
            </table>
        </div>
    </div>
</section>