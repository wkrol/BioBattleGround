$("#addOrganismPage").ready(function(){
		var hp = $("#hp");
		var instinct = $("#instinct");
		var toughness = $("#toughness");
		
		$("#addHP").click(function(){ add(hp) });
		$("#addInstinct").click(function(){ add(instinct) });
		$("#addToughness").click(function(){ add(toughness)});
		$("#substractHP").click(function(){ substract(hp) });
		$("#substractInstinct").click(function(){ substract(instinct) });
		$("#substractToughness").click(function(){ substract(toughness) });
		$("#createOrganism").click(function(){ checkOrganism() });
		$("#organismType").change(function(){ typeTooltip( $("#organismType > option:selected").html() ) });
		
		//TODO: mouseout nie dzia�a, tooltip nie znika po zjechaniu kursorem z elementu
		$("#hpField").mouseover(function(){ tooltipUp(hp) });
		$("#hpField").mouseout(function(){ tooltipDown() });
		$("#instinctField").mouseover(function(){ tooltipUp(instinct) });
		$("#instinctField").mouseout(function(){ tooltipDown() });
		$("#toughnessField").mouseover(function(){ tooltipUp(toughness) });
		$("#toughnessField").mouseout(function(){ tooltipDown() });
});

function add(stat){

	var left = $("#left");

	if(left.val() > 0 && stat.val() < 8){
		var leftValue = left.val();
		var statValue = stat.val();
		leftValue--;
		statValue++;
		left.attr("value", leftValue);
		stat.attr("value", statValue);

	}
}

function substract(stat){

	var left = $("#left");
	
	if(left.val() < 10 && stat.val() > 1){
		var leftValue = left.val();
		var statValue = stat.val();
		leftValue++;
		statValue--;
		left.attr("value", leftValue);
		stat.attr("value", statValue);
	}
}

function typeTooltip(id){
	
	var typeTooltip = $("#typeTooltip");

	switch(id){
	
		case "Wybierz:":
			typeTooltip.attr("display","none");
			break;
		
		case "Roslina":
			typeTooltip.html("<h3>Rośliny</h3><img src=\"../../images/organism/roslina.png\"> <p>Organizmy, które potrzebują słońca i wody by przeżyć.</p><p>Są pokarmem dla roślinożerców</p><p><b>Umiejętność specjalna:</b> rozsiew</p>");
			typeTooltip.attr("display","block");
			break;
	
		case "Roslinozerca":
			typeTooltip.html("<h3>Roślinożercy</h3><img src=\"../../images/organism/roslinozerca.png\"> <p>Organizmy, które odżywiają się roślinami.</p><p>Są pokarmem dla mięsożerców</p><p><b>Umiejętność specjalna:</b> unik</p>");
			typeTooltip.attr("display","block");
			break;
			
		case "Miesozerca":
			typeTooltip.html("<h3>Mięsożercy</h3><img src=\"../../images/organism/mieso.png\"></img> <p>Organizmy, które odżywiają się roślinożercami.</p><p>Zabijają by przeżyć</p><p><b>Umiejętność specjalna:</b> atak</p>");
			typeTooltip.attr("display","block");
			break;
		
		case "Padlinozerca":
			typeTooltip.html("<h3>Padlinożercy</h3><img src=\"../../images/organism/padlina.png\"> <p>Organizmy, które odżywiają się padliną.</p><p>Nie potrafią atakować</p><p><b>Umiejętność specjalna:</b> węch</p>");
			typeTooltip.attr("display","block");
			break;	
	}

}

function checkOrganism(){
	
	var left = $("#left");
	var name = $("#organismName");
	var type = $("#organismType");
	
	if(left.val() > 0)
		alert("Rozdysponuj wszystkie punkty");
	else if(name.val() == "")
		alert("Podaj nazwe organizmu");
	else if(type.val() == "Wybierz:")
		alert("Wybierz typ organizmu");
	else
		sendOrganism();
}

function sendOrganism(){
	
	var hp = $("#hp").val();
	var instinct = $("#instinct").val();
	var toughness = $("#toughness").val();
	var name = $("#organismName").val();
	var type = $("#organismType").val();
	
	$.ajax({
		type: "get",
		url: "addorganism.php",
		data: {name: name, stat1: hp, stat2: instinct, stat3: toughness, type: type},
		success: function() { get("success.php") }
	});

}