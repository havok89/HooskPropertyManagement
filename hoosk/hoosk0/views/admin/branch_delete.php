<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo $this->lang->line('branches_delete').": ".$form[0]['branchName'] ?>?</h4>
</div>			<!-- /modal-header -->
<div class="modal-body">
    <?php if(!checkBranchHasProperties($form[0]['branchID'])){ ?>
      <div class="alert alert-danger" role="alert">
        	<strong>WARNING: </strong><p><?php echo $this->lang->line('branches_delete_message'); ?></p>
  		</div>
    <?php } else { ?>
      <div class="alert alert-info" role="alert">
          <strong>WARNING: </strong><p><?php echo $this->lang->line('branches_cant_delete_message'); ?></p>
      </div>
    <?php } ?>
</div>			<!-- /modal-body -->
<div class="modal-footer">
	<form ACTION="<?php echo BASE_URL.'/admin/branches/delete/'.$form[0]['branchID']; ?>" method="POST" name="pageform" id="pageform">
        <input name="deleteid" type="hidden" id="deleteid" value="<?php echo $form[0]['branchID'] ?>" />
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('btn_cancel'); ?></button>
        <?php if(!checkBranchHasProperties($form[0]['branchID'])){ ?>
          <input class="btn btn-danger" type="submit" value="<?php echo $this->lang->line('btn_delete'); ?>"/>
        <?php } ?>
    </form>
</div>			<!-- /modal-footer -->
