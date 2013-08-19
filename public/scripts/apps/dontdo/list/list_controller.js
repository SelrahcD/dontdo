DontDo.module("DontDoApp.List", function (List, App, Backbone, Marionette, $, _) {

  List.Controller = {

  	showList: function() {
  		var func = _.bind(this._showDontDoList, this);

  		$.when(App.request("DontDo.Entities:getBucket"))
  		  .then(func);
  	},

  	_showDontDoList: function(entities) {
  		  var dontDoListView = this._getDontDoListView(entities);
  	  	App.main.show(dontDoListView);
  	},


  	_getDontDoListView: function(entities) {
  		return new List.DontDoList({
  			collection: entities
  		});
  	}
  }

  App.reqres.setHandler("DontDo:LoadMore", function() {
    App.request("DontDo.Entities:getBucket");
  });

});