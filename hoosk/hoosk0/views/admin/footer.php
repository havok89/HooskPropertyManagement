<div class="push"></div>
</div>
<div class="footer">
  <div class="footer-inner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12"> &copy; 2016 <a href="http://hoosk.org/">Hoosk CMS</a>. </div>
        <!-- /span12 -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /footer-inner -->
</div>
<!-- /footer -->

<!-- remote modals -->
<div id="remote-modals">
    <div class="modal fade" id="ajaxModal" aria-labelledby="ajaxModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->
</div>
<script type="text/javascript">
	$('#remote-modals').on("hidden.bs.modal", ".modal:not(.local-modal)", function (e) {
		$(e.target).removeData("bs.modal").find(".modal-content").empty();
	});

$(document).ready(function() {
	$(".URLField").blur(function() {
		var identbefore=$(".URLField").val();
		var ident=identbefore.toLowerCase();
		ident=ident.replace(/ /g,'-');
		ident=ident.replace(/_/g,'-');
		ident=ident.replace(/[^\w-]+/g,'');
		$(".URLField").val(ident);
		if( identbefore.length >ident.length ) {
			alert("URL amended\nPlease use only a-z,0-9 or dash");
		}
	});

  $("#price").blur(function() {
    var identbefore=$("#price").val();
    var ident=identbefore.toLowerCase();
    ident=ident.replace(/\D/g,'');
    $("#price").val(ident);
    if( identbefore.length >ident.length ) {
      $(".price-error").show();
    }
  });

  $("#agent_ref").blur(function() {
    if ($("#agent_ref").val()!=""){
      $.ajax({url: "/admin/agent_ref/check/"+$("#agent_ref").val(),
        success: function(result){
            if(result==1){
              $("#agent_ref").removeClass("field-success");
              $("#agent_ref").addClass("field-danger");
              $(".ref-exists").show();
              $("#ref-new").hide();
            } else {
              $("#ref-new").show();
              $(".ref-exists").hide();
              $("#agent_ref").removeClass("field-danger");
              $("#agent_ref").addClass("field-success");
            };
        }
      });
    } else {
      $("#agent_ref").removeClass("field-success");
      $("#agent_ref").addClass("field-danger");
      $(".ref-exists").show();
      $("#ref-new").hide();
    };
	});
});
</script>
</body>
</html>
