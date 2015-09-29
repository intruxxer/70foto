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
        <label style="float: left;"><input type="checkbox" class="vote_filter" <?php if($filter=='active') echo 'checked="checked"' ?>> Filter</label>
    </div>
    <div class="row"><hr></div>
    <div class="row">
        <ul class="thumbnails" id="thumbnails">
        <?php for($i=0; $i<count($all_foto); $i++) { ?>
          <li class="col-md-3 col-sm-3 col-xs-12" data-id="<?php echo $i+1; ?>" data-type="">
            <label>
              <input type="checkbox" name="<?php echo $all_foto[$i]->registration_id ?>" class="vote" <?php if($all_foto[$i]->registration_favourited == '1') echo 'checked="checked"' ?>>
              Favorite #<?php echo $all_foto[$i]->registration_id; ?>!</label>
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

  $('.vote_filter').change(function() {
        if($(this).is(":checked")) {
            var url = "<?php echo site_url('admin/dashboard/index/active') ?>";
            window.location = url;
        }else{
            var url = "<?php echo site_url('admin/dashboard') ?>";
            window.location = url;
        }
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