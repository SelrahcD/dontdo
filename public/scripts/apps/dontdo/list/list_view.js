DontDo.module("DontDoApp.List", function (List, App, Backbone, Marionette, $, _) {

  List.DontDo = Marionette.ItemView.extend({
    template: "#dontdo-view",
    tagName: "li"
  });

  List.DontDoList = Marionette.CollectionView.extend({
    tagName: "ul",
    className: "dontdo-list",
    itemViewEventPrefix: "dontdo",
    itemView: List.DontDo
  });

});