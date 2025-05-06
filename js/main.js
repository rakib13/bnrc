(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);

    //Pre loader 
    window.addEventListener('load', function () {
        const preloader = document.getElementById('preloader');
        setTimeout(() => {
            preloader.style.display = 'none';
        }, 500); // Adjust the delay (in milliseconds) to match your animation duration
    });
    
    
    // Initiate the wowjs
    new WOW().init();

    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.nav-bar').addClass('sticky-top shadow-sm').css('top', '0px');
        } else {
            $('.nav-bar').removeClass('sticky-top shadow-sm').css('top', '-100px');
        }
    });


    // Header carousel
    $(".header-carousel").owlCarousel({
        animateOut: 'fadeOut',
        items: 1,
        margin: 0,
        stagePadding: 0,
        autoplay: true,
        smartSpeed: 500,
        dots: true,
        loop: true,
       // nav : true,
        // navText : [
        //     '<i class="bi bi-arrow-left"></i>',
        //     '<i class="bi bi-arrow-right"></i>'
        // ],
    });



    // testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: false,
        dots: false,
        loop: true,
        margin: 25,
       // nav : true,
        // navText : [
        //     '<i class="fa fa-arrow-right"></i>',
        //     '<i class="fa fa-arrow-left"></i>'
        // ],
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:2
            },
            1200:{
                items:2
            }
        }
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 5,
        time: 2000
    });


   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


})(jQuery);


// publication js

document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("pdfModal");
    const iframe = document.getElementById("pdfIframe");
    const closeBtn = document.querySelector(".modal .close");

    document.querySelectorAll('.pdf-link').forEach(function(link) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        const pdfUrl = this.getAttribute('data-pdf');
        if (pdfUrl) {
          iframe.src = pdfUrl;
          modal.style.display = "block";
        }
      });
    });

    closeBtn.onclick = function () {
      modal.style.display = "none";
      iframe.src = ""; // clear iframe when closing
    };

    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
        iframe.src = "";
      }
    };
});

// gallery js.........................................................................
document.addEventListener('DOMContentLoaded', function() {
    // Load More Videos functionality
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    const videoContainer = document.getElementById('video-container');
    
    if (loadMoreBtn && videoContainer) {
        const allVideos = videoContainer.querySelectorAll('.col-md-6.col-lg-6.col-xl-3');
        let visibleCount = 4; // Number initially visible
        
        // Initially hide all videos beyond the first 4
        allVideos.forEach((video, index) => {
            if (index >= visibleCount) {
                video.style.display = 'none';
            }
        });
        
        loadMoreBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Show next 4 videos
            const nextBatch = visibleCount + 4;
            
            for (let i = visibleCount; i < nextBatch && i < allVideos.length; i++) {
                if (allVideos[i]) {
                    allVideos[i].style.display = 'block';
                }
            }
            
            visibleCount = nextBatch;
            
            // Hide button if all videos are visible
            if (visibleCount >= allVideos.length) {
                loadMoreBtn.style.display = 'none';
            }
        });
    }

    // Video popup functionality - ONLY opens on click
    document.querySelectorAll('.video-thumbnail').forEach(thumbnail => {
        thumbnail.addEventListener('click', function(e) {
            e.preventDefault();
            // Get video ID from closest parent with data-video-id attribute
            const videoContainer = this.closest('[data-video-id]');
            if (!videoContainer) return; // Safety check
            
            const videoId = videoContainer.getAttribute('data-video-id');
            if (!videoId) return; // Safety check
            
            openVideoPopup(videoId);
        });
    });
    
    // Video popup functions
    function openVideoPopup(videoId) {
        // Close any existing popup first
        closeVideoPopup();
        
        const popup = document.createElement('div');
        popup.className = 'video-popup-modal';
        popup.style.display = 'none'; // Start hidden
        
        popup.innerHTML = `
            <div class="modal-overlay"></div>
            <div class="modal-content">
                <button class="close-modal">×</button>
                <iframe width="560" height="315" 
                    src="https://www.youtube.com/embed/${videoId}?enablejsapi=1&rel=0" 
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
            </div>
        `;
        
        document.body.appendChild(popup);
        
        // Only show after setting up everything
        popup.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        // Add event listeners for the new popup
        popup.querySelector('.modal-overlay').addEventListener('click', closeVideoPopup);
        popup.querySelector('.close-modal').addEventListener('click', closeVideoPopup);
        
        // Autoplay after popup is shown
        const iframe = popup.querySelector('iframe');
        if (iframe) {
            // Small delay to ensure iframe is ready
            setTimeout(() => {
                iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&enablejsapi=1&rel=0`;
            }, 100);
        }
    }
    
    function closeVideoPopup() {
        const popup = document.querySelector('.video-popup-modal');
        if (popup) {
            // Pause video before removing
            const iframe = popup.querySelector('iframe');
            if (iframe) {
                // Properly stop the video
                iframe.src = '';
            }
            popup.remove();
            document.body.style.overflow = '';
        }
    }
    
    // Close with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeVideoPopup();
        }
    });
});


// mission start

function showSection(sectionId) {
    // Hide all sections
    document.querySelectorAll('.about-item-content').forEach(section => {
        section.classList.remove('active');
    });
    
    // Show the selected section
    document.getElementById(sectionId).classList.add('active');
    
    // Update active button in sidebar
    document.querySelectorAll('.sidebar button').forEach(button => {
        button.classList.remove('active');
    });
    event.target.classList.add('active');
}

// ziaur rahman
function toggleSubmenu(id) {
    const submenu = document.getElementById(id);
    submenu.classList.toggle('d-none');
  }

  function showSection(id) {
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => section.classList.remove('active'));

    const target = document.getElementById(id);
    if (target) target.classList.add('active');
  }

// mission end