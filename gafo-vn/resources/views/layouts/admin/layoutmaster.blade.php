
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<%= webpackConfig.output.publicPath %>apple-icon.png"/>
    <link rel="icon" type="image/png" sizes="96x96" href="<%= webpackConfig.output.publicPath %>favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard Vue</title>
    <!-- Bootstrap core CSS     -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

    <!--     Fonts and icons     -->
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    @vite('resources/sass/app.scss')
  </head>
  <body>
    <div id="app">
       
    </div>
    <!-- built files will be auto injected -->
  </body>
    @vite('resources/js/app.js')
</html>
