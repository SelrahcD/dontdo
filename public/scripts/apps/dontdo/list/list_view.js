DontDo.module("DontDoApp.List", function (List, App, Backbone, Marionette, $, _) {

  List.DontDo = Marionette.ItemView.extend({
    template: "#dontdo-view",
    tagName: "li"
  });

  List.DontDoList = Marionette.CompositeView.extend({
    template: "#dontdo-list",
    tagName: "div",
    className: "dontdo-list-container",
    itemViewEventPrefix: "dontdo",
    itemView: List.DontDo,
    itemViewContainer: "ul",

    events: {
      'click #load-more': 'loadMore'
    },

    initialize: function(){
      App.on("DontDo.Entities:feedEmpty", function() {
        this.removeLink();
      }, this);
    },

    loadMore: function() {
      App.request("DontDo:LoadMore");
    },

    removeLink: function() {
      $('#load-more').remove();
    }

  });

});