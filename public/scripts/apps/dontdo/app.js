(function(Backbone, Marionette, App) {
	"use strict";

	var DontDoApp = App.module('DontDoApp');

	DontDoApp.Router = Marionette.AppRouter.extend({
	  appRoutes: {
	    "": "listDontDo"
	  }
	});

	var API = {
	  listDontDo: function(){
	  	DontDoApp.List.Controller.showList();
	  }
	}

	App.addInitializer(function(){
	  new DontDoApp.Router({
	    controller: API
	  });
	});

	return DontDoApp;

})(Backbone, Marionette, DontDo);