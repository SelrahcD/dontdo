DontDo.module("Entities", function(Entities, App, Backbone, Marionette, $, _) {
  "use strict";

  var DontDo = App.Entities.Model.extend();

  var DontDoCollection = App.Entities.Collection.extend({
  	model: DontDo,
    url: "/api/dontdo",

    parse: function(resp, options) {
      if(resp.meta.next === null) {
        App.trigger("DontDo.Entities:feedEmpty");
      }
      return resp.data;
    }
  });

  var page = 1,
      collection = new DontDoCollection();

  var API = {

    getBucket: function() {
      var deferred = $.Deferred();

      var options = {
        remove: false,
        data: {
          page: page
        }
      };

      this._getDontDo(function() {
        deferred.resolve(collection);
      }, options);

      page++;

      return deferred.promise();
    },

  	_getDontDo: function(callback, options) {
      options = options || {};
  	  collection.on("sync", callback);
  	  collection.fetch(options);
  	}
  }

  App.reqres.setHandler("DontDo.Entities:getBucket", function() {
    return API.getBucket();
  });

});