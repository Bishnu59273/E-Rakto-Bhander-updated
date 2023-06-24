function showTime() {
  var date = new Date();
  var h = date.getHours(); // 0 - 23
  var m = date.getMinutes(); // 0 - 59
  var s = date.getSeconds(); // 0 - 59
  var session = "AM";

  if (h == 0) {
    h = 12;
  }

  if (h > 12) {
    h = h - 12;
    session = "PM";
  }

  h = h < 10 ? "0" + h : h;
  m = m < 10 ? "0" + m : m;
  s = s < 10 ? "0" + s : s;

  var time = h + ":" + m + ":" + s + " " + session;
  document.getElementById("MyClockDisplay").innerText = time;
  document.getElementById("MyClockDisplay").textContent = time;

  setTimeout(showTime, 1000);
}

showTime();

var perfData = window.performance.timing; // The PerformanceTiming interface represents timing-related performance information for the given page.
var EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart);
var time = parseInt((EstimatedTime / 1000) % 60) * 100;

// Fading Out Loadbar on Finised
setTimeout(function () {
  jQuery("body").addClass("loaded");
}, time);

const showcaseSlider = new Swiper(".swiper", {
  speed: 1000,
  slidesPerView: 1,
  parallax: true,
  loop: true,
  // centeredSlides: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

(function ($) {
  var defaults = {
    sm: 540,
    md: 720,
    lg: 960,
    xl: 1140,
    navbar_expand: "lg",
  };
  $.fn.bootnavbar = function () {
    var screen_width = $(document).width();
    if (screen_width >= defaults.lg) {
      $(this)
        .find(".dropdown")
        .hover(
          function () {
            $(this).addClass("show");
            $(this)
              .find(".dropdown-menu")
              .first()
              .addClass("show")
              .addClass("animated fadeIn")
              .one(
                "animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd",
                function () {
                  $(this).removeClass("animated fadeIn");
                }
              );
          },
          function () {
            $(this).removeClass("show");
            $(this).find(".dropdown-menu").first().removeClass("show");
          }
        );
    }
    $(".dropdown-menu a.dropdown-toggle").on("click", function (e) {
      if (!$(this).next().hasClass("show")) {
        $(this)
          .parents(".dropdown-menu")
          .first()
          .find(".show")
          .removeClass("show");
      }
      var $subMenu = $(this).next(".dropdown-menu");
      $subMenu.toggleClass("show");
      $(this)
        .parents("li.nav-item.dropdown.show")
        .on("hidden.bs.dropdown", function (e) {
          $(".dropdown-submenu .show").removeClass("show");
        });
      return false;
    });
  };
})(jQuery);
$(function () {
  $("#main_navbar").bootnavbar();
});

// back to top
jQuery(document).ready(function () {
  var btn = jQuery("#button");
  jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 300) {
      btn.addClass("show");
    } else {
      btn.removeClass("show");
    }
  });

  btn.on("click", function (e) {
    e.preventDefault();
    jQuery("html, body").animate(
      {
        scrollTop: 0,
      },
      "300"
    );
  });
});
