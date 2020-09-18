<script type="text/javascript">
	$(document).ready(function(){
/*============= showing new search fire ice form =============================================*/
		$(".newSearch").on("click", function(){
			$(".searchFormdiv").show()
			$(".searchresult").hide();
		})
/*============= showing new search fire ice form =============================================*/
/*============= submitting new search fire ice form ==========================================*/
		$(document).on("submit", "#fireicesearch", function(e){
			e.preventDefault();
			var fireicesearch = $(this);
			var form_data2 = JSON.stringify(fireicesearch.serializeObject());
			$(".Loader").show();
			$.ajax({
				url:'<?php echo APP_URI ?>/system/model/request.php',
				method:"POST",
				contentType:"plain/text",
				data:form_data2,
				success:function(result){
					if(result != ""){
						$(".Loader").hide();
						$(".newSearch").show();
						$(".searchFormdiv").hide();
						$(".searchresult").show();
						$(".showsearchresult").html("<pre>"+result+"</pre>");
					}
					else{
						alert("Please enter a search");
					}
				}
			});
			return false;
		});
/*============= submitting new search fire ice form ==========================================*/

/*============= clearing response messages from server ========================================*/
		function clearResponse(){
			$("#response").hide();
			$("#response").html("");
		}
/*============= clearing response messages from server ========================================*/
/*============= serializing form content to json format before sending to server ==============*/
		$.fn.serializeObject = function(){
			var o = {};
			var a = this.serializeArray();
			$.each(a, function(){
				if(o[this.name] !== undefined){
					if(o[this.name].push){
						o[this.name] = [o[this.name]];
					}
					o[this.name].push(this.value || "");
				}
				else{
					o[this.name] = this.value || "";
				}
			});
			return o;
		}
/*============= serializing form content to json format before sending to server ==============*/

	});
</script>