<?php echo $header; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php echo $this->lang->line('nav_properties_log'); ?>
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
                <i class="fa fa-fw fa-home"></i>
                	<a href="/admin/properties"><?php echo $this->lang->line('nav_properties_log'); ?></a>
                </li>
            </ol>
        </div>
    </div>
</div>

    <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
			<table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> <?php echo $this->lang->line('properties_table_status_code'); ?> </th>
                    <th> <?php echo $this->lang->line('properties_table_message'); ?> </th>
                    <th> <?php echo $this->lang->line('properties_table_error_code'); ?> </th>
                    <th> <?php echo $this->lang->line('properties_table_error_description'); ?> </th>
                    <th> <?php echo $this->lang->line('properties_table_request_id'); ?> </th>
                    <th> <?php echo $this->lang->line('properties_table_ref'); ?> </th>
                    <th> <?php echo $this->lang->line('properties_table_change_type'); ?> </th>
                    <th> <?php echo $this->lang->line('properties_table_rightmove_id'); ?><br/><?php echo $this->lang->line('properties_table_rightmove_url'); ?> </th>
                  </tr>
                </thead>
                <tbody>
                    <?php
					foreach ($log as $p) {
						echo '<tr>';
							echo '<td>'.$p['status_code'].$p['reason_phrase'].$p['protocol_ver'].'</td>';
              echo '<td>'.$p['message'].'</td>';
              echo '<td>'.$p['error_code'].' - '.$p['error_value'].'</td>';
              echo '<td>'.$p['error_description'].'</td>';
              echo '<td>'.$p['request_id'].'</td>';
              echo '<td>'.$p['agent_ref'].'</td>';
              echo '<td>'.$p['change_type'].'</td>';
              echo '<td>'.$p['rightmove_id'].'<br/><a href="'.$p['rightmove_url'].'" target="_blank">'.$p['rightmove_url'].'</a></td>';
						echo '</tr>';
					} ?>
                </tbody>
              </table>
            </div>
              <?php echo $this->pagination->create_links(); ?>

            </div>
          </div>

     </div>

<?php echo $footer; ?>
