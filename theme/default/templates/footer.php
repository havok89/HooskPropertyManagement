    <!-- FOOTER
    =================================-->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-xs-12 pull-left">
           <p><?php echo $settings['siteFooter']; ?></p>
          </div>
          <div class="col-md-5 col-xs-12 pull-right text-right">
           <?php getSocial(); ?>
          </div>
        </div>
      </div>
    </div>

	<!-- /FOOTER ============-->

   	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo THEME_FOLDER; ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function changePrices(){
      		if ($('#searchtype').val() == 2) {
            $('#minPriceLetHolder').show();
      			$('#maxPriceLetHolder').show();
      			$('#minPriceSalesHolder').hide();
      			$('#maxPriceSalesHolder').hide();
          }
          else if ($('#searchtype').val() == 1) {
            $('#minPriceLetHolder').hide();
        		$('#maxPriceLetHolder').hide();
        		$('#minPriceSalesHolder').show();
        		$('#maxPriceSalesHolder').show();
          }
      };
    </script>
	</body>
</html>
