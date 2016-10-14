<?php echo $header;
?>
<!-- CONTENT
=================================-->

<div class="container content-padding">
    <div class="row">
			<div class="col-md-3">
        <h2>Property Details</h2>
        <p><strong>Bedrooms:</strong> <?php echo $property[0]['bedrooms']; ?></p>
        <p><strong>Reception Rooms:</strong> <?php echo $property[0]['reception_rooms']; ?></p>
        <p><strong>Bathrooms:</strong> <?php echo $property[0]['bathrooms']; ?></p>
        <?php if ($property[0]['channel_id']==2){?>
          <p><strong>Furnished:</strong> <?php getFurnishedType($property[0]['furnished_type']); ?></p>
          <p><strong>Term:</strong> <?php getLetType($property[0]['let_type']); ?></p>
          <p><strong>Deposit:</strong> &pound;<?php echo number_format($property[0]['price']); ?></p>
        <?php } ?>
        <?php getPropertyBrochure($property[0]['agent_ref']); ?>
        <hr>
        <h4>For more information contact:</h4>
        <p><strong>Branch:</strong> <?php echo $property[0]['branchName']; ?></p>
        <?php if ($property[0]['branchTelephone']!=""){ ?>
          <p><span class="glyphicon glyphicon-earphone"></span> <?php echo $property[0]['branchTelephone']; ?></p>
        <?php } ?>
        <?php if ($property[0]['branchEmail']!=""){ ?>
          <p><span class="glyphicon glyphicon-envelope"></span> <?php echo $property[0]['branchEmail']; ?></p>
        <?php } ?>
        <hr>
        <p><a class="btn btn-primary" href="/search/results/0">Back to search</a></p>
      </div>
      <div class="col-md-9">
        <div id="carousel" class="carousel slide " data-ride="carousel">
            <?php getPropertyCarousel($property[0]['agent_ref']); ?>
          <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <h3><?php echo $property[0]['display_address']; ?></h3>
        <h5><?php getSaleType($property[0]['price_qualifier']); ?> <?php if ($property[0]['price_qualifier']!=1) { ?>&pound;<?php echo number_format($property[0]['price']); ?><?php } ?> <?php if($property[0]['channel_id']==2){  getLetFreq($property[0]['rent_frequency']); } ?></h5>
        <?php echo nl2br($property[0]['description']); ?>

      </div>
    </div>
    </div>
</div>

<?php getTheSearchBox(1,
$this->session->userdata('searchArea'),
$this->session->userdata('searchBedrooms'),
$this->session->userdata('searchType'),
$this->session->userdata('searchMinPrice'),
$this->session->userdata('searchMaxPrice')); ?>
<!-- /CONTENT ============-->

<?php echo $footer; ?>
