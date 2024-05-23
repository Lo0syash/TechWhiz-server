import Swiper from "swiper";
import ScrollReveal from "scrollreveal";

const swiper = new Swiper('.swiper', {
    allowTouchMove: false,
    breakpoints: {
        1390: {
            loop: true,
            autoplay: true,
            slidesPerView: 2
        },
    },
});

ScrollReveal().reveal('.body', {
    duration: 1000,
    delay: 200,
    origin: 'bottom',
    easing: 'ease-in-out',
    mobile: false
});

ScrollReveal().reveal('.banner', {
    duration: 1000,
    delay: 200,
    origin: 'bottom',
    easing: 'ease-in-out',
    mobile: false
});

ScrollReveal().reveal('.team-TechWhiz', {
    duration: 1000,
    delay: 200,
    origin: 'bottom',
    easing: 'ease-in-out',
    mobile: false
});

ScrollReveal().reveal('.invite', {
    duration: 1000,
    delay: 200,
    origin: 'bottom',
    easing: 'ease-in-out',
    mobile: false
});

ScrollReveal().reveal('.completeToPage', {
    duration: 1000,
    delay: 200,
    origin: 'bottom',
    easing: 'ease-in-out',
    mobile: false
});

document.querySelector('.menu-container--top button').addEventListener('click', () => {
    document.querySelector('.menu-container').classList.toggle('active')
})
document.addEventListener('DOMContentLoaded', function () {
    const inputs = document.querySelectorAll('.input');
    const labels = document.querySelectorAll('.label');

    for (let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', () =>
            (inputs[i].value.trim() !== '') ? labels[i].classList.add('active') : labels[i].classList.add('remove'))
    }

    for (let j = 0; j < inputs.length; j++) {
        (inputs[j].value.trim() !== '') ? labels[j].classList.add('active') : labels[j].classList.add('remove') }

    setInterval(()=>{
        for (let i = 0; i < inputs.length; i++) {
            if (labels[i].classList.contains('active')) {
                if (inputs[i].value.trim() === '') {
                    labels[i].classList.remove('active')
                }
            }
        }
    }, 1000)
})
