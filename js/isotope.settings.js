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



    // Filtering section. Lots of stuff going on here
    $('#filter').on( 'click', 'button', function() {
        var filterValue = $(this).attr('data-filter');
        $container.isotope({ filter: filterValue });
    });
    
    // Detect when a filter is selected
    $('.movie-filter a').click(function(){
        // get href attr, remove leading #
        var href = $(this).attr('href').replace( /^#/, '' ),
        // convert href into object
        // i.e. 'filter=.inner-transition' -> { filter: '.inner-transition' }
        option = $.deparam( href, true );
        // set hash, triggers hashchange on window
        $.bbq.pushState( option );
        if($(this).hasClass('view-all')){$(this).addClass('current');};
        
        //$(this).addClass('current');
        
        return false;
    });

    $(window).bind( 'hashchange', function( event ){
        // get options object from hash
        var hashOptions = $.deparam.fragment();
        
        // apply options from hash
        $container.isotope( hashOptions );
        
        // Highlighting
        var justHash = $.param.fragment();
        justHash = justHash.replace("filter=","");
        if(justHash === '') { 
            return; 
        };
        if(justHash === '*'){
            justHash = '.view-all';
        };
        console.log(justHash);
        $('.movie-filter').find('a.current').removeClass('current');
        $('.movie-filter a' + justHash).addClass('current');

    })
    // trigger hashchange to capture any hash data on init
    .trigger('hashchange');
    
});