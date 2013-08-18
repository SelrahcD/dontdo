DontDo.module("DontDoApp.List", function (List, App, Backbone, Marionette, $, _) {

  List.Controller = {

  	showList: function() {
  		var func = _.bind(this._showMailList, this);

  		$.when(App.request("dontDo:entities"))
  		  .then(func);
  	},

  	_showMailList: function(entities) {
  		var dontDoListView = this._getDontDoListView(entities);
  	  	App.main.show(dontDoListView);
  	},


  	_getDontDoListView: function(entities) {
  		return new List.DontDoList({
  			collection: entities
  		});
  	}
  }

});