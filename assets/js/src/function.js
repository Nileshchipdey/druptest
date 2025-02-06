/**
 * ----------------------------------
 * ----------------------------------
 *
 *  Argo Registrars
 *  https://argoregistrars.com.au
 *
 *  Designed by: James Norton Design
 *  https://www.jamesnortondesign.com
 *
 *  Developed by: Raphael Briskie
 *  https://www.raphaelbriskie.com
 *
 * ----------------------------------
 * ----------------------------------
 *
 *  Contents
 *  --------
 *  01 Initialise
 *     a Page Transition Links
 *     b Navigation
 *     c Article Grid
 *     d Opportunity Location Toggle
 *     e Product Image Lightbox
 *  02 Trigger Initialise Function
 *  03 Ajax Throbber
 */

(function($) {

  /**
   *  01 Initialise
   */
  function initialise() {

    /** 01a Page Transition Links **/
    var site_url = top.location.protocol.toString() + '//' + top.location.host.toString();
    $('a[href^="' + site_url + '"], a[href^="/"], a[href^="./"], a[href^="../"], a[href^="#"]').not('a[target="_blank"], a[href^="/node"], a[href^="/admin"], a[href="#"], a.page-transition, .file a, a[data-rel^=lightcase], #admin-menu a, .slicknav_menu a, a[href*="files"], a[href*="uploads"], a[href*="user/register"], a[href*="user/password"], a[data-no-transition="true"]').addClass('page-transition');

    /** 01b Navigation **/
    $('.menu-toggle').on('click', function(event) {
      event.preventDefault();
      // Toggle open the main menu on mobile view.
      $('header .level-two').toggleClass('open');
    });
    $('header nav .menu li.expanded > a').on('click', function() {
      if ($(window).width() < 1024) {
        // Open the sub-menus on mobile view.
        if (!$(this).hasClass('open')) {
          $(this).toggleClass('open');
          return false;
        }
      }
      else {
        // Open the sub-menus on desktop view.
        if (!$(this).hasClass('open')) {
          var attr = $(this).attr('data-href');
          if (typeof attr !== typeof undefined && attr !== false) {
            // Close already open menus.
            if ($('.sub-menu.open').length) {
              $('header nav .menu li.expanded > a.open, .sub-menu.open').removeClass('open');
              setTimeout(function() {
                // Open the clicked menu after already opened menu is closed.
                $(this).addClass('open');
                $('.sub-menu[data-href="' + attr + '"]').addClass('open');
              }, 1000);
            }
            else {
              // Open the clicked menu.
              $(this).addClass('open');
              $('.sub-menu[data-href="' + attr + '"]').addClass('open');
            }
            return false;
          }
        }
      }
    });

    /** 01c Article Grid **/
    if ($.fn.packery && $.fn.imagesLoaded) {
      var $grid = $('.articles').packery({
        itemSelector: '.article',
        percentPosition: true
      });
      // Layout Packery after each image loads.
      $grid.imagesLoaded().progress( function() {
        $grid.packery();
      });
      setTimeout(function() {
        $grid.packery();
      }, 1500);
    }

    /** 01d Opportunity Location Toggle **/
    $('.page-opportunities .terms a:first-child, .page-opportunities .terms + .table-wrapper').addClass('active');
    $('.page-opportunities .terms a').on('click', function(event) {
      event.preventDefault();
      // Toggle open the selected term.
      var tid = $(this).attr('data-tid');
      $('.page-opportunities .table-wrapper.active, .page-opportunities .terms a.active').removeClass('active');
      setTimeout(function() {
        $('.page-opportunities h2[data-tid="' + tid + '"]').parents('.table-wrapper').addClass('active');
        $('.page-opportunities .terms a[data-tid="' + tid + '"]').addClass('active');
      }, 2000);
    });

    /** 01e Product Image Lightbox */
    if ($.fn.lightcase) {
      $('a[data-rel^=lightcase]').lightcase();
    }

    $('footer .legal .button').on('click', function() {
      $('footer .legal').toggleClass('open');
      return false;
    });

    /** 01f International Phone Number **/
    let phoneInput = document.querySelector('form[id^="user-register-form"] input[name="field_mobile[und][0][value]"]');
    if (phoneInput) {
      iti = window.intlTelInput(
        phoneInput,
        {
          preferredCountries: ['au', 'gb', 'nz', 'us']
        }
      );
      phoneInput.value = '+' + iti.getSelectedCountryData().dialCode;
      phoneInput.addEventListener('countrychange', () => {
        phoneInput.value = '+' + iti.getSelectedCountryData().dialCode;
      });
      let registerForm = document.querySelector('form[id^="user-register-form"]');
      let submitButton = document.querySelector('form[id^="user-register-form"] .form-actions .form-submit');
      if (registerForm && submitButton) {
        submitButton.addEventListener('click', (event) => {
          event.preventDefault();
          if (phoneInput.value.startsWith('+')) {
            registerForm.submit();
          }
          else {
            phoneInput.classList.add('error');
            let phoneInputError = phoneInput.parentNode.querySelector('.description');
            if (!phoneInputError) {
              phoneInputError = document.createElement('div');
              phoneInputError.className = 'description';
              phoneInputError.style.color = '#8c2e0b';
              phoneInputError.textContent = 'Please enter a mobile number with a valid country code.';
              phoneInput.after(phoneInputError);
            }
            phoneInput.parentNode.parentNode.scrollIntoView({
              behavior: 'smooth'
            });
          }
        })

      }

    }

    /** 01g Campaign Monitor **/
    let subscribeCheckbox = document.querySelector('form[id^="user-register-form"] .form-item[class*="form-item-campaignmonitor-lists"]');
    if (subscribeCheckbox) {
      let subscribeCheckboxInput = subscribeCheckbox.querySelector('input');
      subscribeCheckboxInput.checked = true;
      subscribeCheckbox.classList.add('element-invisible');

      unsubscribeCheckbox = document.createElement('div');
      unsubscribeCheckbox.className = 'form-item form-type-checkbox';
      unsubscribeCheckboxInput = document.createElement('input');
      unsubscribeCheckboxInput.className = 'form-checkbox';
      unsubscribeCheckboxInput.id = 'unsubscribe-checkbox';
      unsubscribeCheckboxInput.name = 'unsubscribe-checkbox';
      unsubscribeCheckboxInput.type = 'checkbox';
      unsubscribeCheckboxInput.value = '1';
      unsubscribeCheckboxLabel = document.createElement('label');
      unsubscribeCheckboxLabel.className = 'option';
      unsubscribeCheckboxLabel.setAttribute('for', 'unsubscribe-checkbox');
      unsubscribeCheckboxLabel.innerHTML = 'I would <strong>NOT</strong> like to receive the Argo or Young Surgeon Newsletter detailing upcoming events and information.';

      unsubscribeCheckbox.append(unsubscribeCheckboxInput);
      unsubscribeCheckbox.append(unsubscribeCheckboxLabel);

      subscribeCheckbox.after(unsubscribeCheckbox);

      unsubscribeCheckboxInput.addEventListener('change', () => {
        if (unsubscribeCheckboxInput.checked) {
          subscribeCheckboxInput.checked = false;
        }
        else {
          subscribeCheckboxInput.checked = true;
        }
      });

    }

  }

  /**
   *  02 Trigger Initialise Function
   */
  $(document).ready(function() {
    initialise();
  });
  $(document).ajaxComplete(function() {
    initialise();
  });

  /**
   *  03 Ajax Throbber
   */
  Drupal.behaviors.exoveGlobalThrobber = {
    attach:function(context) {
      var div = '<div id="global-throbber"><div class="ajax-progress-throbber"><div class="throbber"></div></div></div>';
      $(document).ajaxSend(function(event, request, settings) {
        if (
          settings.url.indexOf('system/ajax') !== -1 ||
          settings.url.indexOf('views/ajax') !== -1
        ) {
          if ($('#global-throbber').length == 0) {
            $('body').append(div);
          }
        }
      });
      $(document).ajaxComplete(function(event, request, settings) {
        $('#global-throbber').remove();
      });
    }
  };

}) (jQuery);
