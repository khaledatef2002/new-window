// window.addEventListener('scroll', function() {
//     var navbar = document.querySelector('.navbar');
//     navbar.classList.toggle('navbar-scrolled', window.scrollY > 0);
//   });

  // Get the button
var scrollToTopBtn = document.getElementById("scrollToTopBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
    scrollToTopBtn.style.display = "block";
  } else {
    scrollToTopBtn.style.display = "none";
  }
}

function checkScroll() {
    const navbar = document.querySelector('.navbar');

    if (window.scrollY > 201) {
        navbar.classList.add('floating-nav');
    } else {
        navbar.classList.remove('floating-nav');
    }
}

window.addEventListener('DOMContentLoaded', checkScroll);
window.addEventListener('scroll', checkScroll);

// When the user clicks on the button, scroll to the top of the document
function scrollToTop() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

var swiper = new Swiper(".portoSwiper", {
  slidesPerView: 3,
  breakpoints: {
    // when window width is <= 768px (small devices)
    750: {
      slidesPerView: 5,
    },
    // when window width is <= 576px (mobile devices)
    400: {
      slidesPerView: 2,
    }
  },
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  loop: true,
  autoplay: {
    delay: 3500, // Set the delay between slides in milliseconds (e.g., 5000 = 5 seconds)
    disableOnInteraction: false, // Set to false if you want autoplay to continue even when the user interacts with the swiper
  }
});

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 'auto',
  breakpoints: {
    // when window width is <= 768px (small devices)
    750: {
      slidesPerView: 5,
    },
    // when window width is <= 576px (mobile devices)
    400: {
      slidesPerView: 2,
    }
  },
  spaceBetween: 20,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  loop: true,
  autoplay: {
    delay: 3500, // Set the delay between slides in milliseconds (e.g., 5000 = 5 seconds)
    disableOnInteraction: false, // Set to false if you want autoplay to continue even when the user interacts with the swiper
  }
});

var swiper = new Swiper(".categoriesSwiper", {
  slidesPerView: 'auto',
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

$('.protofolio-carousel').owlCarousel({
  items: 2,
  rtl: true,
  nav: true,
  loop: true,
  lazyLoad:true,
  responsive: {
    576: {
      items: 3
    },
    768: {
      items: 5
    },
    1200: {
      items: 7
    }
  }
});

function zoom_image(me)
{
  var image = $(me).find("img").attr('src')
  const modal = new bootstrap.Modal('#porto-modal')
  $("#porto-modal .modal-body img").attr("src", image)

  modal.show();
}

document.addEventListener('DOMContentLoaded', function () {
  const elements = document.querySelectorAll('.count-number');

  function handleIntersection(entries, observer) {
      entries.forEach(entry => {
          if (entry.isIntersecting) {
              startCounter(entry.target);

              observer.unobserve(entry.target);
          }
      });
  }

  const observer = new IntersectionObserver(handleIntersection, {
      root: null,
      threshold: 1,
  });

  elements.forEach(function (element, i) {
      const number = Number(element.textContent);
      element.setAttribute('data-value', number); // Save the original value
      element.textContent = 0; // Reset the visible content
      observer.observe(element);
  });

  function startCounter(element) {
      const milliseconds = 1500;
      const intervals = 35;
      const tickTime = milliseconds / intervals;
      
      // Retrieve the target value from the data-value attribute
      const targetNumber = Number(element.getAttribute('data-value'));
      const numberPerInterval = targetNumber / intervals;

      let currentTick = 0;
      const intervalClock = setInterval(function () {
          if (currentTick++ === intervals) {
              clearInterval(intervalClock);
              element.textContent = targetNumber; // Ensure it ends at the exact value
          } else {
              element.textContent = Math.round(
                  Number(element.textContent) + numberPerInterval
              );
          }
      }, tickTime);
  }
});
