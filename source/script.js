window.onload = init;

function init(){
	
	if(document.getElementById("addOrganismPage")){
			var hp = document.getElementById("hp");
			var instinct = document.getElementById("instinct");
			var toughness = document.getElementById("toughness");
			var addInstinct = document.getElementById("addInstinct");
			var addToughness = document.getElementById("addToughness");
			var addHP = document.getElementById("addHP");
			var substractHP  = document.getElementById("substractHP");
			var substractInstinct = document.getElementById("substractInstinct");
			var substractToughness = document.getElementById("substractToughness");
			var select = document.getElementById("organismType");
			var createButton = document.getElementById("createOrganism");
			
			addEventHandler(addHP, "click", function(){ add(hp); });
			addEventHandler(addInstinct, "click", function(){ add(instinct); });
			addEventHandler(addToughness, "click", function(){ add(toughness); });
			addEventHandler(substractHP, "click", function(){ substract(hp); });
			addEventHandler(substractInstinct, "click", function(){ substract(instinct); });
			addEventHandler(substractToughness, "click", function(){ substract(toughness); });
			addEventHandler(createButton, "click", checkOrganism);
			addEventHandler(select, "change", function(){ typeTooltip(select.value); });
			
			var field = document.getElementsByTagName("p");
			
				addEventHandler(field[2], "mouseover", function(){tooltipUp(hp);});
				addEventHandler(field[2], "mouseout", function(){tooltipDown();});
				
				addEventHandler(field[3], "mouseover", function(){tooltipUp(instinct);});
				addEventHandler(field[3], "mouseout", function(){tooltipDown();});
				
				addEventHandler(field[4], "mouseover", function(){tooltipUp(toughness);});
				addEventHandler(field[4], "mouseout", function(){tooltipDown();});
			
		}
		
		if(document.getElementById("addClimatePage")){
			
			var createButton = document.getElementById("addClimate");
			addEventHandler(createButton, "click", checkClimate);
		}
		
		/*if(document.getElementById("logowanie")){
			
			var createButton = document.getElementById("login");
			addEventHandler(createButton, "click", checkLogin);
		}*/
		
		if(document.getElementById("addMapPage")){
			
			var steppe = document.getElementById("steppe");
			var swamp = document.getElementById("swamp");
			var desert = document.getElementById("desert");
			var forest = document.getElementById("forest");
			var mountain = document.getElementById("mountain");
			var hill = document.getElementById("hill");
			var river = document.getElementById("river");
			
			var steppeUp = document.getElementById("steppeUp");
			var steppeDown = document.getElementById("steppeDown");
			var swampUp = document.getElementById("swampUp");
			var swampDown = document.getElementById("swampDown");
			var desertUp = document.getElementById("desertUp");
			var desertDown = document.getElementById("desertDown");
			var mountainUp = document.getElementById("mountainUp");
			var mountainDown = document.getElementById("mountainDown");
			var forestUp = document.getElementById("forestUp");
			var forestDown = document.getElementById("forestDown");
			var hillUp = document.getElementById("hillUp");
			var hillDown = document.getElementById("hillDown");
			var riverUp = document.getElementById("riverUp");
			var riverDown = document.getElementById("riverDown");
			
				addEventHandler(steppeDown, "click", function(){ terrainDown(steppe); });
				addEventHandler(steppeUp, "click", function(){ terrainUp(steppe); });
				addEventHandler(swampDown, "click", function(){ terrainDown(swamp); });
				addEventHandler(swampUp, "click", function(){ terrainUp(swamp); });
				addEventHandler(desertDown, "click", function(){ terrainDown(desert); });
				addEventHandler(desertUp, "click", function(){ terrainUp(desert); });
				addEventHandler(mountainDown, "click", function(){ terrainDown(mountain); });
				addEventHandler(mountainUp, "click", function(){ terrainUp(mountain); });
				addEventHandler(forestDown, "click", function(){ terrainDown(forest); });
				addEventHandler(forestUp, "click", function(){ terrainUp(forest); });
				addEventHandler(hillDown, "click", function(){ terrainDown(hill); });
				addEventHandler(hillUp, "click", function(){ terrainUp(hill); });
				addEventHandler(riverDown, "click", function(){ terrainDown(river); });
				addEventHandler(riverUp, "click", function(){ terrainUp(river); });
			
			var field = document.getElementsByTagName("p");
				
				addEventHandler(field[1], "mouseover", function(){tooltipUp(steppe);});
				addEventHandler(field[1], "mouseout", function(){tooltipDown();});
				
				addEventHandler(field[2], "mouseover", function(){tooltipUp(swamp);});
				addEventHandler(field[2], "mouseout", function(){tooltipDown();});
				
				addEventHandler(field[3], "mouseover", function(){tooltipUp(desert);});
				addEventHandler(field[3], "mouseout", function(){tooltipDown();});
				
				addEventHandler(field[4], "mouseover", function(){tooltipUp(forest);});
				addEventHandler(field[4], "mouseout", function(){tooltipDown();});
				
				addEventHandler(field[5], "mouseover", function(){tooltipUp(mountain);});
				addEventHandler(field[5], "mouseout", function(){tooltipDown();});
				
				addEventHandler(field[6], "mouseover", function(){tooltipUp(hill);});
				addEventHandler(field[6], "mouseout", function(){tooltipDown();});
				
				addEventHandler(field[7], "mouseover", function(){tooltipUp(river);});
				addEventHandler(field[7], "mouseout", function(){tooltipDown();});
				
			
			var createButton = document.getElementById("addMap");
				addEventHandler(createButton, "click", checkMap);
		
		}
		
		
		var startButton = document.getElementById("startSimulate");
		addEventHandler(startButton, "click", startSimulation);

		
}


