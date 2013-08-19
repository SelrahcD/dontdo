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

    loadMore: function() {
      App.request("DontDo:LoadMore");
    }

  });

  App.on("DontDo.Entities:feedEmpty", function() {
    console.log('We need to remove the link');
  });

});