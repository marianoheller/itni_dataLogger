<?php

/* datalogger_base.html.twig */
class __TwigTemplate_0e057e9be4599b898a59626999793e00eb6f46975a9c5dcfead1c2c04ffc3563 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'pageTitle' => array($this, 'block_pageTitle'),
            'tableTitle' => array($this, 'block_tableTitle'),
            'dataHead' => array($this, 'block_dataHead'),
            'dataBody' => array($this, 'block_dataBody'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0b444177dc8954a38b02a00567b709f8f48e09bc647e8224036778bf321ce135 = $this->env->getExtension("native_profiler");
        $__internal_0b444177dc8954a38b02a00567b709f8f48e09bc647e8224036778bf321ce135->enter($__internal_0b444177dc8954a38b02a00567b709f8f48e09bc647e8224036778bf321ce135_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "datalogger_base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\" >
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"initial-scale=1.0; maximum-scale=1.0; width=device-width;\">
    ";
        // line 6
        $this->displayBlock('pageTitle', $context, $blocks);
        // line 7
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "3a828ab_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a828ab_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/3a828ab_part_1_style_1.css");
            // line 8
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
        } else {
            // asset "3a828ab"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a828ab") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/3a828ab.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
        }
        unset($context["asset_url"]);
        // line 10
        echo "
</head>


<body>

    <div class=\"table-title\">
        ";
        // line 17
        $this->displayBlock('tableTitle', $context, $blocks);
        // line 18
        echo "    </div>

    <table class=\"table-fill\">
        <thead>
        ";
        // line 22
        $this->displayBlock('dataHead', $context, $blocks);
        // line 24
        echo "        </thead>

        <tbody class=\"table-hover\">
        ";
        // line 27
        $this->displayBlock('dataBody', $context, $blocks);
        // line 29
        echo "        </tbody>
    </table>
</body>
</html>
";
        
        $__internal_0b444177dc8954a38b02a00567b709f8f48e09bc647e8224036778bf321ce135->leave($__internal_0b444177dc8954a38b02a00567b709f8f48e09bc647e8224036778bf321ce135_prof);

    }

    // line 6
    public function block_pageTitle($context, array $blocks = array())
    {
        $__internal_7bf199386156abc56391d3bfedd8cbc4bc62db6efd704ae53629d206bdc311fd = $this->env->getExtension("native_profiler");
        $__internal_7bf199386156abc56391d3bfedd8cbc4bc62db6efd704ae53629d206bdc311fd->enter($__internal_7bf199386156abc56391d3bfedd8cbc4bc62db6efd704ae53629d206bdc311fd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageTitle"));

        echo " ";
        
        $__internal_7bf199386156abc56391d3bfedd8cbc4bc62db6efd704ae53629d206bdc311fd->leave($__internal_7bf199386156abc56391d3bfedd8cbc4bc62db6efd704ae53629d206bdc311fd_prof);

    }

    // line 17
    public function block_tableTitle($context, array $blocks = array())
    {
        $__internal_c8b3efc013cc5ea94c824a0f8c13b0782c2824233ba9c0cd8e33a1bcc843c14c = $this->env->getExtension("native_profiler");
        $__internal_c8b3efc013cc5ea94c824a0f8c13b0782c2824233ba9c0cd8e33a1bcc843c14c->enter($__internal_c8b3efc013cc5ea94c824a0f8c13b0782c2824233ba9c0cd8e33a1bcc843c14c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "tableTitle"));

        echo " ";
        
        $__internal_c8b3efc013cc5ea94c824a0f8c13b0782c2824233ba9c0cd8e33a1bcc843c14c->leave($__internal_c8b3efc013cc5ea94c824a0f8c13b0782c2824233ba9c0cd8e33a1bcc843c14c_prof);

    }

    // line 22
    public function block_dataHead($context, array $blocks = array())
    {
        $__internal_924abecc078143fd4e3d0ba5d092285e3d2efaecd12979f6777bc2b766025ad3 = $this->env->getExtension("native_profiler");
        $__internal_924abecc078143fd4e3d0ba5d092285e3d2efaecd12979f6777bc2b766025ad3->enter($__internal_924abecc078143fd4e3d0ba5d092285e3d2efaecd12979f6777bc2b766025ad3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataHead"));

        // line 23
        echo "        ";
        
        $__internal_924abecc078143fd4e3d0ba5d092285e3d2efaecd12979f6777bc2b766025ad3->leave($__internal_924abecc078143fd4e3d0ba5d092285e3d2efaecd12979f6777bc2b766025ad3_prof);

    }

    // line 27
    public function block_dataBody($context, array $blocks = array())
    {
        $__internal_5adf17dfcebcd06db752e7b419116019e25263ed2145ee1079bcca6774cd392b = $this->env->getExtension("native_profiler");
        $__internal_5adf17dfcebcd06db752e7b419116019e25263ed2145ee1079bcca6774cd392b->enter($__internal_5adf17dfcebcd06db752e7b419116019e25263ed2145ee1079bcca6774cd392b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataBody"));

        // line 28
        echo "        ";
        
        $__internal_5adf17dfcebcd06db752e7b419116019e25263ed2145ee1079bcca6774cd392b->leave($__internal_5adf17dfcebcd06db752e7b419116019e25263ed2145ee1079bcca6774cd392b_prof);

    }

    public function getTemplateName()
    {
        return "datalogger_base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 28,  128 => 27,  121 => 23,  115 => 22,  103 => 17,  91 => 6,  80 => 29,  78 => 27,  73 => 24,  71 => 22,  65 => 18,  63 => 17,  54 => 10,  40 => 8,  35 => 7,  33 => 6,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en" >*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">*/
/*     {% block pageTitle %} {% endblock %}*/
/*     {% stylesheets 'bundles/css/*' filter='cssrewrite' %}*/
/*     <link rel="stylesheet" href="{{ asset_url }}" />*/
/*     {% endstylesheets %}*/
/* */
/* </head>*/
/* */
/* */
/* <body>*/
/* */
/*     <div class="table-title">*/
/*         {% block tableTitle %} {% endblock %}*/
/*     </div>*/
/* */
/*     <table class="table-fill">*/
/*         <thead>*/
/*         {% block dataHead %}*/
/*         {% endblock %}*/
/*         </thead>*/
/* */
/*         <tbody class="table-hover">*/
/*         {% block dataBody %}*/
/*         {% endblock %}*/
/*         </tbody>*/
/*     </table>*/
/* </body>*/
/* </html>*/
/* */
