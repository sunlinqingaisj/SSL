// function checkcity(cityentered){
	// var xmlhttp;
	// if(window.XMLHttpRequest){
	// 	xmlhttp = new XMLHttpRequest();
	// }
	// xmlhttp.onreadystatechange = function(){
	// 	if(xmlhttp.readyState==4 && xmlhttp.status==200){
	// 		document.getElementById('cityresponse').innerHTML = xmlhttp.responseText;
	// 	}
	// }
	// xmlhttp.open("GET", "cityresponse.PHP?cityget=" + cityentered, true);
	// xmlhttp.send();

// }
// checkcity(cityentered);
$(function(){
	var nm;
	$.ajax({
		type: "GET",
		url: 'city.xml',
		dataType: 'xml',
		success: function(xml){
			var xmlDoc = $.parseXML(xml);
			$(xmlDoc).find('city').each(function(){
				nm = $(this).text()
				$('#temp').html(nm);
				$( "#birds" ).autocomplete({
						source: data,
						minLength: 0,
						// select: function( event, ui ) {
						// log( ui.item ?
						// "Selected: " + ui.item.value + ", geonameId: " + ui.item.id :
						// "Nothing selected, input was " + this.value );
						// }
					});
			}
		}
	})
})
