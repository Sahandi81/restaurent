new Splide(".splide", {
    type: "loop",
    direction: "ttb",
    height: "23rem",
    pagination: false,
    classes: {
        next: "splide__arrow--next  nextBtn  score-splide-next",
        prev: "splide__arrow--prev  prevBtn score-splide-prev",
    },
}).mount();