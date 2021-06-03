new Splide(".splide", {
    type: "loop",
    direction: "ttb",
    height: "20rem",
    pagination: false,
    classes: {
        arrows: "splide__arrows",
        arrow: "splide__arrow",
        next: "splide__arrow--next nextBtn",
    },
    gap: "50px",
    perPage: 1,
    breakpoints: {
        1200: {
            height: '35rem',
        },
    },
}).mount();