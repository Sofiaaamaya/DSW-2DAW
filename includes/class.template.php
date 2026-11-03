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
            <header class=\"site-header\">
                <nav class=\"navbar lg:navbar-expand\" aria-label=\"Main\">
                    <div class=\"container\">
                        <a class=\"wordmark\" href=\"index.html\">
                            <svg class=\"brand-glyph\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" aria-hidden=\"true\">
                                <rect x=\"1.25\" y=\"1.25\" width=\"21.5\" height=\"21.5\" rx=\"6.5\" stroke=\"currentColor\" stroke-width=\"1.5\"/>
                                <path d=\"M7 16.5V7.5M7 16.5h5.5\" stroke=\"currentColor\" stroke-width=\"1.8\" stroke-linecap=\"round\"/>
                                <path d=\"M17 7.5v9M14 11h6\" stroke=\"currentColor\" stroke-width=\"1.8\" stroke-linecap=\"round\" opacity=\".5\"/>
                            </svg>
                            <span>Ledgerline</span>
                        </a>

                        <dialog class=\"drawer drawer-end\" tabindex=\"-1\" id=\"navDrawer\" aria-labelledby=\"navDrawerLabel\">
                            <div class=\"drawer-header\">
                                <h5 class=\"drawer-title\" id=\"navDrawerLabel\">Menu</h5>
                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"drawer\" aria-label=\"Close\"></button>
                            </div>
                            <div class=\"drawer-body mb-3 lg:mb-0\">
                                <ul class=\"nav navbar-nav ms-auto lg:gap-5\">
                                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"#product\">Product</a></li>
                                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"#developers\">Developers</a></li>
                                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"pricing.html\">Pricing</a></li>
                                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"#security\">Security</a></li>
                                </ul>
                            </div>
                        </dialog>

                        <div class=\"d-flex align-items-center gap-3 ms-auto\">
                            <button class=\"btn-icon\" type=\"button\" id=\"themeToggle\" aria-label=\"Toggle color mode\">
                                <svg class=\"theme-icon-light\" width=\"18\" height=\"18\" viewBox=\"0 0 16 16\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.6\" stroke-linecap=\"round\" aria-hidden=\"true\"><circle cx=\"8\" cy=\"8\" r=\"3.25\"/><path d=\"M8 1v1.5M8 13.5V15M15 8h-1.5M2.5 8H1m11-4-1 1M5 11l-1 1m0-8 1 1m6 6 1 1\"/></svg>
                                <svg class=\"theme-icon-dark\" width=\"18\" height=\"18\" viewBox=\"0 0 16 16\" fill=\"currentColor\" aria-hidden=\"true\"><path d=\"M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278\"/></svg>
                            </button>
                            <a class=\"btn-text theme-secondary sign-in\" href=\"#developers\">Sign in</a>
                            <a class=\"btn-solid theme-primary\" href=\"pricing.html\">Start building</a>
                            <button class=\"btn-icon navbar-toggler\" type=\"button\" data-bs-toggle=\"drawer\" data-bs-target=\"#navDrawer\" aria-controls=\"navDrawer\" aria-label=\"Open navigation\">
                                <span class=\"navbar-toggler-icon\" aria-hidden=\"true\"></span>
                            </button>
                        </div>
                    </div>
                </nav>
            </header>

        ";



    }


    static function footer()
    {
        return "
                </div>
            </section>
                    <footer class=\"site-footer section pb-6\">
                        <div class=\"container\">
                            <div class=\"row g-6\">
                                <div class=\"lg:col-4\">
                                    <p class=\"wordmark mb-4\">
                                        <svg class=\"brand-glyph\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" aria-hidden=\"true\">
                                            <rect x=\"1.25\" y=\"1.25\" width=\"21.5\" height=\"21.5\" rx=\"6.5\" stroke=\"currentColor\" stroke-width=\"1.5\"/>
                                            <path d=\"M7 16.5V7.5M7 16.5h5.5\" stroke=\"currentColor\" stroke-width=\"1.8\" stroke-linecap=\"round\"/>
                                            <path d=\"M17 7.5v9M14 11h6\" stroke=\"currentColor\" stroke-width=\"1.8\" stroke-linecap=\"round\" opacity=\".5\"/>
                                        </svg>
                                        <span>Ledgerline</span>
                                    </p>
                                    <p class=\"fg-2 fs-sm mb-0\" style=\"max-width:22rem\">
                                        Payments, payouts and a double-entry ledger behind one API. Priced so
                                        you can work out the bill yourself.
                                    </p>
                                </div>
                                <div class=\"md:col-4 lg:col-2\">
                                    <p class=\"eyebrow fs-xs fg-3 mb-4\">Product</p>
                                    <ul class=\"link-list\">
                                        <li><a href=\"index.html#product\">Payments</a></li>
                                        <li><a href=\"index.html#product\">Payouts</a></li>
                                        <li><a href=\"index.html#product\">Ledger API</a></li>
                                        <li><a href=\"pricing.html\">Pricing</a></li>
                                    </ul>
                                </div>
                                <div class=\"md:col-4 lg:col-2\">
                                    <p class=\"eyebrow fs-xs fg-3 mb-4\">Developers</p>
                                    <ul class=\"link-list\">
                                        <li><a href=\"index.html#developers\">Quickstart</a></li>
                                        <li><a href=\"index.html#developers\">API reference</a></li>
                                        <li><a href=\"index.html#developers\">Status</a></li>
                                        <li><a href=\"index.html#security\">Security</a></li>
                                    </ul>
                                </div>
                                <div class=\"md:col-4 lg:col-4\">
                                    <p class=\"eyebrow fs-xs fg-3 mb-4\">Regulatory</p>
                                    <p class=\"fg-2 fs-sm mb-0\">
                                        Ledgerline is a fictional company in a free website template. Nothing
                                        here is a real financial product, a real rate, or regulated by anyone.
                                    </p>
                                </div>
                            </div>

                            <hr class=\"my-6\">

                            <p class=\"fs-xs fg-3 mb-0\">&copy; <span data-year>\". date('Y') .\"</span> Ledgerline &mdash; a free Bootstrap 6 template.</p>
                        </div>
                    </footer>

                    <script type=\"module\" src=\"assets/js/main.js\"></script>
                </body>
            </html>


        ";




    }



}




