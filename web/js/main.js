	$(document).ready(function(){
		$('.carousel').carousel({
			interval: 5000 //changes the speed
		})
		$("#form_days").slider({});
		$('.photo').fancybox();
	});
	
	
$(document).ready(function(){

  $(".modal-zayavka").click(function() {
    $("#modal-zayavka").modal('show');
	var text = '';//'<b>'+$(this).parent().parent().children().filter(':nth-child(3)').text()+'</b>';
	text +='  ('+ $(this).parent().parent().children().filter(':nth-child(2)').text()+') ';
	text +=' <b>'+ $(this).parent().parent().children().filter(':nth-child(1)').text()+'</b>';
    $("#modal-zayavka .modal-body p.cruise").html(text);
    $('#modal-zayavka .modal-body input[name="code"]').val($(this).attr('data-code'));
  });
  
  $('#modal-zayavka-form').submit(function(){
 		data = $(this).serialize() ;
		
		$.ajax("{{path('ajax_zayavka_send')}}", {   
		  type: "POST",
		  data: data,
		  timeout: 5000,
		  beforeSend: function(){
			//$("spisok_reysov").stop().animate({opacity:0.3},100);
		  }, 
		  success: function(data, textStatus, jqXHR){
			
			$("#modal-zayavka .modal-body").html(data);

		  },
		  error: function(jqXHR, textStatus){
			//$("#modal-zayavka .modal-body").html('<p>error</p>' +jqXHR.responseText);
		  }
		}); 
  
  return false;
  });

  
});	
