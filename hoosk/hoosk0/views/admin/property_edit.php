<?php echo $header;
$options = array(
        '0'   => 'No',
        '1'   => 'Yes',
);
?>
<link href="<?php echo ADMIN_THEME; ?>/js/datepicker/jquery.datetimepicker.css" rel="stylesheet">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php echo $this->lang->line('properties_new_header'); ?>
            </h1>
            <ol class="breadcrumb">
                <li>
                <i class="fa fa-dashboard"></i>
                	<a href="/admin"><?php echo $this->lang->line('nav_dash'); ?></a>
                </li>
                <li>
                <i class="fa fa-fw fa-home"></i>
                	<a href="/admin/properties"><?php echo $this->lang->line('nav_properties_all'); ?></a>
                </li>
                <li class="active">
                <i class="fa fa-fw fa-pencil"></i>
                	<?php echo $this->lang->line('properties_edit_header'); ?>
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
                    <?php echo $this->lang->line('properties_edit_header'); ?>
                </h3>
            </div>

         <div class="panel-body">
           <div class="alert alert-info"><?php echo $this->lang->line('properties_new_required'); ?></div>
			<?php
			$attr = array('id' => 'contentForm');
			echo form_open_multipart(BASE_URL.'/admin/properties/edited/'.$this->uri->segment(4), $attr); ?>
      <!-- Sale Details Section -->
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Listing Details</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <?php echo form_error('agent_ref', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="agent_ref"><?php echo $this->lang->line('agent_ref'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'agent_ref',
                    'id'          => 'agent_ref',
                    'disabled'    => 'disabled',
                    'class'       => 'form-control disabled',
                    'value'		=> set_value('agent_ref', $property[0]['agent_ref'], FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('channel_id', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="channel_id"><?php echo $this->lang->line('channel_id'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('channel_id', getDropdownOptions('channel'), set_value('channel_id', $property[0]['channel_id'], FALSE), 'class="form-control disabled" disabled');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('price', '<div class="alert alert-danger">', '</div>'); ?>
                <div class="alert alert-danger price-error"><?php echo $this->lang->line('price_error'); ?></div>
                <label class="control-label" for="price"><?php echo $this->lang->line('price'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'price',
                    'id'          => 'price',
                    'class'       => 'form-control',
                    'value'		=> set_value('price', $property[0]['price'], FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('price_qualifier', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="price_qualifier"><?php echo $this->lang->line('price_qualifier'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('price_qualifier', getDropdownOptions('qualifier'), set_value('price_qualifier', $property[0]['price_qualifier'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('published', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="published"><?php echo $this->lang->line('published'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('published', $options, set_value('published', $property[0]['published'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('overseas', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="overseas"><?php echo $this->lang->line('overseas'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('overseas', $options, set_value('overseas', $property[0]['overseas'], FALSE), 'class="form-control disabled" disabled');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->

              <div class="form-group">
                <?php echo form_error('property_type', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="property_type"><?php echo $this->lang->line('property_type'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('property_type', getDropdownOptionsType('type'), set_value('property_type', $property[0]['property_type'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('status', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="status"><?php echo $this->lang->line('status'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('status', getDropdownOptions('status'), set_value('status', $property[0]['status'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <?php echo form_error('new_home', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="new_home"><?php echo $this->lang->line('new_home'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('new_home', $options, set_value('new_home', $property[0]['new_home'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('branch_id', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="branch_id"><?php echo $this->lang->line('branch_id'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('branch_id', getDropdownBranches(), set_value('branch_id', $property[0]['branch_id'], FALSE), 'disabled class="form-control disabled"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('principal_email_address', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="principal_email_address"><?php echo $this->lang->line('principal_email_address'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'principal_email_address',
                    'id'          => 'principal_email_address',
                    'class'       => 'form-control',
                    'value'		=> set_value('principal_email_address', $property[0]['principal_email_address'], FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('auto_email_updates', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="auto_email_updates"><?php echo $this->lang->line('auto_email_updates'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('auto_email_updates', $options, set_value('auto_email_updates', $property[0]['auto_email_updates'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('auto_email_when_live', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="auto_email_when_live"><?php echo $this->lang->line('auto_email_when_live'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('auto_email_when_live', $options, set_value('auto_email_when_live', $property[0]['auto_email_when_live'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
            </div>
          </div>
        </div>
      </div>
      <!-- Address Details Section -->
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Address Details</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <?php echo form_error('display_address', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="display_address"><?php echo $this->lang->line('display_address'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'display_address',
                    'id'          => 'display_address',
                    'class'       => 'form-control',
                    'value'		=> set_value('display_address', $property[0]['display_address'], FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <hr>
              <div class="form-group">
                <?php echo form_error('house_name_number', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="house_name_number"><?php echo $this->lang->line('house_name_number'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'house_name_number',
                    'id'          => 'house_name_number',
                    'class'       => 'form-control',
                    'value'		=> set_value('house_name_number', $property[0]['house_name_number'], FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('address_2', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="address_2"><?php echo $this->lang->line('address_2'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'address_2',
                    'id'          => 'address_2',
                    'class'       => 'form-control',
                    'value'		=> set_value('address_2', $property[0]['address_2'], FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('address_3', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="address_3"><?php echo $this->lang->line('address_3'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'address_3',
                    'id'          => 'address_3',
                    'class'       => 'form-control',
                    'value'		=> set_value('address_3', $property[0]['address_3'], FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('address_4', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="address_4"><?php echo $this->lang->line('address_4'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'address_4',
                    'id'          => 'address_4',
                    'class'       => 'form-control',
                    'value'		=> set_value('address_4', $property[0]['address_4'], FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('town', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="town"><?php echo $this->lang->line('town'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'town',
                    'id'          => 'town',
                    'class'       => 'form-control',
                    'value'		=> set_value('town', $property[0]['town'], FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php echo form_error('postcode_1', '<div class="alert alert-danger">', '</div>'); ?>
                    <label class="control-label" for="postcode_1"><?php echo $this->lang->line('postcode_1'); ?></label>
                    <div class="controls">
                      <?php 	$data = array(
                        'name'        => 'postcode_1',
                        'id'          => 'postcode_1',
                        'class'       => 'form-control',
                        'value'		=> set_value('postcode_1', $property[0]['postcode_1'], FALSE)
                      );

                      echo form_input($data); ?>
                    </div> <!-- /controls -->
                  </div> <!-- /form-group -->
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php echo form_error('postcode_2', '<div class="alert alert-danger">', '</div>'); ?>
                    <label class="control-label" for="postcode_2"><?php echo $this->lang->line('postcode_2'); ?></label>
                    <div class="controls">
                      <?php 	$data = array(
                        'name'        => 'postcode_2',
                        'id'          => 'postcode_2',
                        'class'       => 'form-control',
                        'value'		=> set_value('postcode_2', $property[0]['postcode_2'], FALSE)
                      );

                      echo form_input($data); ?>
                    </div> <!-- /controls -->
                  </div> <!-- /form-group -->
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <?php echo form_error('latitude', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="latitude"><?php echo $this->lang->line('latitude'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'latitude',
                    'id'          => 'latitude',
                    'class'       => 'form-control',
                    'value'		=> set_value('latitude', $property[0]['latitude'], FALSE)
                  );
                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('longitude', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="longitude"><?php echo $this->lang->line('longitude'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'longitude',
                    'id'          => 'longitude',
                    'class'       => 'form-control',
                    'value'		=> set_value('longitude', $property[0]['longitude'], FALSE)
                  );
                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
            </div>
          </div>
        </div>
      </div>
      <!-- Property Details Section -->
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Property Details</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <?php echo form_error('bedrooms', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="bedrooms"><?php echo $this->lang->line('bedrooms'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('bedrooms', getNumberArray(8), set_value('bedrooms', $property[0]['bedrooms'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('bathrooms', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="bathrooms"><?php echo $this->lang->line('bathrooms'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('bathrooms', getNumberArray(8), set_value('bathrooms', $property[0]['bathrooms'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('reception_rooms', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="reception_rooms"><?php echo $this->lang->line('reception_rooms'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('reception_rooms', getNumberArray(8), set_value('reception_rooms', $property[0]['reception_rooms'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <?php echo form_error('summary', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="summary"><?php echo $this->lang->line('summary'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
       						  'name'        => 'summary',
       						  'id'          => 'summary',
       						  'class'       => 'form-control',
       						  'rows'		=>	'4',
       						);
       						echo form_textarea($data, set_value('summary', $property[0]['summary'], FALSE)); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
            </div>
          </div>
          <div class="form-group">
            <?php echo form_error('description', '<div class="alert alert-danger">', '</div>'); ?>
            <label class="control-label" for="description"><?php echo $this->lang->line('description'); ?></label>
            <div class="controls">
              <?php 	$data = array(
                'name'        => 'description',
                'id'          => 'description',
                'class'       => 'form-control',
                'rows'		=>	'10',
              );
              echo form_textarea($data, set_value('description', $property[0]['description'], FALSE)); ?>
            </div> <!-- /controls -->
          </div> <!-- /form-group -->
        </div>
      </div>
      <!-- Letting Details Section -->
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Letting Details</h3>
        </div>
        <div class="panel-body">
          <div class="alert alert-info">This section can be ignored if the listing is not a property for let</div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <?php echo form_error('student_property', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="student_property"><?php echo $this->lang->line('student_property'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('student_property', $options, set_value('student_property', $property[0]['student_property'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('house_flat_share', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="house_flat_share"><?php echo $this->lang->line('house_flat_share'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('house_flat_share', $options, set_value('house_flat_share', $property[0]['house_flat_share'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('date_available', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="date_available"><?php echo $this->lang->line('date_available'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'date_available',
                    'id'          => 'datetimepicker',
                    'class'       => 'form-control',
                    'value'		=> set_value('date_available', $property[0]['date_available'], FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('contract_months', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="contract_months"><?php echo $this->lang->line('contract_months'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('contract_months', getNumberArray(48), set_value('contract_months', $property[0]['contract_months'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('minimum_term', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="minimum_term"><?php echo $this->lang->line('minimum_term'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('minimum_term', getNumberArray(24), set_value('minimum_term', $property[0]['minimum_term'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('let_type', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="let_type"><?php echo $this->lang->line('let_type'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('let_type', getDropdownOptions('lettype'), set_value('let_type', $property[0]['let_type'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('rent_frequency', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="rent_frequency"><?php echo $this->lang->line('rent_frequency'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('rent_frequency', getDropdownOptions('rentfrequency'), set_value('rent_frequency', $property[0]['rent_frequency'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('furnished_type', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="furnished_type"><?php echo $this->lang->line('furnished_type'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('furnished_type', getDropdownOptions('furnished'), set_value('furnished_type', $property[0]['furnished_type'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('administration_fee', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="administration_fee"><?php echo $this->lang->line('administration_fee'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'administration_fee',
                    'id'          => 'administration_fee',
                    'class'       => 'form-control',
                    'value'		=> set_value('administration_fee', $property[0]['administration_fee'], FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('deposit', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="deposit"><?php echo $this->lang->line('deposit'); ?></label>
                <div class="controls">
                  <?php 	$data = array(
                    'name'        => 'deposit',
                    'id'          => 'deposit',
                    'class'       => 'form-control',
                    'value'		=> set_value('deposit', $property[0]['deposit'], FALSE)
                  );

                  echo form_input($data); ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <?php echo form_error('house_flat_share', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="house_flat_share"><?php echo $this->lang->line('house_flat_share'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('house_flat_share', $options, set_value('house_flat_share', $property[0]['house_flat_share'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('pets_allowed', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="pets_allowed"><?php echo $this->lang->line('pets_allowed'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('pets_allowed', $options, set_value('pets_allowed', $property[0]['pets_allowed'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('smokers_considered', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="smokers_considered"><?php echo $this->lang->line('smokers_considered'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('smokers_considered', $options, set_value('smokers_considered', $property[0]['smokers_considered'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('housing_benefit_considered', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="housing_benefit_considered"><?php echo $this->lang->line('housing_benefit_considered'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('housing_benefit_considered', $options, set_value('housing_benefit_considered', $property[0]['housing_benefit_considered'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('sharers_considered', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="sharers_considered"><?php echo $this->lang->line('sharers_considered'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('sharers_considered', $options, set_value('sharers_considered', $property[0]['sharers_considered'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('all_bills_inc', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="all_bills_inc"><?php echo $this->lang->line('all_bills_inc'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('all_bills_inc', $options, set_value('all_bills_inc', $property[0]['all_bills_inc'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('oil_bill_inc', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="oil_bill_inc"><?php echo $this->lang->line('oil_bill_inc'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('oil_bill_inc', $options, set_value('oil_bill_inc', $property[0]['oil_bill_inc'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('council_tax_inc', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="council_tax_inc"><?php echo $this->lang->line('council_tax_inc'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('council_tax_inc', $options, set_value('council_tax_inc', $property[0]['council_tax_inc'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
            </div>
          </div>
        </div>
      </div>
      <!-- Student Property Details Section -->
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Student Property Details</h3>
        </div>
        <div class="panel-body">
          <div class="alert alert-info">This section can be ignored if the listing is not a student property</div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <?php echo form_error('burglar_alarm', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="burglar_alarm"><?php echo $this->lang->line('burglar_alarm'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('burglar_alarm', $options, set_value('burglar_alarm', $property[0]['burglar_alarm'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('washing_machine', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="washing_machine"><?php echo $this->lang->line('washing_machine'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('washing_machine', $options, set_value('washing_machine', $property[0]['washing_machine'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('dishwasher', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="dishwasher"><?php echo $this->lang->line('dishwasher'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('dishwasher', $options, set_value('dishwasher', $property[0]['dishwasher'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('water_bill_inc', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="water_bill_inc"><?php echo $this->lang->line('water_bill_inc'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('water_bill_inc', $options, set_value('water_bill_inc', $property[0]['water_bill_inc'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('gas_bill_inc', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="gas_bill_inc"><?php echo $this->lang->line('gas_bill_inc'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('gas_bill_inc', $options, set_value('gas_bill_inc', $property[0]['gas_bill_inc'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <?php echo form_error('electricity_bill_inc', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="electricity_bill_inc"><?php echo $this->lang->line('electricity_bill_inc'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('electricity_bill_inc', $options, set_value('electricity_bill_inc', $property[0]['electricity_bill_inc'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('tv_licence_inc', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="tv_licence_inc"><?php echo $this->lang->line('tv_licence_inc'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('tv_licence_inc', $options, set_value('tv_licence_inc', $property[0]['tv_licence_inc'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('sat_cable_tv_bill_inc', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="sat_cable_tv_bill_inc"><?php echo $this->lang->line('sat_cable_tv_bill_inc'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('sat_cable_tv_bill_inc', $options, set_value('sat_cable_tv_bill_inc', $property[0]['sat_cable_tv_bill_inc'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
              <div class="form-group">
                <?php echo form_error('internet_bill_inc', '<div class="alert alert-danger">', '</div>'); ?>
                <label class="control-label" for="internet_bill_inc"><?php echo $this->lang->line('internet_bill_inc'); ?></label>
                <div class="controls">
                  <?php
                    echo form_dropdown('internet_bill_inc', $options, set_value('internet_bill_inc', $property[0]['internet_bill_inc'], FALSE), 'class="form-control"');
                   ?>
                </div> <!-- /controls -->
              </div> <!-- /form-group -->
            </div>
          </div>
        </div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $this->lang->line('media_details'); ?></h3>
        </div>
        <div class="panel-body">
          <button onclick="addNewPic();" class="btn btn-primary" type="button"><?php echo $this->lang->line('property_image_add'); ?></button>
          <hr />
          <div class="row">
          <div class="slider" id="images_holder">

         <?php $i=0;

           foreach ($images as $s) {
            $i++;?>
            <div class="col-md-4">
           <div class="panel panel-default" id="pic_element<?php echo $i; ?>">
              <div class="panel-heading">
                <span><?php echo $this->lang->line('property_image_title')." ".$i; ?></span>
                <button id="delete<?php echo $i; ?>" class="close" type="button" onClick="removePrePic('<?php echo $i; ?>');">×</button>
              </div>
              </label>
              <div id="element<?php echo $i; ?>" class="panel-body">
                  <div class="controls">
                      <div><img src="<?php if ($s['media_url'] != "") { echo BASE_URL.$s['media_url']; } ?>" id="logo_preloaded<?php echo $i; ?>" <?php if ($s['media_url'] == "") { echo "style='display:none;'"; } ?>></div>
                      <img src="<?php echo BASE_URL; ?>/theme/admin/images/ajax-loader.gif" style="margin:-7px 5px 0 5px;display:none;" id="loading_pic<?php echo $i; ?>" />
                      <p><?php echo $this->lang->line('property_image_change'); ?></p>
                      <?php
                          $data = array(
                              'name'		=> 'file_upload'.$i,
                              'id'		=> 'file_upload'.$i,
                              'class'		=> 'imageupload',
                          );
                          echo form_upload($data);
                      ?>
                      <p><?php echo $this->lang->line('property_image_caption'); ?></p>
                       <input class="form-control" type="text" id="alt<?php echo $i; ?>" name="alt<?php echo $i; ?>" <?php if ($s['caption'] != "") { echo 'value="'.$s['caption'].'"'; } else { echo  ''; } ?> />

                      <input type="hidden" id="slide<?php echo $i; ?>" name="slide<?php echo $i; ?>" value="<?php echo $s['media_url']; ?>" />
                  </div> <!-- /controls -->
              </div> <!-- /control-group -->
            </div>
          </div>
          <?php
        } ?>
        <input type="hidden" id="pics" name="pics" value="" />
        </div>
      </div>
      <hr/>
      <div class="form-group">
      <?php echo form_error('propertyPDF', '<div class="alert">', '</div>'); ?>
        <label class="control-label" for="propertyPDF"><?php echo $this->lang->line('propertyPDF'); ?></label>
        <div class="controls">
          <div><?php if (hasCurrentPDF($property[0]['agent_ref'])) { echo "Current file: ".getCurrentPDF($property[0]['agent_ref']); } ?></div>
          <?php
            $data = array(
              'name'		=> 'propertyPDF',
              'id'		=> 'propertyPDF',
              'class'		=> 'form-control'
            );
            echo form_upload($data);
          ?>
        </div> <!-- /controls -->
      </div> <!-- /form-group -->
      </div>
      <input type="hidden" id="PDFUpload" name="PDFUpload" value="<?php echo getCurrentPDF($property[0]['agent_ref']); ?>" />
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo $this->lang->line('rightmove'); ?></h3>
      </div>
      <div class="panel-body">
        <?php if(!RIGHTMOVE_STATUS){ ?>
          <div class="alert alert-warning"><?php echo $this->lang->line('rightmoveInfo'); ?></div>
        <?php } ?>
        <?php if($property[0]['rightmoveStatus']==1){ ?>
        <div class="form-group">
          <?php echo form_error('rightmoveStatus', '<div class="alert alert-danger">', '</div>'); ?>
          <label class="control-label" for="rightmoveStatus"><?php echo $this->lang->line('rightmoveStatus'); ?></label>
          <div class="controls">
            <?php
            echo form_dropdown('rightmoveStatusShow', $options, set_value('rightmoveStatus', $property[0]['rightmoveStatus'], FALSE), 'class="form-control disabled" disabled');
             ?>
          </div> <!-- /controls -->
        </div> <!-- /form-group -->
        <input type="hidden" id="rightmoveStatus" name="rightmoveStatus" value="<?php echo $property[0]['rightmoveStatus']; ?>" />

        <?php } else { ?>
          <div class="form-group">
            <?php echo form_error('rightmoveStatus', '<div class="alert alert-danger">', '</div>'); ?>
            <label class="control-label" for="rightmoveStatus"><?php echo $this->lang->line('rightmoveStatus'); ?></label>
            <div class="controls">
              <?php
              echo form_dropdown('rightmoveStatus', $options, set_value('rightmoveStatus', $property[0]['rightmoveStatus'], FALSE), 'class="form-control"');
               ?>
            </div> <!-- /controls -->
          </div> <!-- /form-group -->
          <?php } ?>

      </div>
    </div>

    <div class="panel-footer">
        <a class="btn btn-primary" onClick="formSubmit()"><?php echo $this->lang->line('btn_save'); ?></a>
				<a class="btn" href="<?php echo BASE_URL; ?>/admin/properties"><?php echo $this->lang->line('btn_cancel'); ?></a>
			</div>
		</div>
         <?php  echo form_close(); ?>
   </div>
  </div>
</div>
<script src="<?php echo ADMIN_THEME; ?>/js/datepicker/jquery.datetimepicker.js"></script>
<script src="<?php echo ADMIN_THEME; ?>/js/date.js"></script>
<script type="text/javascript">


function AddZero(num) {
    return (num >= 0 && num < 10) ? "0" + num : num + "";
}
	jQuery('#datetimepicker').datetimepicker({
    format:'d-m-Y'
	});


</script>
<script type="text/javascript">
function removePrePic(actual_pic)
{
  return (elem=document.getElementById('pic_element' + actual_pic)).parentNode.removeChild(elem);
}
function removePic(id_in)
{
  n = id_in.split('delete');
  actual_pic = n[1];
  return (elem=document.getElementById('pic_element' + actual_pic)).parentNode.removeChild(elem);
}

function addNewPic()
{
  total_pics++;

  top_div = document.createElement('div');
  top_div.className = 'col-md-4';

  new_div = document.createElement('div');
  new_div.className = 'panel panel-default';
  new_div.id = 'pic_element' + total_pics;

  new_div_holder = document.createElement('div');
  new_div_holder.className = 'panel-body';
  new_div_holder.id = 'element' + total_pics;


  new_form_holder = document.createElement('div');
  new_form_holder.className = 'form-group';
  new_form_holder.id = 'pic' + total_pics;


  new_form_holder2 = document.createElement('div');
  new_form_holder2.className = 'form-group';
  new_form_holder2.id = 'pic2' + total_pics;

  new_form_holder3 = document.createElement('div');
  new_form_holder3.className = 'form-group';
  new_form_holder3.id = 'pic2' + total_pics;

  new_label = document.createElement('div');
  new_label.for = 'file_upload' + total_pics;
  new_label.className = 'panel-heading';

  new_span = document.createElement('span');
  new_span.innerHTML = '<?php echo $this->lang->line('property_image_title'); ?> ' + total_pics;

  new_button = document.createElement('button');
  new_button.type = 'button';
  new_button.className = 'close';
  new_button.id = 'delete' + total_pics;
  new_button.innerHTML = '×';
  new_button.onclick = function(){ removePic(this.id); }

  new_label.appendChild(new_span);
  new_label.appendChild(new_button);

  new_div2 = document.createElement('div');
  new_div2.className = 'controls';

  new_div3 = document.createElement('div');

  new_img = document.createElement('img');
  new_img.id = 'logo_preloaded' + total_pics;
  new_img.style.display = 'none';

  new_div3.appendChild(new_img);

  new_img2 = document.createElement('img');
  new_img2.id = 'loading_pic' + total_pics;
  new_img2.src = '<?php echo BASE_URL; ?>/theme/admin/images/ajax-loader.gif';
  new_img2.style.margin = '-7px 5px 0 5px';
  new_img2.style.display = 'none';

  new_file = document.createElement('input');
  new_file.type = 'file';
  new_file.name = 'file_upload' + total_pics;
  new_file.className  = 'imageupload';
  new_file.id = 'file_upload' + total_pics;

  new_hidden = document.createElement('input');
  new_hidden.type = 'hidden';
  new_hidden.id = 'slide' + total_pics;
  new_hidden.name = 'slide' + total_pics;

  new_alt_span = document.createElement('label');
  new_alt_span.innerHTML = '<?php echo $this->lang->line('property_image_caption'); ?>';


  new_alt = document.createElement('input');
  new_alt.type = 'text';
  new_alt.id = 'alt' + total_pics;
  new_alt.name = 'alt' + total_pics;
  new_alt.className = 'form-control';


  new_form_holder.appendChild(new_alt_span);
  new_form_holder.appendChild(new_alt);


  new_form_holder2.appendChild(new_file);

  new_div2.appendChild(new_div3);
  new_div2.appendChild(new_img2);
  new_div2.appendChild(new_form_holder);
  new_div2.appendChild(new_form_holder2);
  new_div2.appendChild(new_hidden);

  new_div_holder.appendChild(new_div2);

  new_div.appendChild(new_label);
  new_div.appendChild(new_div_holder);
  top_div.appendChild(new_div);
  document.getElementById('images_holder').appendChild(top_div);

  $('.imageupload').on('change', prepareUpload);
}

function prepareUpload(event)
{
  files = event.target.files;
  uploadFiles(event, this.id);
}

function uploadFiles(event, id_in)
{
  event.stopPropagation();
  event.preventDefault();

  n = id_in.split('file_upload');
  actual_pic = n[1];

  $('#loading_pic' + actual_pic).show();

  var data = new FormData();
  $.each(files, function(key, value){ data.append(key, value); });

  $.ajax({
    url: '<?php echo BASE_URL; ?>/admin/properties/upload/?files',
    type: 'POST',
    data: data,
    cache: false,
    dataType: 'json',
    processData: false,
    contentType: false,
    success: function(data, textStatus, jqXHR){
      if(data!='0')
      {
        $('#logo_preloaded' + actual_pic).show();
        document.getElementById('logo_preloaded' + actual_pic).src = '<?php echo BASE_URL; ?>' + data;
        document.getElementById('slide' + actual_pic).value = data;
        $('#loading_pic' + actual_pic).hide();
      }
      else
      {
        alert('Error! The file is not an image.');
        $('#loading_pic' + actual_pic).hide();
      }
    }
  });
}
var files;
$('input[type=file]').on('change', prepareUpload);

var total_pics;
total_pics = <?php echo $i; ?>;

  function formSubmit(){
    data_to_post = '';
  	for(i=1;i<=total_pics;i++)
  	{
  		if(document.getElementById('slide' + i))
  		{
  			slide = document.getElementById('slide' + i).value;
  			alt = document.getElementById('alt' + i).value;
  			data_to_post += '{' + slide + '|' + alt + '}';
  		}
  	}

  	document.getElementById('pics').value = data_to_post;
  	document.getElementById("contentForm").submit();
  }
</script>
<?php echo $footer; ?>