function showContent(response){
		
		var content = document.getElementById("content");
		content.innerHTML = response;
		
		if(document.getElementById("singleSimContent")){
			var start = document.getElementById("startSimulation");
			var url = "startSim.php";
			addEventHandler(start, "click", function(){ get(url); });
		}
		
		if(document.getElementById("organismPageContent")){
			var addOrg = document.getElementById("addOrganism");
			var url = "addOrganism.html";
			addEventHandler(addOrg , "click", function(){ get(url); });
			
			request = createRequest();
			if(!request)
				alert("request error");
			
			var cos = document.getElementById("zzz");
			var urlSend = "getOrganism.php";
			request.open("GET", urlSend, true);
			request.onreadystatechange = function(){test(cos);};
			request.send(null);
		}
		
		if(document.getElementById("startContent")){
			var createButton = document.getElementById("profileButton");
			var profileName = document.getElementById("profileName");
			addEventHandler(createButton, "click", function(){createProfile(profileName.value);});
		
		}
		
		if(document.getElementById("mapPageContent")){
			var addMap = document.getElementById("addMap");
			var url = "addMap.html";
			addEventHandler(addMap , "click", function(){ get(url); });
		}
		
		if(document.getElementById("climatePageContent")){
			var addClimate = document.getElementById("addClimate");
			var url = "addClimate.html";
			addEventHandler(addClimate , "click", function(){ get(url); });
		}
		
		
		if(document.getElementById("simStartContent")){
			var td = document.getElementsByTagName("td");
			var tooltip = document.getElementById("simTooltip");
			for(var i=0; i < td.length; i++){
				addEventHandler(td[i], "mouseover", function(){ tooltip.innerHTML = "<h3>Przykładowe okno</h3> <p><img src=\" images/climate/slonce.png \"></img> value</p> <p><img src=\" images/climate/opady.png \"></img> value</p> <p><img src=\" images/climate/wiatr.png \"></img> value</p>";
				tooltip.style.display="block";});
				addEventHandler(td[i], "mouseout", function(){ tooltip.style.display="none"; });
			}
		}
		
		
}

