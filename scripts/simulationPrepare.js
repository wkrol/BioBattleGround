$("#simulationPage").ready(function(){
	
	$("#addEnemyButton").click(function(){
		
		var selected = $("#enemyOrganisms > option:selected");
		$(".enemyField:first[id=\"\"]").html(selected.html());
		$(".enemyField:first[id=\"\"]").attr('id', selected.val());
	
		selected.remove();
		
	});
	
});