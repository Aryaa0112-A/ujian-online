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
            <!-- Tampilan untuk alert -->
            <!-- TUTUP Tampilan untuk alert -->

            <?php foreach($soal as $s) { ?>
            <div class="box box-success" style="overflow-x: scroll;">
                <form action="<?= base_url('soal_ujian/update'); ?>" method="post">
                    <div class="box-header">
                        <center><h4 class="box-title">Edit Data</h4></center>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mata Pelajaran</label>
                                <input type="hidden" name="id" value="<?= $s->id_soal_ujian ?>">
                                <div class="col-sm-10">
                                    <select class="select2 form-control" name="nama_matapelajaran" required>
                                        <option selected="selected" disabled>- Pilih Mata Pelajaran -</option>
                                        <?php foreach ($kelas as $a) { ?>
                                            <option value="<?= $a->id_matapelajaran ?>" <?= $s->id_matapelajaran == $a->id_matapelajaran ? 'selected' : '' ?>><?= $a->kode_matapelajaran; ?> | <?= $a->nama_matapelajaran; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tulis Soal Ujian</label>
                                <div class="col-sm-10">
                                    <textarea name="soal" class="form-control" required><?= $s->pertanyaan; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jawaban A</label>
                                <div class="col-sm-10">
                                    <textarea rows="2" style="width: 100%" name="a" required><?= $s->a; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jawaban B</label>
                                <div class="col-sm-10">
                                    <textarea rows="2" style="width: 100%" name="b" required><?= $s->b; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jawaban C</label>
                                <div class="col-sm-10">
                                    <textarea rows="2" style="width: 100%" name="c" required><?= $s->c; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jawaban D</label>
                                <div class="col-sm-10">
                                    <textarea rows="2" style="width: 100%" name="d" required><?= $s->d; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jawaban E</label>
                                <div class="col-sm-10">
                                    <textarea rows="2" style="width: 100%" name="e" required><?= $s->e; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kunci Jawaban</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kunci" required>
                                        <option value="A" <?= $s->kunci_jawaban == 'A' ? 'selected' : '' ?>>A</option>
                                        <option value="B" <?= $s->kunci_jawaban == 'B' ? 'selected' : '' ?>>B</option>
                                        <option value="C" <?= $s->kunci_jawaban == 'C' ? 'selected' : '' ?>>C</option>
                                        <option value="D" <?= $s->kunci_jawaban == 'D' ? 'selected' : '' ?>>D</option>
                                        <option value="E" <?= $s->kunci_jawaban == 'E' ? 'selected' : '' ?>>E</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-default btn-flat" onclick="return history.go(-1)" title="Kembali ke halaman sebelumnya"><span class="fa fa-arrow-left"></span> Kembali</button>
                                    <button type="submit" class="btn btn-primary btn-flat" title="Simpan Perubahan"><span class="fa fa-save"></span> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-footer -->
                    <div class="box-footer">
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section><!-- /.content -->

<?php 
$this->load->view('admin/js');
?>

<!-- tambahkan custom js disini -->

<script type="text/javascript">
    $(function(){
        $('#data-tables').dataTable();
    });
    $('.select2').select2();
    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>

<?php
$this->load->view('admin/foot');
?>
