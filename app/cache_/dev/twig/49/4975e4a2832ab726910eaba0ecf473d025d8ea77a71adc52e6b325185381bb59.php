<?php

/* BaseBundle:Cruise:modal-zayavka-form.html.twig */
class __TwigTemplate_b3915031a9939e11bb88816cf7d55ff5b83244d03708ba5a809c66c5cfa59c26 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_890429cd8977d191bee9dd601a238c566d82b592448b0ad1dd035bf050961e50 = $this->env->getExtension("native_profiler");
        $__internal_890429cd8977d191bee9dd601a238c566d82b592448b0ad1dd035bf050961e50->enter($__internal_890429cd8977d191bee9dd601a238c566d82b592448b0ad1dd035bf050961e50_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BaseBundle:Cruise:modal-zayavka-form.html.twig"));

        // line 1
        echo "
<script>
\$(document).ready(function(){

  \$(\".modal-zayavka\").click(function() {
    \$(\"#modal-zayavka\").modal('show');
\tvar text = '';//'<b>'+\$(this).parent().parent().children().filter(':nth-child(3)').text()+'</b>';
\ttext +='  ('+ \$(this).parent().parent().children().filter(':nth-child(2)').text()+') ';
\ttext +=' <b>'+ \$(this).parent().parent().children().filter(':nth-child(1)').text()+'</b>';
    \$(\"#modal-zayavka .modal-body p.cruise\").html(text);
    \$('#modal-zayavka .modal-body input[name=\"code\"]').val(\$(this).attr('data-code'));
  });
  
  \$('#modal-zayavka-form').submit(function(){
 \t\tdata = \$(this).serialize() ;
\t\t
\t\t\$.ajax(\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("ajax_zayavka_send");
        echo "\", {   
\t\t  type: \"POST\",
\t\t  data: data,
\t\t  timeout: 5000,
\t\t  beforeSend: function(){
\t\t\t//\$(\"spisok_reysov\").stop().animate({opacity:0.3},100);
\t\t  }, 
\t\t  success: function(data, textStatus, jqXHR){
\t\t\t
\t\t\t\$(\"#modal-zayavka .modal-body\").html(data);

\t\t  },
\t\t  error: function(jqXHR, textStatus){
\t\t\t//\$(\"#modal-zayavka .modal-body\").html('<p>error</p>' +jqXHR.responseText);
\t\t  }
\t\t}); 
  
  return false;
  });

  
});
</script>

<div class=\"modal fade\" id=\"modal-zayavka\">
    <div class=\"modal-dialog modal-md\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button class=\"close\" data-dismiss=\"modal\" type=\"button\"></button>
                <h4 class=\"modal-title\">Заявка на круиз</h4>
            </div>
            <div class=\"modal-body\">
                <p class=\"cruise\"></p>
                <form id=\"modal-zayavka-form\" action=\"\">
                    <input name=\"code\" type=\"hidden\">
                    <div class=\"form-group\">
                        <label class=\"control-label required\" for=\"form_name\">Как Вас зовут</label> <input class=\"form-control\" id=\"form_name\" name=\"name\" required=\"required\" type=\"text\">
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label required\" for=\"form_phone\">Телефон</label> <input class=\"form-control\" id=\"form_phone\" name=\"phone\" required=\"required\" type=\"text\">
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label required\" for=\"form_email\">Email</label> <input class=\"form-control\" id=\"form_email\" name=\"email\" type=\"text\">
                    </div>
                    <div class=\"form-group\">
                        <textarea class=\"form-control custom-control\" name=\"comment\" placeholder=\"Пожелания, если имеются\"></textarea>
                    </div><input class=\"btn btn-success\" type=\"submit\">
                </form>
            </div>
            <div class=\"modal-footer\">
                <button class=\"btn btn-danger\" data-dismiss=\"modal\" type=\"button\">Закрыть окно</button>
            </div>
        </div>
    </div>
</div>";
        
        $__internal_890429cd8977d191bee9dd601a238c566d82b592448b0ad1dd035bf050961e50->leave($__internal_890429cd8977d191bee9dd601a238c566d82b592448b0ad1dd035bf050961e50_prof);

    }

    public function getTemplateName()
    {
        return "BaseBundle:Cruise:modal-zayavka-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 17,  22 => 1,);
    }
}
/* */
/* <script>*/
/* $(document).ready(function(){*/
/* */
/*   $(".modal-zayavka").click(function() {*/
/*     $("#modal-zayavka").modal('show');*/
/* 	var text = '';//'<b>'+$(this).parent().parent().children().filter(':nth-child(3)').text()+'</b>';*/
/* 	text +='  ('+ $(this).parent().parent().children().filter(':nth-child(2)').text()+') ';*/
/* 	text +=' <b>'+ $(this).parent().parent().children().filter(':nth-child(1)').text()+'</b>';*/
/*     $("#modal-zayavka .modal-body p.cruise").html(text);*/
/*     $('#modal-zayavka .modal-body input[name="code"]').val($(this).attr('data-code'));*/
/*   });*/
/*   */
/*   $('#modal-zayavka-form').submit(function(){*/
/*  		data = $(this).serialize() ;*/
/* 		*/
/* 		$.ajax("{{path('ajax_zayavka_send')}}", {   */
/* 		  type: "POST",*/
/* 		  data: data,*/
/* 		  timeout: 5000,*/
/* 		  beforeSend: function(){*/
/* 			//$("spisok_reysov").stop().animate({opacity:0.3},100);*/
/* 		  }, */
/* 		  success: function(data, textStatus, jqXHR){*/
/* 			*/
/* 			$("#modal-zayavka .modal-body").html(data);*/
/* */
/* 		  },*/
/* 		  error: function(jqXHR, textStatus){*/
/* 			//$("#modal-zayavka .modal-body").html('<p>error</p>' +jqXHR.responseText);*/
/* 		  }*/
/* 		}); */
/*   */
/*   return false;*/
/*   });*/
/* */
/*   */
/* });*/
/* </script>*/
/* */
/* <div class="modal fade" id="modal-zayavka">*/
/*     <div class="modal-dialog modal-md">*/
/*         <div class="modal-content">*/
/*             <div class="modal-header">*/
/*                 <button class="close" data-dismiss="modal" type="button"></button>*/
/*                 <h4 class="modal-title">Заявка на круиз</h4>*/
/*             </div>*/
/*             <div class="modal-body">*/
/*                 <p class="cruise"></p>*/
/*                 <form id="modal-zayavka-form" action="">*/
/*                     <input name="code" type="hidden">*/
/*                     <div class="form-group">*/
/*                         <label class="control-label required" for="form_name">Как Вас зовут</label> <input class="form-control" id="form_name" name="name" required="required" type="text">*/
/*                     </div>*/
/*                     <div class="form-group">*/
/*                         <label class="control-label required" for="form_phone">Телефон</label> <input class="form-control" id="form_phone" name="phone" required="required" type="text">*/
/*                     </div>*/
/*                     <div class="form-group">*/
/*                         <label class="control-label required" for="form_email">Email</label> <input class="form-control" id="form_email" name="email" type="text">*/
/*                     </div>*/
/*                     <div class="form-group">*/
/*                         <textarea class="form-control custom-control" name="comment" placeholder="Пожелания, если имеются"></textarea>*/
/*                     </div><input class="btn btn-success" type="submit">*/
/*                 </form>*/
/*             </div>*/
/*             <div class="modal-footer">*/
/*                 <button class="btn btn-danger" data-dismiss="modal" type="button">Закрыть окно</button>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
