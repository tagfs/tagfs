<?php

/* index.html */
class __TwigTemplate_fb5aa1cd1261d08d02db6f7dc314d9ab extends Twig_Template
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
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>TagFS - Режим просмотра</title>

        <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js\"></script>
        <link href=\"../css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"../css/bootstrap.css\" rel=\"stylesheet\" media=\"screen\">
        <link rel=\"stylesheet\" href=\"../css/font-awesome.min.css\">
        <script src=\"../js/bootstrap.js\"></script>
        <link href='http://fonts.googleapis.com/css?family=Italiana' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Marmelad&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <style>
            body{
                font-family: 'Marmelad', sans-serif;
            }
            .logonee{
                font-family: 'Italiana', serif;
                color: #ffffff;
                text-decoration-color: #ffffff;
            }
        </style>
    </head>
    <body>
        <div class=\"navbar navbar-fixed-top navbar-inverse\">

            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"/\"><i class=\"icon-cogs icon-large\" style=\"color: white;\"></i>  <object class=\"logonee\">TagFS</object></a>
            <div class=\"nav-collapse collapse\">
                <ul class=\"nav navbar-nav\">
                    <li><a href=\"/?cmd=main\">Классификатор</a></li>
                    <li class=\"active\"><a href=\"/?show=files\">Просмотр</a></li>
                </ul>
                <form action=\"/?f=";
        // line 40
        if (isset($context["addfilter"])) { $_addfilter_ = $context["addfilter"]; } else { $_addfilter_ = null; }
        echo twig_escape_filter($this->env, $_addfilter_, "html", null, true);
        echo "\" class=\"navbar-form pull-right\" method=\"POST\">
                    <button type=\"submit\" class=\"btn btn-default\" style=\"background-color: #2f2f2f; color:#ffffff; border-color: #2f2f2f;\"><i class=\"icon-plus\"></i> Добавить фильтр</button>
                </form>
            </div>
        </div>
        <div class=\"row\" style=\"padding: 0px; margin-top: 50px;\">
            <ul class=\"breadcrumb\">
                ";
        // line 47
        if (isset($context["path"])) { $_path_ = $context["path"]; } else { $_path_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_path_);
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 48
            echo "                <li><a style='text-decoration: none; color: #000000;' href=\"?f=";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "delete"), "html", null, true);
            echo "\"><i class=\"icon-trash\"></i></a> <a style='text-decoration: none; color: black;'  href=\"?f=";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "filter"), "html", null, true);
            echo "\">";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "name"), "html", null, true);
            echo "</a></li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "            </ul>
            <table class=\"table table-hover\" style=\"margin-top: -22px;\">
                <tbody>
                    ";
        // line 53
        if (isset($context["root_dir"])) { $_root_dir_ = $context["root_dir"]; } else { $_root_dir_ = null; }
        if (($_root_dir_ != "false")) {
            // line 54
            echo "                    <tr>
                        <td  style=\"width: 75px;\" onClick=\"document.location='?f=";
            // line 55
            if (isset($context["backfilter"])) { $_backfilter_ = $context["backfilter"]; } else { $_backfilter_ = null; }
            echo twig_escape_filter($this->env, $_backfilter_, "html", null, true);
            echo "';\"><span class=\"label label-inverse pull-right\">/</span></td>
                        <td onClick=\"document.location='?f=";
            // line 56
            if (isset($context["backfilter"])) { $_backfilter_ = $context["backfilter"]; } else { $_backfilter_ = null; }
            echo twig_escape_filter($this->env, $_backfilter_, "html", null, true);
            echo "';\">. .</td>
                    </tr>
                    ";
        }
        // line 59
        echo "                    ";
        if (isset($context["items"])) { $_items_ = $context["items"]; } else { $_items_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_items_);
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 60
            echo "                    <tr>
                        <td  style=\"width: 75px;\" onClick=\"document.location='/?show=files&f=";
            // line 61
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "filter"), "html", null, true);
            echo "';\"><span class=\"label label-inverse pull-right\">TAG</span></td>
                        <td onClick=\"document.location='/?show=files&f=";
            // line 62
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "filter"), "html", null, true);
            echo "';\">";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "name"), "html", null, true);
            echo "</td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "                    ";
        if (isset($context["portal"])) { $_portal_ = $context["portal"]; } else { $_portal_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_portal_);
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 66
            echo "                    <tr>
                        <td><span class=\"label label-info pull-right\">PORTAL</span></td>
                        <td onClick=\"document.location='";
            // line 68
            if (isset($context["file"])) { $_file_ = $context["file"]; } else { $_file_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_file_, "link"), "html", null, true);
            echo "'\">";
            if (isset($context["file"])) { $_file_ = $context["file"]; } else { $_file_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_file_, "name"), "html", null, true);
            echo "</td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "                    ";
        if (isset($context["files"])) { $_files_ = $context["files"]; } else { $_files_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_files_);
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 72
            echo "                    <tr>
                        <td><span class=\"label label-success pull-right\">FILE</span></td>
                        <td onClick=\"document.location='";
            // line 74
            if (isset($context["file"])) { $_file_ = $context["file"]; } else { $_file_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_file_, "link"), "html", null, true);
            echo "'\">";
            if (isset($context["file"])) { $_file_ = $context["file"]; } else { $_file_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_file_, "name"), "html", null, true);
            echo "</td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "                </tbody>
            </table>
        </div>


    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 77,  175 => 74,  171 => 72,  165 => 71,  152 => 68,  148 => 66,  142 => 65,  129 => 62,  124 => 61,  121 => 60,  115 => 59,  108 => 56,  103 => 55,  100 => 54,  97 => 53,  92 => 50,  76 => 48,  71 => 47,  60 => 40,  19 => 1,);
    }
}
