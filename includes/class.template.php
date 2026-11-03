<?php


class Template{


    function __construct($idioma='ES')
    {
        $this->idioma = $idioma;

    }    



    static function header($titulo,$descripcion='')
    {

        return "
            <!doctype html>
            <html lang=\"en\" data-bs-theme=\"light\">
            <head>
                <meta charset=\"utf-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                <title>{$titulo}</title>
                <meta name=\"description\" content=\"{$descripcion}\">
                <!-- Bootstrap 6, bundled in assets/vendor/bootstrap6 (version in the JS bundle header). To load it from jsDelivr instead, replace both paths below with https://cdn.jsdelivr.net/npm/bootstrap@VERSION/dist/... -->
                <link rel=\"stylesheet\" href=\"/assets/vendor/bootstrap6/css/bootstrap.min.css\">
                <script type=\"importmap\">{\"imports\": {\"bootstrap\": \"./assets/vendor/bootstrap6/js/bootstrap.bundle.min.js\"}}</script>
                <link rel=\"stylesheet\" href=\"/assets/css/base.css\">
                <link rel=\"stylesheet\" href=\"/assets/css/style.css\">

                <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
                <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

                <script src=\"https://use.fontawesome.com/releases/v5.15.3/js/all.js\" crossorigin=\"anonymous\"></script>

                <link rel=\"stylesheet\" href=\"{{\"/assets/main.css\" | relative_url }}\">
                <link rel=\"canonical\" href=\"{{ page.url | replace:'index.html','' | absolute_url }}\">
                <link rel=\"alternate\" type=\"application/rss+xml\" title=\"{{ site.title | escape }}\" href=\"{{ \"/feed.xml\" | relative_url }}\">

            </head>

            
        ". self::navegacion()."
        
        <section class=\"hero\">
            <div class=\"container\">

        "
        ;
    }


    static function navegacion()
    {
        return "
          <!-- Navigation -->
          <nav class=\"navbar navbar-expand-lg navbar-light fixed-top\" id=\"mainNav\">
            <div class=\"container\">
              <a class=\"navbar-brand\" href=\"{{\"/\" | relative_url }}\">{{ site.title | escape }}</a>
              <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                Menu
                <i class=\"fa fa-bars\"></i>
              </button>
              <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
                <ul class=\"navbar-nav ml-auto\">
                  <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"{{\"/\" | relative_url }}\">Home</a>
                  </li>
                  <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"{{\"/about\" | relative_url }}\">About</a>
                  </li>
                  <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"{{ \"/posts\" | relative_url }}\">Posts</a>
                  </li>
                  <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"{{\"/contact\" | relative_url }}\">Contact</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>


        ";



    }


    static function footer()
    {
        return "
          <!-- Footer -->

          <hr>

          <footer>
            <div class=\"container\">
              <div class=\"row\">
                <div class=\"col-lg-8 col-md-10 mx-auto\">
                  <ul class=\"list-inline text-center\">
                    {% if site.email %}
                    <li class=\"list-inline-item\">
                      <a href=\"mailto:{{ site.email | encode_email }}\">
                        <span class=\"fa-stack fa-lg\">
                          <i class=\"fas fa-circle fa-stack-2x\"></i>
                          <i class=\"far fa-envelope fa-stack-1x fa-inverse\"></i>
                        </span>
                      </a>
                    </li>
                    {% endif %}
                    {% if site.twitter_username %}
                    <li class=\"list-inline-item\">
                      <a href=\"https://twitter.com/{{ site.twitter_username }}\">
                        <span class=\"fa-stack fa-lg\">
                          <i class=\"fas fa-circle fa-stack-2x\"></i>
                          <i class=\"fab fa-twitter fa-stack-1x fa-inverse\"></i>
                        </span>
                      </a>
                    </li>
                    {% endif %}
                    {% if site.facebook_username %}
                    <li class=\"list-inline-item\">
                      <a href=\"https://www.facebook.com/{{ site.facebook_username }}\">
                        <span class=\"fa-stack fa-lg\">
                          <i class=\"fas fa-circle fa-stack-2x\"></i>
                          <i class=\"fab fa-facebook-f fa-stack-1x fa-inverse\"></i>
                        </span>
                      </a>
                    </li>
                    {% endif %}
                    {% if site.linkedin_username %}
                    <li class=\"list-inline-item\">
                      <a href=\"https://www.linkedin.com/in/{{ site.linkedin_username }}\">
                        <span class=\"fa-stack fa-lg\">
                          <i class=\"fas fa-circle fa-stack-2x\"></i>
                          <i class=\"fab fa-linkedin fa-stack-1x fa-inverse\"></i>
                        </span>
                      </a>
                    </li>
                    {% endif %}
                    {% if site.github_username %}
                    <li class=\"list-inline-item\">
                      <a href=\"https://github.com/{{ site.github_username }}\">
                        <span class=\"fa-stack fa-lg\">
                          <i class=\"fas fa-circle fa-stack-2x\"></i>
                          <i class=\"fab fa-github fa-stack-1x fa-inverse\"></i>
                        </span>
                      </a>
                    </li>
                    {% endif %}
                    {% if site.instagram_username %}
                    <li class=\"list-inline-item\">
                      <a href=\"https://instagram.com/{{ site.instagram_username }}\">
                        <span class=\"fa-stack fa-lg\">
                          <i class=\"fas fa-circle fa-stack-2x\"></i>
                          <i class=\"fab fa-instagram fa-stack-1x fa-inverse\"></i>
                        </span>
                      </a>
                    </li>
                    {% endif %}
                  </ul>
                  <p class=\"copyright text-muted\">Copyright &copy; {{ site.author }} {{ 'now' | date: \"%Y\" }}</p>
                </div>
              </div>
            </div>
          </footer>
        ";
    }



}




