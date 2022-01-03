    <!-- BEGIN PAGE CONTAINER-->
        
<div class="page-content"> 
    <div class="content">  
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">  
        <h2><?php echo $title; ?></h2>    
      </div>
      <!-- END PAGE TITLE -->
      <!-- BEGIN PlACE PAGE CONTENT HERE -->
      <?php
        $attributes = ['name' => 'formAdd', 'id' => 'formAdd'];
        echo form_open_multipart('', $attributes);
      ?>
        <div class="col-md-14">
              <div class="grid simple">                
                <div class="grid-body no-border">
                  <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
            </div>
            <div class="grid-body no-border">
               <!-- <?php if (validation_errors()): ?>
                <div class="alert alert-danger">
                  <?php echo validation_errors(); ?>
                </div>
              <?php endif ?> -->
              <?php if (isset($error)):?>
                <div class="alert alert-danger"><?php echo $error ?></div>
                <?php endif ?>
              <div class="row column-seperation">
                <div class="col-md-6">
                  <h4>Basic Information</h4>            
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="old_password" id="old_password" type="text"  class="form-control <?php echo form_error('old_password') ? 'error' : NULL ?>" placeholder="Old Password">
                        <?php echo form_error('old_password', '<div class="alert alert-danger">','</div>') ?>
                      </div>
                    </div>  

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="new_password" id="new_password" type="text"  class="form-control <?php echo form_error('new_password') ? 'error' : NULL ?>" placeholder="New Password">
                        <?php echo form_error('new_password', '<div class="alert alert-danger">','</div>') ?>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="retype_password" id="retype_password" type="text"  class="form-control <?php echo form_error('retype_password') ? 'error' : NULL ?>" placeholder="Retype Password">
                        <?php echo form_error('retype_password', '<div class="alert alert-danger">','</div>') ?>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">&nbsp;</div>
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="/admin/brand/" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
        </div>
        </div>
      </div>
                </div>
              </div>
        </div>
        <?php echo form_close(); ?>
      <!-- END PLACE PAGE CONTENT HERE -->
    </div>
  </div>
        
    <!-- END PAGE CONTAINER -->