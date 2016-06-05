require.config({
    paths: {
        'backbone': 'vendor/backbone/backbone',
        'jquery': 'vendor/jquery/dist/jquery',
        'underscore': 'vendor/underscore/underscore'
    }
});

require(['src/View/AppView'], function(AppView) {
    new AppView;
});
