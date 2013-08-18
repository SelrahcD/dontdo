DontDo = (function(Backbone, Marionette) {
  "use strict";

	var App = new Marionette.Application();

  App.addRegions({
    main: "#main-region"
  });

  App.navigate = function(route,  options){
    options || (options = {});
    Backbone.history.navigate(route, options);
  };

  App.getCurrentRoute = function(){
    return Backbone.history.fragment
  };

  App.on("initialize:after", function(){

    console.log("initialize:after");

    if(Backbone.history){
      Backbone.history.start();
    }

    if(this.getCurrentRoute() === ""){
      App.navigate('list');
    }
  });

  return App;

})(Backbone, Marionette);