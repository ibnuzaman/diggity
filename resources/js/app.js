import './bootstrap';
import 'flowbite';
import { Carousel } from 'flowbite';

function initCarousel(carouselNum) {
    const carouselElement = document.getElementById(`default-carousel-${carouselNum}`);
    const items = [
        {
            position: 0,
            el: document.getElementById(`c-item-1-${carouselNum}`)
        },
        {
            position: 1,
            el: document.getElementById(`c-item-2-${carouselNum}`)
        },
        {
            position: 2,
            el: document.getElementById(`c-item-3-${carouselNum}`)
        },
        {
            position: 3,
            el: document.getElementById(`c-item-4-${carouselNum}`)
        },
    ];
    const options = {
        defaultPosition: 0,
        interval: 3000,
        indicators: {
            activeClasses: 'bg-primary',
            inactiveClasses: 'bg-white',
            items: [
                {
                    position: 0,
                    el: document.getElementById(`c-indicator-1-${carouselNum}`)
                },
                {
                    position: 1,
                    el: document.getElementById(`c-indicator-2-${carouselNum}`)
                },
                {
                    position: 2,
                    el: document.getElementById(`c-indicator-3-${carouselNum}`)
                },
                {
                    position: 3,
                    el: document.getElementById(`c-indicator-4-${carouselNum}`)
                },
            ],
        },
        onNext: () => console.log('next'),
        onPrev: () => console.log('prev'),
        onChange: () => console.log('new item'),

    };

    const instanceOptions = {
        id: `default-carousel-${carouselNum}`,
        override: true,
    }

    const carousel = new Carousel(carouselElement, items, options, instanceOptions);

    const $nextButton = document.getElementById(`c-next-${carouselNum}`);
    const $prevButton = document.getElementById(`c-prev-${carouselNum}`);
    $nextButton.addEventListener('click', () => carousel.next());
    $prevButton.addEventListener('click', () => carousel.prev());
}

initCarousel(1);
initCarousel(2);
initCarousel(3);
