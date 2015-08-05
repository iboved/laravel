<!DOCTYPE html>
<html>
    <head>
        <title>App Name - @yield('title')</title>
        @section('stylesheets')
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        @show
    </head>
    <body style="padding-top: 70px">
        @section('sidebar')
            <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ action('QuestionController@index') }}">Q&A</a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ action('QuestionController@index') }}">Home</a></li>
                        </ul>
                    </div><!-- /.nav-collapse -->
                </div><!-- /.container -->
            </nav><!-- /.navbar -->
        @show

        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                @yield('content')
            </div><!--/row-->

            <hr>

            <footer>
                <p>&copy; Q&A 2015</p>
            </footer>
        </div>

        @section('javascripts')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        @show
    </body>
</html>
