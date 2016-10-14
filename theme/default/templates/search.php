<?php echo $header;
?>
<!-- JUMBOTRON
=================================-->

<div class="jumbotron text-center">
    <?php getTheSearchBox(1,
    $this->session->userdata('searchArea'),
    $this->session->userdata('searchBedrooms'),
    $this->session->userdata('searchType'),
    $this->session->userdata('searchMinPrice'),
    $this->session->userdata('searchMaxPrice')); ?>
</div>
<!-- /JUMBOTRON container-->
<!-- CONTENT
=================================-->
<?php $totSegments = $this->uri->total_segments();
		if(!is_numeric($this->uri->segment($totSegments))){
		$offset = 0;
		} else if(is_numeric($this->uri->segment($totSegments))){
		$offset = $this->uri->segment($totSegments);
		}
		$limit = 12;
    $results = getSearchResults($limit,$offset,
    $this->session->userdata('searchArea'),
    $this->session->userdata('searchBedrooms'),
    $this->session->userdata('searchType'),
    $this->session->userdata('searchMinPrice'),
    $this->session->userdata('searchMaxPrice'));
?>
<div class="container content-padding">
    <div class="row">
			<div class="col-md-12"><?php foreach($results as $r){ ?>
                <div class="col-md-4 col-sm-6">
                  <div class="thumbnail">
                  <img src="<?php getPropertyImage($r['agent_ref']); ?>" alt="<?php echo $r['display_address']; ?>">
                  <div class="caption">
                    <h3><?php echo $r['display_address']; ?></h3>
                    <h5><?php getSaleType($r['price_qualifier']); ?> <?php if ($r['price_qualifier']!=1) { ?>&pound;<?php echo number_format($r['price']); ?><?php } ?> <?php if($r['channel_id']==2){  getLetFreq($r['rent_frequency']); } ?></h5>
                    <p><?php echo wordlimit($r['summary'],30); ?></p>
                    <p><a href="<?php echo BASE_URL; ?>/property/<?php echo $r['agent_ref']; ?>" class="btn btn-primary" role="button">Read More</a></p>
                  </div>
                </div>
                </div>            <?php //getPropertyStatus($page['theme_folder'],$p['status_id']); ?>

            <?php } ?></div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <?php getSearchResultsPrevBtn($limit,$offset,
          $this->session->userdata('searchArea'),
          $this->session->userdata('searchBedrooms'),
          $this->session->userdata('searchType'),
          $this->session->userdata('searchMinPrice'),
          $this->session->userdata('searchMaxPrice')); ?>
          <?php getSearchResultsNextBtn($limit,$offset,
          $this->session->userdata('searchArea'),
          $this->session->userdata('searchBedrooms'),
          $this->session->userdata('searchType'),
          $this->session->userdata('searchMinPrice'),
          $this->session->userdata('searchMaxPrice')); ?>
      </div>
    </div>
    <div class="row">
        	<div class="col-md-12 text-center">
            <hr>
            <p class="meta"><?php countSearchResults($limit,$offset,
          $this->session->userdata('searchArea'),
          $this->session->userdata('searchBedrooms'),
          $this->session->userdata('searchType'),
          $this->session->userdata('searchMinPrice'),
          $this->session->userdata('searchMaxPrice')); ?></p></div>
  </div>
</div>
<!-- /CONTENT ============-->

<?php echo $footer; ?>
