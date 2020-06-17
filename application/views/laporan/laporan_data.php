<pre>
    <?php print_r($this->session->all_userdata())?>
</pre>

<h1>ISINYA LIST LAPORAN</h1>
<section class="content-header">
    <h1>Laporan <small>Data Laporan</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
        <li class="active">Data</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Laporan Outlet "MAWAR"</h3>
            
        </div>

        <div class="box-body">
            
            <table class="table table-bordered table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th>ID Outlet</th>
                        <th>ID Laporan</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php 
                    $no = 1;
                    foreach ($row->result() as $key => $data) {?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?= $data->outlet_id?></td>
                        <td><?= $data->laporan_id?></td>
                        <td><?= $data->tanggal?></td>
                        <td width="10%">
                            <a href="<?= site_url('laporan/laporan_detail')?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> Detail Laporan</a>
                        </td>
                    </tr>    
                    
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>