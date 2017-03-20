$("#sub").click( function() {
 $.post( $("#add").attr("action"), 
         $("#add :input").serializeArray(), 
         function(info){ $("#result").html(info); 
   });
 clearInput();
});
 
$("#add").submit( function() {
  return false;	
});
 
function clearInput() {
	$("#add :input").each( function() {
	   $(this).val('');
	});
}