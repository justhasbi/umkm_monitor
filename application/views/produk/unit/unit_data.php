
<section class="content-header">
    <h1>Units</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Units</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <?php $this->view('messages');?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Unit</h3>
            <?php if( $this->fungsi->user_login()->hak_akses == 1) {?>  
            <div class="pull-right">
                <a href="<?= site_url('unit/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Tambah Unit
                </a>
            </div>
            <?php }?>  
        </div>

        <div class="box-body">
            <table class="table table-bordered table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama unit</th>
                        <th>Dibuat pada</th>
                        <?php if( $this->fungsi->user_login()->hak_akses == 1) {?>  
                        <th>Action</th>
                        <?php }?>  
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach($row->result() as $key => $data) {
                    ?>
                    <tr>
                        <td><?= $no++;?>.</td>
                        <td><?= $data->unit_name;?></td>
                        <td><?= $data->created;?></td>
                        <?php if( $this->fungsi->user_login()->hak_akses == 1) {?>  
                        <td class="text-center" width="220px">   
                            
                            <a href="<?= site_url('unit/edit/'.$data->unit_id);?>" class="btn btn-primary btn-flat btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>

                            <a href="<?= site_url('unit/delete/'.$data->unit_id);?>" class="btn btn-danger btn-flat btn-xs">
                                <i class="fa fa-pencil"></i> Delete
                            </a>
                        </td>
                        <?php }?>  
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>