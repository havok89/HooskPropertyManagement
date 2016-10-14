<?php echo $header;?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php echo $this->lang->line('branches_header'); ?>
            </h1>
            <ol class="breadcrumb">
                <li>
                <i class="fa fa-dashboard"></i>
                	<a href="/admin"><?php echo $this->lang->line('nav_dash'); ?></a>
                </li>
                <li>
                <i class="fa fa-fw fa-map-marker"></i>
                	<a href="/admin/properties"><?php echo $this->lang->line('nav_branches_all'); ?></a>
                </li>
                <li class="active">
                <i class="fa fa-fw fa-pencil"></i>
                	<?php echo $this->lang->line('branches_new_header'); ?>
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
        <?php if($error==1){ ?>
          <div class="alert alert-danger">Please check the form for errors</div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil fa-fw"></i>
                    <?php echo $this->lang->line('branches_new_header'); ?>
                </h3>
            </div>

         <div class="panel-body">
           <div class="alert alert-info"><?php echo $this->lang->line('branches_new_required'); ?></div>
			<?php
			$attr = array('id' => 'contentForm');
			echo form_open(BASE_URL.'/admin/branches/new/add', $attr); ?>
      <!-- Sale Details Section -->

              <div class="form-group">
                <?php echo form_error('branchName', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="branchName"><?php echo $this->lang->line('branchName'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'branchName',
                    'id'          => 'branchName',
                    'class'       => 'form-control',
                    'value'		=> set_value('branchName', '', FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('branchURL', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="branchURL"><?php echo $this->lang->line('branchURL'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'branchURL',
                    'id'          => 'branchURL',
                    'class'       => 'form-control URLField',
                    'value'		=> set_value('branchURL', '', FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('branchAddress', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="branchAddress"><?php echo $this->lang->line('branchAddress'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'branchAddress',
                    'id'          => 'branchAddress',
                    'class'       => 'form-control',
                    'value'		=> set_value('branchAddress', '', FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('branchTelephone', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="branchTelephone"><?php echo $this->lang->line('branchTelephone'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'branchTelephone',
                    'id'          => 'branchTelephone',
                    'class'       => 'form-control',
                    'value'		=> set_value('branchTelephone', '', FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('branchEmail', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="branchEmail"><?php echo $this->lang->line('branchEmail'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'branchEmail',
                    'id'          => 'branchEmail',
                    'class'       => 'form-control',
                    'value'		=> set_value('branchEmail', '', FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('branchRightmoveID', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="branchRightmoveID"><?php echo $this->lang->line('branchRightmoveID'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'branchRightmoveID',
                    'id'          => 'branchRightmoveID',
                    'class'       => 'form-control',
                    'value'		=> set_value('branchRightmoveID', '', FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
      </div>
    <div class="panel-footer">
        <a class="btn btn-primary" onClick="formSubmit()"><?php echo $this->lang->line('btn_save'); ?></a>
				<a class="btn" href="<?php echo BASE_URL; ?>/admin/branches"><?php echo $this->lang->line('btn_cancel'); ?></a>
			</div>
		</div>
         <?php  echo form_close(); ?>
   </div>
  </div>
</div>
<script type="text/javascript">
  function formSubmit(){
  	document.getElementById("contentForm").submit();
  }
</script>
<?php echo $footer; ?>
