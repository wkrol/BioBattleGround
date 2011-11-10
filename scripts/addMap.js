$("#addMapPage").ready(function() {
	var steppe = $("#steppe");
	var swamp = $("#swamp");
	var desert = $("#desert");
	var forest = $("#forest");
	var mountain = $("#mountain");
	var hill = $("#hill");
	var river = $("#river");
	
	$("#steppeDown").click(function(){ terrainDown(steppe) }); 
	$("#steppeUp").click(function(){ terrainUp(steppe) });
	$("#swampDown").click(function(){ terrainDown(swamp) }); 
	$("#swampUp").click(function(){ terrainUp(swamp) });
	$("#desertDown").click(function(){ terrainDown(desert) }); 
	$("#desertUp").click(function(){ terrainUp(desert) });
	$("#forestDown").click(function(){ terrainDown(forest) }); 
	$("#forestUp").click(function(){ terrainUp(forest) });
	$("#mountainDown").click(function(){ terrainDown(mountain) }); 
	$("#mountainUp").click(function(){ terrainUp(mountain) });
	$("#hillDown").click(function(){ terrainDown(hill) }); 
	$("#hillUp").click(function(){ terrainUp(hill) });
	$("#riverDown").click(function(){ terrainDown(river) }); 
	$("#riverUp").click(function(){ terrainUp(river) });
	
	//TODO: mouseout nie dzia³a, tooltip nie znika po zjechaniu kursorem z elementu
	$("#steppeField").mouseover(function(){ tooltipUp(steppe) });
	$("#steppeField").mouseout(function(){ tooltipDown() });
	$("#swampField").mouseover(function(){ tooltipUp(swamp) });
	$("#swampField").mouseout(function(){ tooltipDown() });
	$("#desertField").mouseover(function(){ tooltipUp(desert) });
	$("#desertField").mouseout(function(){ tooltipDown() });
	$("#forestField").mouseover(function(){ tooltipUp(forest) });
	$("#forestField").mouseout(function(){ tooltipDown() });
	$("#mountainField").mouseover(function(){ tooltipUp(mountain) });
	$("#mountainField").mouseout(function(){ tooltipDown() });
	$("#hillField").mouseover(function(){ tooltipUp(hill) });
	$("#hillField").mouseout(function(){ tooltipDown() });
	$("#riverField").mouseover(function(){ tooltipUp(river) });
	$("#riverField").mouseout(function(){ tooltipDown() });

	$("#addMap").click(function(){ checkMap() });
	
});

function terrainUp(type){

	var string = type.val();
	var number = parseInt(string);
	
	if(number < 100){
		number+=10;
	}
	
	
	type.attr("value", number + "%");
 }

function terrainDown(type){

	var string = type.val();
	var number = parseInt(string);
	
	if(number > 10)
		number-=10;
	
	type.attr("value", number + "%");

}

function checkMap(){
	var mapName = $("#mapName");

	if(mapName.val() == "")
		alert("Podaj nazwe mapy");
	else
		sendMap();
	
}

function sendMap(){
	var name = $("#mapName").val();
	var steppe = parseInt($("#steppe").val())/10;
	var swamp = parseInt($("#swamp").val())/10;
	var desert = parseInt($("#desert").val())/10;
	var forest = parseInt($("#forest").val())/10;
	var mountain = parseInt($("#mountain").val())/10;
	var hill = parseInt($("#hill").val())/10;
	var river = parseInt($("#river").val())/10;
	
	$.ajax({
		type: "get",
		url: "addmap.php",
		data: { name: name, t1: steppe, t2: swamp, t3: desert, t4: forest, t5: mountain, t6: hill, t7: river },
		success: function() { get("success.php") }
	});
			
}