function createProfile(name){

	request = createRequest();
	if(!request)
		alert("request error");
	
	var url = "profileHandler.php?name="+name;
	request.open("GET", url, true);
	request.onreadystatechange = welcome;
	request.send(null);
	
}

function welcome(){
	var profile = document.getElementById("profile");
	if(request.readyState == 4 && request.status == 200){
		profile.innerHTML = "Witaj <b>" +request.responseText+"</b>!";
		var links = document.getElementsByTagName("a");
		for(var i=0;i<links.length;i++){
			links[i].style.display="inline";
		}
	}
}

function add(stat){
	var left = document.getElementById("left");
	
	if(left.value > 0 && stat.value < 8){	
		left.value--;
		stat.value++;
		}
	stat.value.innerHTML = stat.value;
	left.value.innerHTML = left.value;
}

function substract(stat){
	var left = document.getElementById("left");

	if(left.value < 10 && stat.value > 1){
		left.value++;
		stat.value--;
		}
	stat.value.innerHTML = stat.value;
	left.value.innerHTML = left.value;
}

function tooltipUp(obj){

	var tooltip = document.getElementById("tooltip");
	
	switch(obj.id){
	
		case "hp":
			tooltip.innerHTML = "<h4>Punkty życia</h4><p>Cecha odpowiedzialna za liczbę punktów życia organizmu. Im wyższa tym więcej obrażeń może przyjąć organizm, nim umrze.</p>";
			break;
		case "instinct":
			tooltip.innerHTML = "<h4>Instynkt</h4><p>Cecha odpowiedzialna za siłe umiejętności specjalnych danego typu organizmu</p>";
			break;
		case "toughness":
			tooltip.innerHTML = "<h4>Odporność</h4><p>Cecha odpowiedzialna za wytrzymałość organizmu w trudnych warunkach.</p><p> Do takich zaliczają się<ul><li>niesprzyjające warunki pogodowe</li><li>trudny teren</li><li>bycie ofiarą czyjegoś ataku</li></ul></p>";
			break;
		case "steppe":
			tooltip.innerHTML = "<h4>Step</h4><p>Opis terenu: </p>";
			break;
		case "swamp":
			tooltip.innerHTML = "<h4>Bagno</h4><p>Opis terenu: </p>";
			break;
		case "desert":
			tooltip.innerHTML = "<h4>Pustynia</h4><p>Opis terenu: </p>";
			break;
		case "forest":
			tooltip.innerHTML = "<h4>Las</h4><p>Opis terenu: </p>";
			break;
		case "mountain":
			tooltip.innerHTML = "<h4>Góry</h4><p>Opis terenu: </p>";
			break;
		case "hill":
			tooltip.innerHTML = "<h4>Wzgórza</h4><p>Opis terenu: </p>";
			break;
		case "river":
			tooltip.innerHTML = "<h4>Rzeka</h4><p>Opis terenu: </p>";
			break;
		}
	tooltip.style.display="block";
}

function tooltipDown(){
	var tooltip = document.getElementById("tooltip");
	tooltip.style.display="none";
}

