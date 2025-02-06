/**
 *  ---------
 *  Preloader
 *  ---------
 *
 *  Contents
 *  --------
 *  01 Variable Declerations
 *  02 Trigger Page Transitions
 *     a Click Event
 *     b Popstate Event
 *  03 Change the Page Content
 *  04 Load the New Page Content
 */
(function($) {

  /**
   *  01 Variable Declerations
   */
  var transitioning   = false,
      new_location    = '',
      first_load      = false,
      site_url        = top.location.protocol.toString() + '//' + top.location.host.toString();

  /**
   *  02 Trigger Page Transitions
   */

  /** 02a Click Event **/
  $('body').on('click', '.page-transition', function (event) {
    event.preventDefault();
    var page_url = $(this).attr('href');
    if (!transitioning) {
      change_page(page_url, true);
    }
    first_load = true;
  });

  /** 02b Popstate Event **/
  $(window).on('popstate', function () {
    if (first_load) {
      var page_array = location.pathname.split('/'),
      page_url       = page_array[page_array.length - 1];
      if (!transitioning && new_location != page_url) {
        change_page(page_url, false);
      }
    }
    first_load = true;
  });

  /**
   *  03 Change the Page Content
   */
  function change_page(url, set_history) {
    transitioning = true;
    // Trigger page animation
    $('body').addClass('page-transition-active');
    $('.page-transition-loading-bar').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
      // Load the new content.
      load_content(url, set_history);
      // Set the current URL.
      new_location = url;
      // Scroll to the top of the page.
      if (!window.location.hash) {
        $('html, body').scrollTop(0);
        window.scrollTo(0, 0);
      }
      // Remove the loading bar.
      $('.page-transition-loading-bar').off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
    });
  }

  /**
   *  04 Load the New Page Content
   */
  function load_content(url, set_history) {
    $('.page-content').load($.trim(url) + ' .page-content-wrapper', function (event) {
      var wrapper = $(this).find('.page-content-wrapper');
      setTimeout(function () {
        $('body').get(0).className = wrapper.data('bodyclass');
        $('head title').html(wrapper.data('headtitle'));
        $('.page-transition-loading-bar').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
          transitioning = false;
          $('.page-transition-loading-bar').off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
        });
      }, 1200);
      if (url != window.location && set_history) {
        // Add the new page to the window.history
        // If the new page was triggered by a 'popstate' event, don't add it
        window.history.pushState({path: url}, '', url);
      }
    });
  }

}) (jQuery);
