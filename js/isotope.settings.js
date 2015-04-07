// Isotope settings
jQuery(document).ready(function ($) {
    
    var $container = $('#container');
    // init
    $container.isotope({
        // options
        itemSelector: '.item',
        masonry: {
              gutter: 36
       }
    });
    
    // layout Isotope again after all images have loaded
    $container.imagesLoaded( function() {
      $container.isotope('layout');
    });
    
});