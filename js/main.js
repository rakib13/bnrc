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

// gallery js
document.addEventListener('DOMContentLoaded', function() {
    // Get elements
    const videoThumbnail = document.querySelector('.video-thumbnail');
    const videoPopup = document.querySelector('.video-popup-modal');
    const closeModal = document.querySelector('.close-modal');
    const modalOverlay = document.querySelector('.modal-overlay');
    const iframe = document.querySelector('.modal-content iframe');
    
    // Video ID
    const videoId = 'UKhd0TsfMYo';
    
    // Open modal when thumbnail is clicked
    if (videoThumbnail) {
        videoThumbnail.addEventListener('click', function() {
            videoPopup.style.display = 'flex';
            iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        });
    }
    
    // Close modal functions
    function closeVideoModal() {
        videoPopup.style.display = 'none';
        iframe.src = ''; // Stop video when closing
        document.body.style.overflow = ''; // Re-enable scrolling
    }
    
    // Close modal when X button is clicked
    if (closeModal) {
        closeModal.addEventListener('click', closeVideoModal);
    }
    
    // Close modal when overlay is clicked
    if (modalOverlay) {
        modalOverlay.addEventListener('click', closeVideoModal);
    }
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && videoPopup.style.display === 'flex') {
            closeVideoModal();
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    const videoContainer = document.getElementById('video-container');
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
        console.log('Button clicked'); // Debugging line
        
        // Show next 4 videos
        const nextBatch = visibleCount + 4;
        
        for (let i = visibleCount; i < nextBatch && i < allVideos.length; i++) {
            if (allVideos[i]) {
                allVideos[i].style.display = 'block';
                console.log('Showing video', i); // Debugging line
            }
        }
        
        visibleCount = nextBatch;
        
        // Hide button if all videos are visible
        if (visibleCount >= allVideos.length) {
            loadMoreBtn.style.display = 'none';
            console.log('All videos shown, hiding button'); // Debugging line
        }
    });
    
    // Video popup functionality (if needed)
    document.querySelectorAll('.video-thumbnail').forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            const videoId = this.closest('[data-video-id]')?.dataset.videoId || 'UKhd0TsfMYo';
            openVideoPopup(videoId);
        });
    });
});
    
    // Your existing video popup functions
    function openVideoPopup(videoId) {
        const popup = document.getElementById('videoPopup');
        const iframe = popup.querySelector('iframe');
        iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
        popup.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function closeVideoPopup() {
        const popup = document.getElementById('videoPopup');
        const iframe = popup.querySelector('iframe');
        iframe.src = '';
        popup.style.display = 'none';
        document.body.style.overflow = '';
    }
    
   // Add click event to all video thumbnails
    document.querySelectorAll('.video-thumbnail').forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            // Extract video ID from img src or data attribute
            const videoId = 'UKhd0TsfMYo'; // Replace with actual video ID
            openVideoPopup(videoId);
        });
    });

