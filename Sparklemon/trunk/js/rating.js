$(document).ready(function () {
	$(".rating").load("http://sparklemon.com/php/rating.php?resource_id="+resource_id, function() {
		$("#show_vote").fadeIn();
		if ($("#hover_vote").length>0)
		{
			$(".inner").hover (function () {
				$("#show_vote").hide();
				$("#hover_vote").show();
			},
			function () {
				$("#show_vote").show();
				$("#hover_vote").hide();
			});
			$("#vote_1").click (function () {
				$(".rating").load("http://sparklemon.com/php/rating.php?resource_id="+resource_id+"&vote=1", function() {
					$("#show_vote").fadeIn();
				});
			});
			$("#vote_2").click (function () {
				$(".rating").load("http://sparklemon.com/php/rating.php?resource_id="+resource_id+"&vote=2", function() {
					$("#show_vote").fadeIn();
				});
			});
			$("#vote_3").click (function () {
				$(".rating").load("http://sparklemon.com/php/rating.php?resource_id="+resource_id+"&vote=3", function() {
					$("#show_vote").fadeIn();
				});
			});
			$("#vote_4").click (function () {
				$(".rating").load("http://sparklemon.com/php/rating.php?resource_id="+resource_id+"&vote=4", function() {
					$("#show_vote").fadeIn();
				});
			});
			$("#vote_5").click (function () {
				$(".rating").load("http://sparklemon.com/php/rating.php?resource_id="+resource_id+"&vote=5", function() {
					$("#show_vote").fadeIn();
				});
			});
		}
	});
});

