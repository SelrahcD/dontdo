<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title></title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

    </head>
    
    <body>
        <script type="text/template" id="dontdo-view">
        <span class="dont-title">Dont</span>
        <div>
            <%= dontSnippet %>
        </div>
        <span class="do-tilte">Do</span>
        <div>
            <%= doSnippet %>
        </div>
        </script>

        <script type="text/template" id="dontdo-list">
        <ul></ul>
        <a id="load-more">Load more</a>
        </script>

        <div class="row" id="main-region">
        </div>
        
        
        <script src="./bower_components/jquery/jquery.js"></script>
        <script src="./bower_components/underscore/underscore.js"></script>
        <script src="./bower_components/backbone/backbone.js"></script> 
        <script src="./bower_components/backbone.marionette/lib/backbone.marionette.js"></script>

        <script src="./scripts/backbone.compute.js"></script>


        <script src="./scripts/application.js"></script>
        <script src="./scripts/entities/_base/model.js"></script>
        <script src="./scripts/entities/_base/collection.js"></script>
        <script src="./scripts/entities/dontdo.js"></script>

        <script src="./scripts/apps/dontdo/app.js"></script>
        <script src="./scripts/apps/dontdo/list/list_controller.js"></script>
        <script src="./scripts/apps/dontdo/list/list_view.js"></script>

        <script type="text/javascript">
          DontDo.start();
        </script>



    </body>
</html>
