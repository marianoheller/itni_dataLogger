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
        $__internal_e7ec0bbe4b36ea29bb150bab7eb45f3abcb151e8f6dc37ad4775692bb9c1166a = $this->env->getExtension("native_profiler");
        $__internal_e7ec0bbe4b36ea29bb150bab7eb45f3abcb151e8f6dc37ad4775692bb9c1166a->enter($__internal_e7ec0bbe4b36ea29bb150bab7eb45f3abcb151e8f6dc37ad4775692bb9c1166a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "datalogger_base.html.twig"));

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
        
        $__internal_e7ec0bbe4b36ea29bb150bab7eb45f3abcb151e8f6dc37ad4775692bb9c1166a->leave($__internal_e7ec0bbe4b36ea29bb150bab7eb45f3abcb151e8f6dc37ad4775692bb9c1166a_prof);

    }

    // line 6
    public function block_pageTitle($context, array $blocks = array())
    {
        $__internal_8cf519a0c4126a5c61f7b9bf101531801da766f4f99661bf76bbe1c958deafda = $this->env->getExtension("native_profiler");
        $__internal_8cf519a0c4126a5c61f7b9bf101531801da766f4f99661bf76bbe1c958deafda->enter($__internal_8cf519a0c4126a5c61f7b9bf101531801da766f4f99661bf76bbe1c958deafda_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageTitle"));

        echo " ";
        
        $__internal_8cf519a0c4126a5c61f7b9bf101531801da766f4f99661bf76bbe1c958deafda->leave($__internal_8cf519a0c4126a5c61f7b9bf101531801da766f4f99661bf76bbe1c958deafda_prof);

    }

    // line 17
    public function block_tableTitle($context, array $blocks = array())
    {
        $__internal_60bb5b29657e5732948156cd21d37938dab2cf29f34d8a90609266ec70874d38 = $this->env->getExtension("native_profiler");
        $__internal_60bb5b29657e5732948156cd21d37938dab2cf29f34d8a90609266ec70874d38->enter($__internal_60bb5b29657e5732948156cd21d37938dab2cf29f34d8a90609266ec70874d38_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "tableTitle"));

        echo " ";
        
        $__internal_60bb5b29657e5732948156cd21d37938dab2cf29f34d8a90609266ec70874d38->leave($__internal_60bb5b29657e5732948156cd21d37938dab2cf29f34d8a90609266ec70874d38_prof);

    }

    // line 22
    public function block_dataHead($context, array $blocks = array())
    {
        $__internal_f9fa8ab78e5c2ce7042085719970685d9af6cd14b187d5c2b4cad4a086e65eaa = $this->env->getExtension("native_profiler");
        $__internal_f9fa8ab78e5c2ce7042085719970685d9af6cd14b187d5c2b4cad4a086e65eaa->enter($__internal_f9fa8ab78e5c2ce7042085719970685d9af6cd14b187d5c2b4cad4a086e65eaa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataHead"));

        // line 23
        echo "        ";
        
        $__internal_f9fa8ab78e5c2ce7042085719970685d9af6cd14b187d5c2b4cad4a086e65eaa->leave($__internal_f9fa8ab78e5c2ce7042085719970685d9af6cd14b187d5c2b4cad4a086e65eaa_prof);

    }

    // line 27
    public function block_dataBody($context, array $blocks = array())
    {
        $__internal_ff36ddd0dbbc58e502c979e3653a3108a96bb5c5656db7d0095762b5678c0cf6 = $this->env->getExtension("native_profiler");
        $__internal_ff36ddd0dbbc58e502c979e3653a3108a96bb5c5656db7d0095762b5678c0cf6->enter($__internal_ff36ddd0dbbc58e502c979e3653a3108a96bb5c5656db7d0095762b5678c0cf6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataBody"));

        // line 28
        echo "        ";
        
        $__internal_ff36ddd0dbbc58e502c979e3653a3108a96bb5c5656db7d0095762b5678c0cf6->leave($__internal_ff36ddd0dbbc58e502c979e3653a3108a96bb5c5656db7d0095762b5678c0cf6_prof);

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
