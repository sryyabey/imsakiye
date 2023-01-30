<!doctype html>
<html lang="en-us">

    <head>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <meta name="description" content="">

        <!-- The compiled CSS file -->
        <link rel="stylesheet" href="{{ asset('css/production.css') }}">

        <!-- FontAvesome CSS File -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">


        <!-- Web fonts -->
        <link href="https://fonts.googleapis.com/css?family=Cabin:400,700|Playfair+Display:900" rel="stylesheet">

        <!-- favicon.ico. Place these in the root directory. -->
        <link rel="shortcut icon" href="favicon.ico">

    </head>

    <body>
        <style>
            .button {
  background-color: #674188; /* Green */
  border: 0.5px;
  color: white;
  padding: 7px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 45%;
}
        </style>


    <div class="grid-row">

                <!-- Header -->
        <header class="header full-width">

            <!-- Mobile header -->
            <div class="show-on-mobile pt1 pl2 pr2 mb1">
                <div class="border--bottom pt1">
                    <div class="grid-row grid-row--center pb1">
                        <div class="grid-column span-half">
                            <!-- Mobile logo -->
                            <div class="mb0"></div>
                        </div>
                        <div class="grid-column span-half align--right">
                            <!-- Mobile social links -->
                            <ul class="mobile-social-links list--inline">
                                <li class="mr1">
                                    <a class="link link--default" href="https://www.twitter.com"><i class="fa-brands fa-facebook fa-3x"></i></a>
                                </li>
                                <li class="mr1">
                                    <a class="link link--default" href="https://www.instagram.com"><i class="fa-brands fa-instagram fa-3x"></i></a>
                                </li>
                                <li>
                                    <a class="link link--default" href="https://www.facebook.com"><i class="fa-brands fa-twitter fa-3x"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Desktop header -->
            <!-- Desktop logo -->
            <h1 class="hide-on-mobile logo-container absolute block full-width align--center">

            </h1>
            <!-- Social links -->
            <ul class="pt1 no-bullets align--center hide-on-mobile">

                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach(config('panel.available_languages') as $langLocale => $langName)

                        <li>
                            <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">
                                <span class="button">{{ strtoupper($langLocale) }}</span>
                            </a>
                        @endforeach
                    </li>
                    </div>



            </ul>

        </header>

        <!-- Hero image -->
        <div class="hero-container full-width show-on-mobile pt1 pl2 pr2">
            <div class="hero full-width full-height" style="background:rgba(0,0,0,0) url({{ asset('img/web.png') }}) no-repeat scroll center center/cover"></div>
        </div>
        <div class="hide-on-mobile hero" style="background:rgba(0,0,0,0) url({{ asset('img/web.png') }}) no-repeat scroll center center/cover"></div>

        <!-- Body -->
        <div class="body full-width pt1 pr2 pb2 pl2">
            <!-- Navigation -->
            <nav class="navigation border--bottom pt1">
                <ul class="no-bullets list--inline pb1 bold">
                    <li class="small mr2"><a class="link link--text current" href="#">WIHTU</a></li>
                    <li class="small mr2"><a class="link link--text" href="#">---</a></li>
                    <li class="small mr2"><a class="link link--text" href="{{ route('register') }}">{{ trans('global.register') }}</a></li>
                    <li class="small"><a class="link link--text" href="{{ route('login') }}">{{ trans('global.login') }}</a></li>
                </ul>
            </nav>
            <!-- Page Content -->
            <div class="content">
                <!-- reklam alanı -->
            </div>
            <main class="content pt2 pb2">
                <h2>{{ trans('global.web.ne') }}</h2>
                <p>{{ trans('global.web.uygulama') }}</p>
                <p>{{ trans('global.web.kullanim') }}</p>
                <p>{{ trans('global.web.kullanim_yazi') }}</p>
            </main>
                        <!-- Footer -->


        </div><!-- end Body -->

    </div>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3310586476745596"
     crossorigin="anonymous"></script>

    </body>
</html>