function typeTooltip(id){
	
	var typeTooltip = document.getElementById("typeTooltip");
	
	switch(id){
	
		case "Wybierz:":
			typeTooltip.style.display="none";
			break;
		
		case "Roslina":
			typeTooltip.innerHTML="<h3>Rośliny</h3><img src=\"images/organism/roslina.png\"> <p>Organizmy, które potrzebują słońca i wody by przeżyć.</p><p>Są pokarmem dla roślinożerców</p><p><b>Umiejętność specjalna:</b> rozsiew</p>";
			typeTooltip.style.display="block";
			break;
	
		case "Roslinozerca":
			typeTooltip.innerHTML="<h3>Roślinożercy</h3><img src=\"images/organism/roslinozerca.png\"> <p>Organizmy, które odżywiają się roślinami.</p><p>Są pokarmem dla mięsożerców</p><p><b>Umiejętność specjalna:</b> unik</p>";
			typeTooltip.style.display="block";
			break;
			
		case "Miesozerca":
			typeTooltip.innerHTML="<h3>Mięsożercy</h3><img src=\"images/organism/mieso.png\"></img> <p>Organizmy, które odżywiają się roślinożercami.</p><p>Zabijają by przeżyć</p><p><b>Umiejętność specjalna:</b> atak</p>";
			typeTooltip.style.display="block";
			break;
		
		case "Padlinozerca":
			typeTooltip.innerHTML="<h3>Padlinożercy</h3><img src=\"images/organism/padlina.png\"> <p>Organizmy, które odżywiają się padliną.</p><p>Nie potrafią atakować</p><p><b>Umiejętność specjalna:</b> węch</p>";
			typeTooltip.style.display="block";
			break;	
	}

}

function test(div){
	if(request.readyState == 4 && request.status == 200){
		var tr = document.createElement("tr");
		var td = document.createElement("td");
		//td.innerHTML = "hej";
		//tr.appendChild(td);
		//div.appendChild(tr);
		
		//div.innerHTML = request.responseText;
		//tab = document.createElement("tr");
		//zzz.innerHTML = "<tr><td>czyżby?</td></tr>"
	}
}

function checkOrganism(){
	var left = document.getElementById("left");
	var name = document.getElementById("organismName");
	var type = document.getElementById("organismType");
	
	if(left.value > 0)
		alert("Rozdysponuj wszystkie punkty");
	else if(name.value == "")
		alert("Podaj nazwe organizmu");
	else if(type.value == "Wybierz:")
		alert("Wybierz typ organizmu!");
	else
		sendOrganism();
}

function sendOrganism(){
	var hp = document.getElementById("hp").value;
	var instinct = document.getElementById("instinct").value;
	var toughness = document.getElementById("toughness").value;
	var name = document.getElementById("organismName").value;
	var type = document.getElementById("organismType").value;
	
	request = createRequest();
	if(!request)
		alert("request error");
		
	var url = "addorganism.php?name="+name+"&stat1="+hp+"&stat2="+instinct+"&stat3="+toughness+"&type="+type;

	request.open("GET", url, true);
	request.onreadystatechange = function() {get("success.php");};
	request.send(null);
}


function checkLogin(){
	var nazwa_uz = document.getElementById("nazwa_uz");
	var haslo = document.getElementById("haslo");
	
	if(nazwa_uz.value == "")
		alert("Podaj login");
	else if(haslo.value == "")
		alert("Podaj haslo");
	else
		sendLogin();
}

function sendLogin(){
	var nazwa_uz = document.getElementById("nazwa_uz");
	var haslo = document.getElementById("haslo");
	
	request = createRequest();
	if(!request)
		alert("request error");
		
	var url = "logowanie.php?akcja=loguj&nazwa_uz="+nazwa_uz+"&haslo="+haslo;

	request.open("GET", url, true);
	request.onreadystatechange = function(){ get("success.php");};
	request.send(null);
}

function getInfo(){
	if(request.readyState == 4 && request.status == 200){
		alert("hello");
		}
}


function checkClimate(){
	var sun = document.getElementById("sun");
	var rain = document.getElementById("rain");
	var wind = document.getElementById("wind");
	var climateName = document.getElementById("climateName");
	
	if(sun.value == "Wybierz:" || rain.value == "Wybierz:" || wind.value == "Wybierz:"){
		alert("Ustaw wszystkie cechy klimatu!");
		}
	else if(climateName.value == ""){
		alert("Podaj nazwę klimatu");
		}
	else
		sendClimate();
}

