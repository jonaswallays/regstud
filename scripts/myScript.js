
$(document).ready(function(){           
   getStudents();
   function getStudents(){
                            $( "#loading" ).attr('src', 'images/ajax-loader.gif');
                            $.getJSON("service.php?action=getStudents", function(json) {
                                if (json.studs.length > 0) {
		$('#overview_table tr').remove();       
		var vnr = 1;
                                            var oldfact = ''
		$.each(json.studs,function() {
			if (oldfact !== this['fac']) vnr = 1;
                                                                  var row = '<tr class="nr"><td>'+vnr+ '.</td><td>' +this['fac'] + '</td><td>' +this['opl'] + '</td><td>' +this['keuze'] + '</td><td>' +this['naam'] + '  ' +  this['voornaam']+ '</td><td>' +  this['email']  +'</td><td></td></tr>';
			$(row).appendTo('#overview_table');
                                                                  oldfact = this['fac'];
			vnr++;
		}); 
                                }
                            });
                            $( "#loading" ).attr('src', 'images/refresh.png');
}
$('#btnRegistreer').click(function() {
                      $( "#loadingPU" ).show(); 
                      var data = $(":input").serializeArray();
	$.post('service.php', data, function(json){ 	
                                if (json.status === "fail") {   
                                            $( "#loadingPU" ).hide(); 
                                            $( "#contentpopup" ).html("<p>"+json.message+"</p>");
		$( "#message" ).popup('open');
                                }
                                if (json.status === "success") { 
                                            $( "#loadingPU" ).hide(); 
                                            $( "#contentpopup" ).html("<p>"+json.message+"</p>");
		$( "#message" ).popup('open');																	clearInput();       
                                }                      
    }, "json");
});
		
function clearInput(){
    $("#fname").val('');
    $("#name").val('');
    $("#email").val('');
    $("#straat").val('');
    $("#pc").val('');
    $("#gemeente").val('');
				//$("pageFBO").load();
    $("#pageFBO :checkbox,#pageFMW :checkbox,#pageFNT :checkbox,#pageSOA :checkbox").attr("checked",false).checkboxradio("refresh");
    $('#UMUkeuzes').hide();
    $('#SMUkeuzes').hide();
    $('#VRKkeuzes').hide();
    $('#GROkeuzes').hide();
}
$('#UMU').change(function() {
     $('#UMUkeuzes').slideToggle(function() {  
	 if (!$('#UMU').attr("checked")) $("#KMU,#JPM").attr("checked",false).checkboxradio("refresh");                                  
     }); 
});
$('#SMU').change(function() {
    $('#SMUkeuzes').slideToggle(function() {  
	 if (!$('#SMU').attr("checked")) $("#CMU,#MUP").attr("checked",false).checkboxradio("refresh");
    });
});
$('#VRK').change(function() {
    $('#VRKkeuzes').slideToggle(function() {  
	 if (!$('#VRK').attr("checked"))  $("#SCK,#BHK,#TEK,#BEI,#MEK").attr("checked",false).checkboxradio("refresh");
    });          
});
$('#GRO').change(function() {
    $('#GROkeuzes').slideToggle(function() {  
	if (!$('#GRO').attr("checked")) $("#GRA,#GRV,#WID,#ILL").attr("checked",false).checkboxradio("refresh");
    });           
});
});