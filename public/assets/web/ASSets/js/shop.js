// swiper configration
function calculateSpaceBetween(websspace, mobsspace) {
    if (window.innerWidth <= 576) {
        return mobsspace;
    } else {
        return websspace;
    }
    return 30;
}

function calculateSlidesPerViewResponsive(webscreen, mobscreen, swiperContainer) {
    const containerWidth = swiperContainer.clientWidth;

    let slideWidth;
    if (window.innerWidth <= 576) {
        slideWidth = mobscreen;
    } else {
        slideWidth = webscreen;
    }

    const slidesPerView = containerWidth / slideWidth;

    return slidesPerView;
}

var swiper = new Swiper(".catigory-slider-2", {
    spaceBetween: 10,
    slidesPerView: calculateSlidesPerViewResponsive(116, 70, document.querySelector('.catigory-slider-2')),
    navigation: {
        nextEl: ".catigory-slider-2-next",
        prevEl: ".catigory-slider-2-preve",
    },
    scrollbar: {
        el: '.catigory-slider-2-scrollbar',
        draggable: true,
    },
    on: {
        resize: function() {
            this.params.slidesPerView = calculateSlidesPerViewResponsive(116, 70, document
                .querySelector('.catigory-slider-2'));
            this.update();
        }
    }
});



//price range
const rangeMin = document.getElementById('range-min');
const rangeMax = document.getElementById('range-max');
const minValueDisplay = document.getElementById('range-min-value');
const maxValueDisplay = document.getElementById('range-max-value');
const sliderTrack = document.querySelector('.slider-track');
const priceCircle = document.querySelector('.priceCircle');

function updateRange() {
    const minValue = parseInt(rangeMin.value);
    const maxValue = parseInt(rangeMax.value);

    if (minValue > maxValue - 10) {
        rangeMin.value = maxValue - 10;
    }

    if (maxValue < minValue + 10) {
        rangeMax.value = minValue + 10;
    }

    minValueDisplay.value = rangeMin.value;
    maxValueDisplay.value = rangeMax.value;

    const percentMin = (rangeMin.value / rangeMin.max) * 100;
    const percentMax = (rangeMax.value / rangeMax.max) * 100;

    sliderTrack.style.background =
        `linear-gradient(to right, #E4E7E9 ${percentMin}%, #FA8232 ${percentMin}%, #FA8232 ${percentMax}%, #E4E7E9 ${percentMax}%)`;
}

rangeMin.addEventListener('input', updateRange);
rangeMax.addEventListener('input', updateRange);
updateRange();

function changeMax() {
    const minValue = parseInt(minValueDisplay.value);
    const maxValue = parseInt(maxValueDisplay.value);

    rangeMin.value = minValue;
    rangeMax.value = maxValue;

    updateRange();
    sendreq()
}


function priceClick(min, max, element) {
    rangeMin.value = min;
    rangeMax.value = max;

    const allCircles = document.querySelectorAll('.priceCircle');
    allCircles.forEach(circle => circle.classList.remove('active'));

    const priceCircle = element.querySelector('.priceCircle');
    priceCircle.classList.add('active');

    updateRange();
    sendreq()
}

function sendreq(){
    const min = document.getElementById('range-min');
    const max = document.getElementById('range-max');

    console.log(min.value, max.value);
}



//mobile view

function openMobileFiltersBtn() {
    const filtersContainer = document.getElementById('filtersContainer');
    const mobileFilterBgdisabled = document.getElementById('mobileFilterBgdisabled');

    filtersContainer.classList.add('showInMobile')
    mobileFilterBgdisabled.classList.add('mobileFilterBg')
}

function closeMobileFilter() {
    const filtersContainer = document.getElementById('filtersContainer');
    const mobileFilterBgdisabled = document.getElementById('mobileFilterBgdisabled');

    filtersContainer.classList.remove('showInMobile')
    mobileFilterBgdisabled.classList.remove('mobileFilterBg')
}

document.addEventListener('DOMContentLoaded', function() {
    const emptyCategoryButtons = document.querySelectorAll('button[data-has-subcategories="false"]');

    emptyCategoryButtons.forEach(button => {
        const checkbox = button.querySelector('.parent-checkbox');

        button.addEventListener('click', function() {
            checkbox.checked = !checkbox.checked;
            if (checkbox.checked) {
                button.classList.add('selected');
            } else {
                button.classList.remove('selected');
            }
        });
    });
});