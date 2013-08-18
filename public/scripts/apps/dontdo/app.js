(function(Backbone, Marionette, App) {
	"use strict";

	var DontDoApp = App.module('DontDoApp');

	DontDoApp.Router = Marionette.AppRouter.extend({
	  appRoutes: {
	    "list": "listDontDo"
	  }
	});

	var API = {
	  listDontDo: function(){
	  	console.log('dont do list');
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