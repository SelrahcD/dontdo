DontDo.module("Entities", function(Entities, App, Backbone, Marionette, $, _) {
  "use strict";

  var DontDo = App.Entities.Model.extend({
  	initialize: function() {
  		Backbone.Compute(this);
  	},

  	'dontSnippet': {
  		fields: ["dont"],
  		compute: function(fields) {
  			return fields.dont;
  		}
  	},

  	'doSnippet': {
  	  fields: ["do"],
  	  compute: function(fields) {
  	    return fields.do;
  	  }
  	}
  });

  var DontDoCollection = App.Entities.Collection.extend({
  	model: DontDo,
    url: "/api/dontdo"
  });

  var API = {

  	getAll: function() {
  	  var deferred = $.Deferred();

  	  this._getDontDo(function(dontDo) {
  	    deferred.resolve(dontDo.collection);
  	  });

  	  return deferred.promise();
  	},

  	_getDontDo: function(callback) {
  	  var dontDoCollection = new DontDoCollection();
  	  dontDoCollection.on("add", callback);
  	  dontDoCollection.fetch();
  	}
  }

  App.reqres.setHandler("dontDo:entities", function() {
    return API.getAll();
  });

});