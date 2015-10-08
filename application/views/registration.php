<div class="container red">
<div class="wrapper">
   <img src="<?php echo base_url('assets/img/bg.png') ?>" class="img-responsive" alt="Responsive image">
</div>

<div class="menu">
      <div class="nav">

      <ul class="row">
        <li Class="col-md-6"></li>
        <li Class="col-md-2"><a href="<?php echo site_url(); ?>">BERANDA</a></li>
        <li Class="col-md-2 active"><a href="<?php echo site_url('registration'); ?>">PENDAFTARAN</a></li>
        <li Class="col-md-2"><a href="<?php echo site_url('requirement'); ?>">SYARAT & KETENTUAN</a></li>
      </ul>

    </div>
    <div class="row">
        <div class="col-md-6">

        </div>

        <div class="col-md-6 customForm">
            <h1>KAPSUL WAKTU 2015</h1>
            <h3>Daftar Sekarang</h2>
            <p>Isilah Form Berikut Secara Lengkap dan Upload Foto kamu</p>
            <form id="form-foto" action="<?php echo site_url('registration/submit'); ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="Name" name="nama" class="form-control" placeholder="Nama Lengkap" required data-parsley-required="true">
              </div>

              <div class="form-group">
                <label>Alamat Lengkap</label>
                <input type="address" name="alamat" class="form-control" placeholder="Alamat Lengkap" required data-parsley-required="true">
              </div>

              <div class="form-group">
                <label>No HP</label>
                <input type="phone" name="phone" class="form-control" placeholder="No HP" required data-parsley-required="true">
              </div>

              <div class="form-group">
                <label>Tanggal Lahir</label>
                <div class='input-group date'>
                    <input type='text' name="umur" id='datetimeage' class="form-control" required data-parsley-required="true">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>

              <div class="form-group">
                <label for="">KTP/SIM</label>
                <div class="form-group fileinput fileinput-new input-group" data-provides="fileinput">
                  <div class="form-control" data-trigger="fileinput">
                    <span class="fileinput-filename"></span>
                  </div>
                  <span class="input-group-addon btn btn-default btn-file" style="background: #631C20; color: #fff;">
                    <span class="fileinput-new">Pilih File</span>
                    <span class="fileinput-exists">Ubah</span>
                    <input type="file" name="userfiles[]" required data-parsley-required="true">
                  </span>
                  <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput" style="background: #000; color: #fff;">
                    Hapus</a>
                </div>
              </div>

              <div class="form-group">
                <label>Judul Foto</label>
                <input type="Name" name="title" class="form-control" placeholder="Judul Foto" required data-parsley-required="true">
              </div>

              <div class="form-group">
                 <label>Kategori Foto</label>
                  <select class="form-control" name="category" required data-parsley-required="true">
                      <option value="events">Events*</option>
                      <option value="sport_news">Sport News*</option>
                      <option value="human_interest">Human Interest</option>
                      <option value="seni_budaya">Seni dan Budaya</option>
                      <option value="alam_panorama">Alam dan Panorama</option>
                      <option value="selfie">Selfie*</option>
                  </select>
                  <span style="color: #fff;">*harus berkaitan dengan peristiwa perayaan Ekspedisi Kapsul Waktu, perayaan 17 Agustus 2015, 
                  atau perayaan adat di wilayah Provinsi masing-masing.
                  </span>
              </div>

              <div class="form-group">
                <label>Deskripsi Foto</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Deskripsi Foto" required data-parsley-required="true"></textarea>
              </div>

              <div class="form-group">
                <label for="">File Foto</label>
                <div class="form-group fileinput fileinput-new input-group" data-provides="fileinput">
                  <div class="form-control" data-trigger="fileinput">
                    <span class="fileinput-filename"></span>
                  </div>
                  <span class="input-group-addon btn btn-default btn-file" style="background: #631C20; color: #fff;">
                    <span class="fileinput-new">Pilih File</span>
                    <span class="fileinput-exists">Ubah</span>
                    <input type="file" name="userfiles[]" required data-parsley-required="true">
                  </span>
                  <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput" style="background: #000; color: #fff;">
                    Hapus</a>
                </div>
              </div>

              <div class="checkbox">
                <label>
                  <input type="checkbox" name="rule-ok" required data-parsley-required="true"> Saya bersedia mematuhi regulasi kompetisi.
                </label>
              </div>
              <div class="form-group">
                <label>
                  <?php echo $this->session->userdata('upload_msg'); ?>
                  <?php $this->session->set_userdata('upload_msg', ''); ?>
                </label>
              </div>
              <button type="submit" class="btn btn-default btn-submit" style="background: #000; color: #fff; border: none; height: 45px; float: right;">Submit</button>
            </form>
        </div>

    </div>
</div>
</div><!-- container -->
<script type="text/javascript">
  $(function () {
      $('#datetimeage').datetimepicker({ format: 'DD-MM-YYYY' });
      $('.carousel').carousel();
      $("#toogles1").click(function(){ });
  });

  $('.fileinput').fileinput();

  $('#form-foto').parsley();
</script>
