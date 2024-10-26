let currentSlide = 0;
        const images = document.querySelectorAll('.banner-right img');

        function showSlide(index) {
            images.forEach((img, i) => {
                img.classList.remove('active');
                if (i === index) {
                    img.classList.add('active');
                }
            });
        }

        function moveSlide(step) {
            currentSlide += step;
            if (currentSlide >= images.length) {
                currentSlide = 0;
            } else if (currentSlide < 0) {
                currentSlide = images.length - 1;
            }
            showSlide(currentSlide);
        }