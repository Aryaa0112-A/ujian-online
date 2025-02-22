<?php
$this->load->view('admin/head');
?>

<!-- tambahkan custom css disini -->

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>

<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header">
                    <center><h4 class="box-title">Daftar Soal Ujian</h4></center>
                </div>
                <div class="box-header">
                    <h3 class="box-title"></h3>
                    <a href="<?= base_url('soal') ?>"><button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-default"><span class="fa fa-plus"></span> Tambah</button></a>
                    <a href="<?php echo base_url('matapelajaran'); ?>"><button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#" ><span ></span>Data Mata Pelajaran</button></a>
                    <a href="<?= base_url('soal_ujian'); ?>" class="btn btn-default btn-flat"><span class="fa fa-refresh"></span> Refresh</a>
                </div>

                <div class="box-body">
                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th width="10%">KODE </th>
                                <th width="20%">MATA PELAJARAN</th>
                                <th>SOAL UJIAN</th>
                                <th width="13%">KUNCI JAWABAN</th>
                                <th width="8%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($soal_ujian as $d) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d->kode_matapelajaran; ?></td>
                                    <td><?php echo $d->nama_matapelajaran; ?></td>
                                    <td>
                                        <?php echo $d->pertanyaan; ?>
                                        <ol type="A">
                                            <li><?php echo ('A' == $d->kunci_jawaban) ? "<b>$d->a</b>" : $d->a; ?></li>
                                            <li><?php echo ('B' == $d->kunci_jawaban) ? "<b>$d->b</b>" : $d->b; ?></li>
                                            <li><?php echo ('C' == $d->kunci_jawaban) ? "<b>$d->c</b>" : $d->c; ?></li>
                                            <li><?php echo ('D' == $d->kunci_jawaban) ? "<b>$d->d</b>" : $d->d; ?></li>
                                            <li><?php echo ('E' == $d->kunci_jawaban) ? "<b>$d->e</b>" : $d->e; ?></li>
                                        </ol>
                                    </td>
                                    <td><b><?php echo $d->kunci_jawaban; ?></b></td>
                                    <td>
                                        <a href="<?= base_url() . 'soal_ujian/edit/' . $d->id_soal_ujian; ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit" title="Ubah"></span></a> |
                                        <a href="<?= base_url() . 'soal_ujian/hapus/' . $d->id_soal_ujian; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah yakin data soal ini akan di hapus?')" title="Hapus"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section><!-- /.content -->

<?php
$this->load->view('admin/js');
?>
<!-- tambahkan custom js disini -->
<script type="text/javascript">
    $(function() {
        $('#data').dataTable();
    });
    $('.select2').select2();
    $('.alert-message').alert().delay(3000).slideUp('slow');
    $('.alert-dismissible').alert().delay(3000).slideUp('slow');
</script>
<?php
$this->load->view('admin/foot');
?>
