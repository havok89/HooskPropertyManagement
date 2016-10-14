<?php echo $header; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php echo $this->lang->line('properties_header'); ?>
            </h1>
            <ol class="breadcrumb">
                <li>
                <i class="fa fa-dashboard"></i>
                	<a href="/admin"><?php echo $this->lang->line('nav_dash'); ?></a>
                </li>
                <li class="active">
                <i class="fa fa-fw fa-home"></i>
                	<a href="/admin/properties"><?php echo $this->lang->line('nav_properties_all'); ?></a>
                </li>
            </ol>
        </div>
    </div>
</div>

    <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
			<table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> <?php echo $this->lang->line('properties_table_ref'); ?> </th>
                    <th> <?php echo $this->lang->line('properties_table_address'); ?> </th>
                    <th> <?php echo $this->lang->line('properties_table_sale'); ?> </th>
                    <th> <?php echo $this->lang->line('properties_table_branch'); ?> </th>
                    <th> <?php echo $this->lang->line('properties_table_added'); ?> </th>
                    <th> <?php echo $this->lang->line('properties_table_updated'); ?> </th>
                    <th> <?php echo $this->lang->line('properties_rightmove_status'); ?> </th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                    <?php
					foreach ($properties as $p) {
						echo '<tr>';
							echo '<td>'.$p['agent_ref'].'</td>';
              echo '<td>'.$p['display_address'].'</td>';
							echo '<td>'.$p['channelName'].'</td>';
              echo '<td>'.$p['branchName'].'</td>';
              echo '<td>'.$p['create_date'].'</td>';
							echo '<td>'.$p['update_date'].'</td>';
              if ($p['rightmoveStatus']==1){
                echo '<td><a href="'.$p['rightmove_url'].'" target="_blank"><span class="fa fa-check icon-success"></span></a></td>';
              } else {
                echo '<td><a href="/admin/properties/log"><span class="fa fa-remove icon-danger"></span></a></td>';
              }

							echo '<td class="td-actions"><a href="/admin/properties/edit/'.$p['agent_ref'].'" class="btn btn-small btn-success"><i class="fa fa-pencil"> </i></a> <a data-toggle="modal" data-target="#ajaxModal" class="btn btn-danger btn-small" href="'.BASE_URL.'/admin/properties/delete/'.$p['agent_ref'].'"><i class="fa fa-remove"> </i></a></td>';
						echo '</tr>';
					} ?>
                </tbody>
              </table>
              <?php echo $this->pagination->create_links(); ?>

            </div>
          </div>

     </div>

<?php echo $footer; ?>
