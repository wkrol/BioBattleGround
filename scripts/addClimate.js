$("#addClimatePage").ready(function(){
	
	$("#addClimate").click(function(){ checkClimate() });
});

function checkClimate(){
		
	if( $("#sun").val() == "Wybierz:" || $("#rain").val() == "Wybierz:" || $("wind").val() == "Wybierz:" ){
		alert("Ustaw wszystkie cechy klimatu!");
	} else if($("#climateName").val() == "" ){
		alert("Podaj nazwę klimatu");
	} else
		sendClimate();
}

function sendClimate(){
	
	var climateName = $("#climateName").val();
	
	var sunX=null;
	var rainX=null;
	var windX=null;
	
	switch( $("#sun").val() ){
		
		case "Bardzo niskie":
			sunX = 1;
			break;
		
		case "Niskie":
			sunX = 2;
			break;
			
		case "Średnie":
			sunX = 3;
			break;
			
		case "Wysokie":
			sunX = 4;
			break;
		
		case "Bardzo wysokie":
			sunX = 5;
			break;
	
		}
		
	switch( $("#rain").val() ){
		
		case "Brak":
			rainX = 1;
			break;
		
		case "Bardzo małe":
			rainX = 2;
			break;
			
		case "Małe":
			rainX = 3;
			break;
			
		case "Średnie":
			rainX = 4;
			break;
		
		case "Duże":
			rainX = 5;
			break;
	
		}
		
	switch( $("#wind").val() ){
		
		case "Brak":
			windX = 1;
			break;
		
		case "Słaby":
			windX = 2;
			break;
			
		case "Średni":
			windX = 3;
			break;
			
		case "Silny":
			windX = 4;
			break;
		
		case "Bardzo silny":
			windX = 5;
			break;
	
		}

	$.ajax({
		type: "get",
		url: "addclimate.php",
		data: { name: climateName, sun: sunX, rain: rainX, wind: windX },
		success: function(){ get("success.php") }
	});
}