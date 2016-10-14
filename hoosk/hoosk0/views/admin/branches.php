<?php echo $header; ?>
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
                <li class="active">
                <i class="fa fa-fw fa-map-marker"></i>
                	<a href="/admin/branches"><?php echo $this->lang->line('nav_branches_all'); ?></a>
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
                    <th> <?php echo $this->lang->line('branches_table_name'); ?> </th>
                    <th> <?php echo $this->lang->line('branches_table_address'); ?> </th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                    <?php
					foreach ($branches as $b) {
						echo '<tr>';
							echo '<td>'.$b['branchName'].'</td>';
              echo '<td>'.$b['branchAddress'].'</td>';
							echo '<td class="td-actions"><a href="/admin/branches/edit/'.$b['branchID'].'" class="btn btn-small btn-success"><i class="fa fa-pencil"> </i></a> <a data-toggle="modal" data-target="#ajaxModal" class="btn btn-danger btn-small" href="'.BASE_URL.'/admin/branches/delete/'.$b['branchID'].'"><i class="fa fa-remove"> </i></a></td>';
						echo '</tr>';
					} ?>
                </tbody>
              </table>
              <?php echo $this->pagination->create_links(); ?>
            </div>
          </div>
     </div>

<?php echo $footer; ?>
