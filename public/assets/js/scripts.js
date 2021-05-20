console.log("hello");

/*===== NAV MENU TOGGLER =====*/
menuToggler.addEventListener('click', ev => {
    menu.classList.toggle('open');
    menuToggler.textContent = menuToggler.textContent === "×" ? "≡" : "×";
});

/*===== SCROLL REVEAL ANIMATION =====*/
const sr = ScrollReveal({
    origin: 'top',
    distance: '80px',
    duration: 2000,
    reset: true
});


/*SCROLL HOME*/
//Hero
sr.reveal('.main-head-index', {});
sr.reveal('.main-head-index2', {delay: 400});

//Categories
sr.reveal('.categories', {delay: 460});

//Explore
sr.reveal('.explore-section', {delay: 400});

//Footer Socials
sr.reveal('.reveal-socials', {interval: 700});
