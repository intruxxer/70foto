<div class="masthead clearfix">
    <div class="container">
        <div class="logo pull-left">Admin</div>
        <div class="logo pull-right">Kapsul Waktu  &copy;2015</div>
    </div>
</div>


<div class="container">
    <div class="clearfix"></div>
    <div class="row">
        <?php if( $this->session->userdata('logged_in') ) { ?><label style="float: right;"><a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-danger">Sign out</a></label><?php } ?>
        <label style="float: right;">&nbsp;&nbsp;</label>
        <label style="float: right;">
          <select class="form-control topic_filter" name="category" required="" data-parsley-required="true">
              <option value="">Select Category</option>
              <option value="">Uncategorized</option>
              <option value="events">Events</option>
              <option value="sport_news">Sport News</option>
              <option value="human_interest">Human Interest</option>
              <option value="seni_budaya">Seni dan Budaya</option>
              <option value="alam_panorama">Alam dan Panorama</option>
              <option value="selfie">Selfie</option>
          </select>
        </label>
        <label style="float: left;"><input type="checkbox" class="vote_filter" <?php if($filter=='active') echo 'checked="checked"' ?>> Favorite</label>
    </div>
    <div class="row">&nbsp;</div>
    <div id="myDiv" class="row">
      <span style="float: right;  text-decoration: none;" >Download <i class="glyphicon glyphicon-download-alt" data-toggle="tooltip" data-placement="top" title="Donwload All Files Here" data-original-title="Tooltip on top"></i></span>
    </div>
    <div class="row">
        <div>
          <a href="<?php echo site_url('admin/dashboard/download') ?>" target="_blank" style="float: right;  text-decoration: none;" class="download">
            Download All Data <i class="glyphicon glyphicon-download"></i> (<b><?php echo $total_foto; ?></b> Photos).
          </a>
        </div>
        <br/>
        <div>
          <a href="<?php echo site_url('admin/dashboard/download') ?>" target="_blank" style="float: right;  text-decoration: none;" class="download">
            Download Registration Data <i class="glyphicon glyphicon-file"></i> (<b><?php echo $total_foto; ?></b> Photos).
          </a>
        </div>
    </div>
    <div class="row">&nbsp;</div>
    <div class="row"><hr></div>
    <div class="row">
        <ul class="thumbnails" id="thumbnails">
        <?php for($i=0; $i<count($all_foto); $i++) { ?>
          <li class="col-md-3 col-sm-3 col-xs-12" data-id="<?php echo $i+1; ?>" data-type="">
            <label>
              <input type="checkbox" name="<?php echo $all_foto[$i]->registration_id ?>" class="vote" <?php if($all_foto[$i]->registration_favourited == '1') echo 'checked="checked"' ?>>
              Favorite #<?php echo $all_foto[$i]->registration_id; ?>!</label>
              <?php $pics_info = $all_foto[$i]->registration_photo_title." by ".ucwords($all_foto[$i]->registration_name)." (".$all_foto[$i]->registration_phone.")"; ?>
              <a href="">
                <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="<?php echo $pics_info; ?>" data-original-title="Pics Information"></i>
              </a>
              <a href="<?php echo base_url('files/'.$all_foto[$i]->registration_image_dir .'/' .$all_foto[$i]->registration_photo) ?>" target="_blank" style="float: right;" class="download"><i class="glyphicon glyphicon-download"></i></a>
              <a href="" name="<?php echo $all_foto[$i]->registration_id ?>" class="delete" style="float: right;"><i class="glyphicon glyphicon-trash"></i> &nbsp;</a>
              <a href="<?php echo base_url('files/'.$all_foto[$i]->registration_image_dir .'/' .$all_foto[$i]->registration_photo) ?>" class="thumbnail">
              <img src="<?php echo base_url('files/'.$all_foto[$i]->registration_image_dir .'/' .$all_foto[$i]->registration_photo) ?>" alt="" />
              <span class="caption"><i class="glyphicon glyphicon-search"></i></span>
            </a>
          </li>
        <?php } ?>
        </ul>
    </div>
    <?php echo $this->pagination->create_links(); ?>
</div>
<script type="text/javascript">

  $("[data-toggle='tooltip']").tooltip();

  $('.vote_filter').change(function() {
        if($(this).is(":checked")) {
            var url = "<?php echo site_url('admin/dashboard/index/active') ?>";
            window.location = url;
        }else{
            var url = "<?php echo site_url('admin/dashboard') ?>";
            window.location = url;
        }
  });

  $('.topic_filter').change(function() {
            var url = "<?php echo site_url('admin/dashboard/topic/" + this.value + "') ?>";
            window.location = url;
  });

  $('.vote').change(function() {
        var id = $(this).attr("name");
        if($(this).is(":checked")) {
            var url = "<?php echo site_url('registration/favourite/s') ?>" + "/" + id;
            $.post( url, function( data ) { } );
        }else{
            var url = "<?php echo site_url('registration/favourite/u') ?>" +  "/" + id;
            $.post(url, function( data ) { });
        }
  });

  $('.delete').click(function() {
        var id = $(this).attr("name");
        var url = "<?php echo site_url('registration/delete') ?>" + "/" + id;
        $.post( url, function( data ) { } );
        window.location = window.location.href;
  });

</script>
