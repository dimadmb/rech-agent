$(document).ready(function(){$(".carousel").carousel({interval:5000});$("#form_days").slider({});$(".photo").fancybox()});$(document).ready(function(){$(".modal-zayavka").click(function(){$("#modal-zayavka").modal("show");var a="";a+="  ("+$(this).parent().parent().children().filter(":nth-child(2)").text()+") ";a+=" <b>"+$(this).parent().parent().children().filter(":nth-child(1)").text()+"</b>";$("#modal-zayavka .modal-body p.cruise").html(a);$('#modal-zayavka .modal-body input[name="code"]').val($(this).attr("data-code"))});$("#modal-zayavka-form").submit(function(){data=$(this).serialize();$.ajax("{{path('ajax_zayavka_send')}}",{type:"POST",data:data,timeout:5000,beforeSend:function(){},success:function(b,c,a){$("#modal-zayavka .modal-body").html(b)},error:function(a,b){}});return false})});