DontDo.module('DontDoApp', function(DontDoApp, DontDo, Backbone, Marionnette, $, _) {

	DontDoApp.Router = Marionette.AppRouter.extend({
	  appRoutes: {
	    "list": "listDontDo"
	  }
	});

	var API = {
	  listDontDo: function(criterion){
	  	console.log('dont do list');
	  }
	}

	DontDo.on("dontdo:list", function(){
	  DontDo.navigate("list");
	  API.listDontDo();
	});

	DontDo.addInitializer(function(){
	  new DontDoApp.Router({
	    controller: API
	  });
	});
	
});