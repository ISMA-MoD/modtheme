jQuery(function($){
    var $container = $('#container');
    // init
    $container.isotope({
      // options
      itemSelector: '.item',
      layoutMode: 'fitRows'
    });
});