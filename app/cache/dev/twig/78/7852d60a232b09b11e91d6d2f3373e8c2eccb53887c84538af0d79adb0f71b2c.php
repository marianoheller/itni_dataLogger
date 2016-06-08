<?php

/* datalogger_base.html.twig */
class __TwigTemplate_0e057e9be4599b898a59626999793e00eb6f46975a9c5dcfead1c2c04ffc3563 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'dataHead' => array($this, 'block_dataHead'),
            'dataBody' => array($this, 'block_dataBody'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_96fca6d970b3d95e9aa42d623dcc287be6ea9d93988bc9f670e3a9c86dcde3eb = $this->env->getExtension("native_profiler");
        $__internal_96fca6d970b3d95e9aa42d623dcc287be6ea9d93988bc9f670e3a9c86dcde3eb->enter($__internal_96fca6d970b3d95e9aa42d623dcc287be6ea9d93988bc9f670e3a9c86dcde3eb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "datalogger_base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\" >
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"initial-scale=1.0; maximum-scale=1.0; width=device-width;\">
    <title>Data Table</title>
    ";
        // line 7
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
        <h3>Data Table</h3>
    </div>
    <table class=\"table-fill\">
        <thead>
        ";
        // line 20
        $this->displayBlock('dataHead', $context, $blocks);
        // line 22
        echo "        </thead>

        <tbody class=\"table-hover\">
        ";
        // line 25
        $this->displayBlock('dataBody', $context, $blocks);
        // line 27
        echo "        </tbody>
    </table>
</body>
</html>
";
        
        $__internal_96fca6d970b3d95e9aa42d623dcc287be6ea9d93988bc9f670e3a9c86dcde3eb->leave($__internal_96fca6d970b3d95e9aa42d623dcc287be6ea9d93988bc9f670e3a9c86dcde3eb_prof);

    }

    // line 20
    public function block_dataHead($context, array $blocks = array())
    {
        $__internal_4823051532807a3cc2e9d55cac7f1f6d75ceee0d5b31c4dd1e1cfb187f557148 = $this->env->getExtension("native_profiler");
        $__internal_4823051532807a3cc2e9d55cac7f1f6d75ceee0d5b31c4dd1e1cfb187f557148->enter($__internal_4823051532807a3cc2e9d55cac7f1f6d75ceee0d5b31c4dd1e1cfb187f557148_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataHead"));

        // line 21
        echo "        ";
        
        $__internal_4823051532807a3cc2e9d55cac7f1f6d75ceee0d5b31c4dd1e1cfb187f557148->leave($__internal_4823051532807a3cc2e9d55cac7f1f6d75ceee0d5b31c4dd1e1cfb187f557148_prof);

    }

    // line 25
    public function block_dataBody($context, array $blocks = array())
    {
        $__internal_f656047581b79e8ab1b3e68048b8adf725676ca1bc4cd15e5d4a58f9311fa869 = $this->env->getExtension("native_profiler");
        $__internal_f656047581b79e8ab1b3e68048b8adf725676ca1bc4cd15e5d4a58f9311fa869->enter($__internal_f656047581b79e8ab1b3e68048b8adf725676ca1bc4cd15e5d4a58f9311fa869_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataBody"));

        // line 26
        echo "        ";
        
        $__internal_f656047581b79e8ab1b3e68048b8adf725676ca1bc4cd15e5d4a58f9311fa869->leave($__internal_f656047581b79e8ab1b3e68048b8adf725676ca1bc4cd15e5d4a58f9311fa869_prof);

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
        return array (  101 => 26,  95 => 25,  88 => 21,  82 => 20,  71 => 27,  69 => 25,  64 => 22,  62 => 20,  50 => 10,  36 => 8,  32 => 7,  24 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en" >*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">*/
/*     <title>Data Table</title>*/
/*     {% stylesheets 'bundles/css/*' filter='cssrewrite' %}*/
/*     <link rel="stylesheet" href="{{ asset_url }}" />*/
/*     {% endstylesheets %}*/
/* */
/* </head>*/
/* */
/* */
/* <body>*/
/*     <div class="table-title">*/
/*         <h3>Data Table</h3>*/
/*     </div>*/
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
