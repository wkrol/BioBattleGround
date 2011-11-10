function get(url){

	$.ajax({
		type: "post",
		url: url,
		success: function(response){
			showContent(response);
		}
	});


}

function showContent(response){
	
	var content = $("#content");
	content.html(response);
}

function tooltipUp(obj){

	var tooltip = $("#tooltip");
	switch(obj.attr("id")){
	
		case "hp":
			tooltip.html("<h4>Punkty życia</h4><p>Cecha odpowiedzialna za liczbę punktów życia organizmu. Im wyższa tym więcej obrażeń może przyjąć organizm, nim umrze.</p>");
			break;
		case "instinct":
			tooltip.html("<h4>Instynkt</h4><p>Cecha odpowiedzialna za siłe umiejętności specjalnych danego typu organizmu</p>");
			break;
		case "toughness":
			tooltip.html("<h4>Odporność</h4><p>Cecha odpowiedzialna za wytrzymałość organizmu w trudnych warunkach.</p><p> Do takich zaliczają się<ul><li>niesprzyjające warunki pogodowe</li><li>trudny teren</li><li>bycie ofiarą czyjegoś ataku</li></ul></p>");
			break;
		case "steppe":
			tooltip.html("<h4>Step</h4><p>Opis terenu: </p>");
			break;
		case "swamp":
			tooltip.html("<h4>Bagno</h4><p>Opis terenu: </p>");
			break;
		case "desert":
			tooltip.html("<h4>Pustynia</h4><p>Opis terenu: </p>");
			break;
		case "forest":
			tooltip.html("<h4>Las</h4><p>Opis terenu: </p>");
			break;
		case "mountain":
			tooltip.html("<h4>Góry</h4><p>Opis terenu: </p>");
			break;
		case "hill":
			tooltip.html("<h4>Wzgórza</h4><p>Opis terenu: </p>");
			break;
		case "river":
			tooltip.html("<h4>Rzeka</h4><p>Opis terenu: </p>");
			break;
			
	}
	
	tooltip.attr("display","block");
}

function tooltipDown(){
	
	var tooltip = $("#tooltip");
	tooltip.attr("display","none");
}