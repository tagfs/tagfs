<?php

/* main.html */
class __TwigTemplate_c8935f416a66e3b982a42dccd8206926 extends Twig_Template
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
    <title>TagFS</title>
    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js\"></script>

    <link href=\"../css/bootstrap.css\" rel=\"stylesheet\" media=\"screen\">
    <link href=\"../css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\">
    <link rel=\"stylesheet\" href=\"../css/font-awesome.min.css\">
    <link rel=\"stylesheet\" href=\"../css/reveal.css\">
    <script src=\"../js/bootstrap.js\"></script>
    <script src=\"../js/jquery.reveal.js\"></script>
    <script>
        function savePortal(){
            console.log(\$('#tag_selector_frame').contents().find('#js_frameFilter').attr(\"filter\"));

            
        }
    </script>

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
        .fs_link {
            text-decoration: none;
            color: darkgray;


        }
        .fs_link:hover {
            color: #000000;
            text-decoration: none;

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
                <li class=\"active\"><a href=\"/?cmd=main&\">Классификатор</a></li>
                <li><a href=\"/?cmd=files\">Просмотр</a></li>
            </ul>
                <a href=\"#\" data-reveal-id=\"MyModal\">
                <button class=\"btn btn-default pull-right\" style=\"margin-top: 8px; background-color: #2f2f2f; color:#ffffff; border-color: #2f2f2f;\"><i class=\"icon-plus\"></i> Создать</button>
            </a>

        </div>


</div>

<div class=\"row\" style=\"padding: 0px; margin-top: 50px;\">
    <ul class=\"breadcrumb\" style=\"\">
        <li><a style='text-decoration: none; color: #000000;' href=\"/?cmd=main\"><i class=\"icon-home\"></i></a></li>
        ";
        // line 74
        if (isset($context["path"])) { $_path_ = $context["path"]; } else { $_path_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_path_);
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 75
            echo "        <li><a style='text-decoration: none; color: #000000;' href=\"?cmd=main&id=";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "id"), "html", null, true);
            echo "\">";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "name"), "html", null, true);
            echo "</a></li>

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "    </ul>
        <table class=\"table table-hover\" style=\"margin-top: -22px;\">
            <tbody>
            ";
        // line 81
        if (isset($context["items"])) { $_items_ = $context["items"]; } else { $_items_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_items_);
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 82
            echo "            <tr>
                <td style=\"width: 50px;\" onClick=\"document.location='?cmd=main&id=";
            // line 83
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "id"), "html", null, true);
            echo "';\"><span class=\"label label-inverse\">TAG</span></td>
                <td onClick=\"document.location='?cmd=main&id=";
            // line 84
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "id"), "html", null, true);
            echo "';\">";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "name"), "html", null, true);
            echo "</td>
                <td  style=\"width: 300px;\" class=\"\">
                    <div class=\"pull-right\">
                        ";
            // line 87
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            if ($this->getAttribute($_item_, "portal")) {
                // line 88
                echo "                        <a class='fs_link' href=\"#\" data-reveal-id=\"frame_";
                if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_item_, "id"), "html", null, true);
                echo "\">
                            <i class=\"icon-signin\"></i> Портал
                        </a>
                        ";
            }
            // line 92
            echo "                        <a class='fs_link' href=\"#\" data-reveal-id=\"modal_";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "id"), "html", null, true);
            echo "\">
                            <i class=\"icon-wrench\"></i> Редактировать
                        </a>
                    </div>
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 99
        echo "            </tbody>
        </table>
    </div>

<div id=\"MyModal\" class=\"reveal-modal\">
    <p><h4>Имя:</h4></p>
    <form action=\"?id=";
        // line 105
        if (isset($context["id"])) { $_id_ = $context["id"]; } else { $_id_ = null; }
        echo twig_escape_filter($this->env, $_id_, "html", null, true);
        echo "&cmd=new\" class=\"navbar-form navbar-form\" method=\"POST\">
        <input name=\"name\" type=\"text\" style=\"width: 400px;\">
        <button type=\"submit\" class=\"btn btn-default pull-right\" style=\"background-color: #2f2f2f; color:#ffffff; border-color: #2f2f2f;\"><i class=\"icon-plus\"></i> Создать</button>
    </form>
    <a style='text-decoration: none;' class=\"close-reveal-modal\">&#215;</a>
</div>
";
        // line 111
        if (isset($context["items"])) { $_items_ = $context["items"]; } else { $_items_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_items_);
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 112
            echo "<div id=\"modal_";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "id"), "html", null, true);
            echo "\" class=\"reveal-modal\">
    <p><h4>Имя:</h4></p>
    <form style=\"float: left;\" action=\"?id=";
            // line 114
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "parent"), "html", null, true);
            echo "&cmd=update&tag=";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "id"), "html", null, true);
            echo "\" class=\"navbar-form\" method=\"POST\">
        <input name=\"name\" value=\"";
            // line 115
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "name"), "html", null, true);
            echo "\" type=\"text\" style=\"width: 310px;\">
        <button type=\"submit\" class=\"btn btn-default\" style=\"background-color: #2f2f2f; color:#ffffff; border-color: #2f2f2f;\"><i class=\"icon-edit\"></i> Переименовать</button>
    </form>
    <form  style=\"float: right; padding-top: 8px;\" action=\"?id=";
            // line 118
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "parent"), "html", null, true);
            echo "&cmd=delete\"  method=\"POST\">
        <input name=\"id\" type=\"hidden\" value=\"";
            // line 119
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "id"), "html", null, true);
            echo "\" style=\"width: 200px;\">
        <button type=\"submit\" class=\"btn btn-danger\"><i class=\"icon-trash\"></i></button>
    </form>
    <a style='text-decoration: none;' class=\"close-reveal-modal\">&#215;</a>
</div>
<div id=\"frame_";
            // line 124
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "id"), "html", null, true);
            echo "\" class=\"reveal-modal\" style=\"width: 820px;\">
    <iframe id=\"tag_selector_frame\" style=\"border: none;\" src=\"index.php?cmd=editor&f=";
            // line 125
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "portalfilter"), "html", null, true);
            echo "\" width=\"800\" height=\"600\" align=\"center\">

    </iframe>
    <a style='text-decoration: none;' class=\"close-reveal-modal\">&#215;</a>
</div>

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 132
        echo "










</body>

</html>";
    }

    public function getTemplateName()
    {
        return "main.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  246 => 132,  232 => 125,  227 => 124,  218 => 119,  213 => 118,  206 => 115,  198 => 114,  191 => 112,  186 => 111,  176 => 105,  168 => 99,  153 => 92,  144 => 88,  141 => 87,  131 => 84,  126 => 83,  123 => 82,  118 => 81,  113 => 78,  99 => 75,  94 => 74,  19 => 1,);
    }
}
