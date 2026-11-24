<header class="site-header">
    <nav class="navbar lg:navbar-expand" aria-label="Main">
        <div class="container">
            <a class="wordmark" href="/">
                <svg class="brand-glyph" width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <rect x="1.25" y="1.25" width="21.5" height="21.5" rx="6.5" stroke="currentColor" stroke-width="1.5"/>
                    <path d="M7 16.5V7.5M7 16.5h5.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M17 7.5v9M14 11h6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" opacity=".5"/>
                </svg>
                <span>Lanzarote</span>
            </a>

            <dialog class="drawer drawer-end" tabindex="-1" id="navDrawer" aria-labelledby="navDrawerLabel">
                <div class="drawer-header">
                    <h5 class="drawer-title" id="navDrawerLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="drawer" aria-label="Close"></button>
                </div>
                <div class="drawer-body mb-3 lg:mb-0">
                    <ul class="nav navbar-nav ms-auto lg:gap-5">
                        <li class="nav-item"><a class="nav-link" href="/usuarios/listado/0">{usuarios}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#developers">Developers</a></li>
                        <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                        <li class="nav-item"><a class="nav-link" href="#security">Security</a></li>
                    </ul>
                </div>
            </dialog>

            <div class="d-flex align-items-center gap-3 ms-auto">
                <button class="btn-icon" type="button" id="themeToggle" aria-label="Toggle color mode">
                    <svg class="theme-icon-light" width="18" height="18" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" aria-hidden="true"><circle cx="8" cy="8" r="3.25"/><path d="M8 1v1.5M8 13.5V15M15 8h-1.5M2.5 8H1m11-4-1 1M5 11l-1 1m0-8 1 1m6 6 1 1"/></svg>
                    <svg class="theme-icon-dark" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"><path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278"/></svg>
                </button>
                <a class="btn-text theme-secondary sign-in" href="#developers">Sign in</a>
                <a class="btn-solid theme-primary" href="pricing.html">Start building</a>
                <button class="btn-icon navbar-toggler" type="button" data-bs-toggle="drawer" data-bs-target="#navDrawer" aria-controls="navDrawer" aria-label="Open navigation">
                    <span class="navbar-toggler-icon" aria-hidden="true"></span>
                </button>
            </div>
            <div class="idiomas">
                <a href="http://en.lanzarote.lan/"><img  src="/img/flags/en.svg" /></a>
                <a href="http://www.lanzarote.lan/"><img  src="/img/flags/es.svg" /></a>
            </div>
        </div>
    </nav>
</header>
<section class="hero">
<div class="container">