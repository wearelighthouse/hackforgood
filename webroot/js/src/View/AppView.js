define(['backbone'], function (Backbone) {
    var AppView = Backbone.View.extend({
        initialize: function() {
            console.log('Hello World');
        }
    });

    return AppView;
});
