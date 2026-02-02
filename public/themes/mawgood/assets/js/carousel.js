function initCarousel(uid) {
    var track = document.getElementById(uid + 'track');
    var prevBtn = document.getElementById(uid + 'prev');
    var nextBtn = document.getElementById(uid + 'next');
    var dots = document.querySelectorAll('#' + uid + 'dots span');
    var currentIndex = 0;
    var interval;
    
    if (!track) return;
    
    function goToSlide(index) {
        currentIndex = index;
        track.style.transform = 'translateX(-' + (index * 100) + '%)';
        
        for (var i = 0; i < dots.length; i++) {
            if (i === index) {
                dots[i].style.backgroundColor = '#1E3A5F';
                dots[i].style.width = '32px';
            } else {
                dots[i].style.backgroundColor = 'rgba(255, 255, 255, 0.6)';
                dots[i].style.width = '12px';
            }
        }
    }
    
    function nextSlide() {
        currentIndex = (currentIndex + 1) % 3;
        goToSlide(currentIndex);
    }
    
    prevBtn.onclick = function() {
        clearInterval(interval);
        currentIndex = (currentIndex - 1 + 3) % 3;
        goToSlide(currentIndex);
        interval = setInterval(nextSlide, 2000);
    };
    
    nextBtn.onclick = function() {
        clearInterval(interval);
        nextSlide();
        interval = setInterval(nextSlide, 2000);
    };
    
    for (var i = 0; i < dots.length; i++) {
        dots[i].onclick = (function(idx) {
            return function() {
                clearInterval(interval);
                goToSlide(idx);
                interval = setInterval(nextSlide, 2000);
            };
        })(i);
    }
    
    interval = setInterval(nextSlide, 2000);
}
