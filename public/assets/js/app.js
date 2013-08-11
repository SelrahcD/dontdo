var DontDo = new Marionette.Application();

DontDo.addRegions({
  mainRegion: "#main-region"
});

DontDo.navigate = function(route,  options){
  options || (options = {});
  Backbone.history.navigate(route, options);
};

DontDo.getCurrentRoute = function(){
  return Backbone.history.fragment
};

DontDo.on("initialize:after", function(){
  console.log('INIT');
  if(Backbone.history){
    Backbone.history.start();
  }

  if(this.getCurrentRoute() === ""){
    DontDo.trigger("dontdo:list");
  }

});