function sendClimate(){
	
	var sun = document.getElementById("sun");
	var rain = document.getElementById("rain");
	var wind = document.getElementById("wind");
	var climateName = document.getElementById("climateName").value;
	var sunX=null;
	var rainX=null;
	var windX=null;
	
	switch(sun.value){
		
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
		
	switch(rain.value){
		
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
		
	switch(wind.value){
		
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
		
	request = createRequest();
	if(!request)
		alert("request error");
		
	var url = "addclimate.php?name="+climateName+"&sun="+sunX+"&rain="+rainX+"&wind="+windX;
	request.open("GET", url, true);
	request.onreadystatechange = function() {get("success.php"); };
	request.send(null);
}

function terrainUp(type){

	var string = type.value;
	var number = parseInt(string);
	
	if(number < 100){
		number+=10;
	}
	
	
	type.value = number + "%";
 }
function terrainDown(type){

	var string = type.value;
	var number = parseInt(string);
	
	if(number > 10)
		number-=10;
	
	type.value = number + "%";


}

function checkMap(){
	var mapName = document.getElementById("mapName");

	if(mapName.value == "")
		alert("Podaj nazwe mapy");
	else
		sendMap();
	
}

function sendMap(){
	var name = document.getElementById("mapName").value;
	var steppe = parseInt(document.getElementById("steppe").value)/10;
	var swamp = parseInt(document.getElementById("swamp").value)/10;
	var desert = parseInt(document.getElementById("desert").value)/10;
	var forest = parseInt(document.getElementById("forest").value)/10;
	var mountain = parseInt(document.getElementById("mountain").value)/10;
	var hill = parseInt(document.getElementById("hill").value)/10;
	var river = parseInt(document.getElementById("river").value)/10;
	
	request = createRequest();
	if(!request)
		alert("request error");
		
	var url = "addmap.php?name="+name+"&t1="+steppe+"&t2="+swamp+"&t3="+desert+"&t4="+forest+"&t5="+mountain+"&t6="+hill+"&t7="+river;
	request.open("GET", url, true);
	request.onreadystatechange = function() {get("success.php");};
	request.send(null);
			
}

function startSimulation(){

	var request = createRequest();
	if(!request)
		alert("request error");
	
	var roslina = document.getElementById("organismroslinaSelect").value;
	var roslinozerca = document.getElementById("organismroslinozercaSelect").value;
	var miesozerca = document.getElementById("organismmiesozercaSelect").value;
	var padlinozerca = document.getElementById("organismpadlinozercaSelect").value;
	var mapa = document.getElementById("mapSelect").value;
	var klimat = document.getElementById("climateSelect").value;	
	
	var url = "symulacjaStart.php?roslina="+roslina+"&roslinozerca="+roslinozerca+"&miesozerca="+miesozerca+"&padlinozerca="+padlinozerca+"&mapa="+mapa+"&klimat="+klimat;
	
	request.open("GET",url,true);
	request.onreadystatechange = function() { if(request.readyState == 4 && request.status == 200)
																								get("start.php");
																						};
	request.send(null);

	}

function get(url){

	request = createRequest();
	if(!request)
		alert("request error");
		
	request.open("GET",url,true);
	request.onreadystatechange = function() { if(request.readyState == 4 && request.status == 200){
												var response = request.responseText;
												showContent(response); 
												}};
	request.send(null);



}


//Obsługa event
function addEventHandler(obj, eventName, handler) {
	if(document.attachEvent)
		obj.attachEvent("on" + eventName, handler);
	else if(document.addEventListener) {
		obj.addEventListener(eventName, handler, false);
	}
}

function AddEventListener(a,b,c,d){
        if(a.addEventListener) a.addEventListener(b,c,d);
        else if(a.attachEvent) a.attachEvent("on"+b,c)
}

//Obsługa request
function createRequest(){
	
	try {
		request = new XMLHttpRequest();
	} catch (tryMS) {
		try {
			request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch(otherMS) {
				try {
				request = new ActiveXObject("Microsoft.XMLHTTP");
				} catch(failed){
					request = null;
				}
			}
		}
	return request;
}