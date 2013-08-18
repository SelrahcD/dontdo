
(function(Backbone, Marionette, App) {

	var DontDoApp = App.module('DontDoApp');

	DontDoApp.Router = Marionette.AppRouter.extend({
	  appRoutes: {
	    "list": "listDontDo"
	  }
	});

	var API = {
	  listDontDo: function(){
	  	console.log('dont do list');
	  }
	}

	App.addInitializer(function(){
	  new DontDoApp.Router({
	    controller: API
	  });
	});

	return DontDoApp;

})(Backbone, Marionette, DontDo);