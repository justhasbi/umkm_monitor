<pre>
    <?php print_r($this->session->all_userdata())?>
</pre>

<section class="content-header">
    <h1>Tambah Laporan</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
        <li class="active">Data</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <div class="box">

        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form method="post">
                        <table class="table table-bordered table-responsive">
                            <tbody>
                                <?php 
                                $no2 =1;
                                $no = 1;
                                foreach ($produk->result() as $key => $data) {?>
                                <tr>
                                    <th><?= $data->product_name?></th>
                                    <td class="form-group" width="30%">
                                        <input type="hidden" name="id_produk" value="<?= $data->item_id?>">
                                        <input type="number" name="price<?= $no++;?>" value="<?= $data->price?>" class="form-control" readonly>
                                    </td>    
                                
                                    <td class="form-group" width="30%">
                                        <input type="number" name="jumlah<?= $no2++;?>" class="form-control">
                                    </td>
                                </tr>
                                <tr class="form-group">
                            <?php }?>
                                <td colspan="4">
                                    <button type="submit" class="btn btn-success btn-flat" name="save">
                                        <i class="fa fa-paper-plane"></i> Save
                                    </button>
                                    <button type="reset" class="btn btn-flat">Reset</button>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>