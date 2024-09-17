<?php
$this->load->view('admin/head');
?>
<!--tambahkan custom css disini-->

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
                <center><div class="box-title">Tambah Soal Ujian</div></center>
              </div><!-- /.box-header -->

              <!-- Form untuk tambah soal ujian -->
              <form action="<?= base_url('soal/insert'); ?>" method="post">
                  <div class="box-body">
                      <div class="form-horizontal">

                          <div class="form-group">
                              <label class="col-sm-2 control-label">Mata Pelajaran</label>
                              <div class="col-sm-10">
                                  <select class="select2 form-control" name="nama_matapelajaran" required>
                                      <option selected="selected" disabled value="">- Pilih Mata Pelajaran -</option>
                                      <?php foreach ($soal as $a) { ?>
                                          <option value="<?= $a->id_matapelajaran ?>" <?= set_value('nama_matapelajaran') == $a->id_matapelajaran ? 'selected' : '' ?>><?= $a->kode_matapelajaran; ?> | <?= $a->nama_matapelajaran; ?></option>
                                      <?php } ?>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 control-label">Tulis Soal Ujian</label>
                              <div class="col-sm-10">
                                  <textarea class="form-control" name="soal" required><?= set_value('soal'); ?></textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 control-label">Jawaban A</label>
                              <div class="col-sm-10">
                                  <textarea class="form-control" rows="2" name="a" required><?= set_value('a'); ?></textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 control-label">Jawaban B</label>
                              <div class="col-sm-10">
                                  <textarea class="form-control" rows="2" name="b" required><?= set_value('b'); ?></textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 control-label">Jawaban C</label>
                              <div class="col-sm-10">
                                  <textarea class="form-control" rows="2" name="c" required><?= set_value('c'); ?></textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 control-label">Jawaban D</label>
                              <div class="col-sm-10">
                                  <textarea class="form-control" rows="2" name="d" required><?= set_value('d'); ?></textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 control-label">Jawaban E</label>
                              <div class="col-sm-10">
                                  <textarea class="form-control" rows="2" name="e" required><?= set_value('e'); ?></textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 control-label">Kunci Jawaban</label>
                              <div class="col-sm-10">
                                  <select class="form-control" name="kunci" required>
                                      <option selected="selected" disabled value="">- Pilih Kunci Jawaban -</option>
                                      <option value="A" <?= set_value('kunci') == 'A' ? 'selected' : '' ?>>A</option>
                                      <option value="B" <?= set_value('kunci') == 'B' ? 'selected' : '' ?>>B</option>
                                      <option value="C" <?= set_value('kunci') == 'C' ? 'selected' : '' ?>>C</option>
                                      <option value="D" <?= set_value('kunci') == 'D' ? 'selected' : '' ?>>D</option>
                                      <option value="E" <?= set_value('kunci') == 'E' ? 'selected' : '' ?>>E</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <a href="<?= base_url('soal_ujian') ?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Kembali</a>
                                  <button type="submit" class="btn btn-primary btn-flat" title="Tambah Data Soal Ujian"><span class="fa fa-save"></span> Simpan</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
              <!-- /Form untuk tambah soal ujian -->
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section><!-- /.content -->

<?php
$this->load->view('admin/js');
?>

<!--tambahkan custom js disini-->

<script type="text/javascript">
    $(function() {
        $('#data-tables').dataTable();
    });

    $('.select2').select2();

    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>

<?php
$this->load->view('admin/foot');
?>
