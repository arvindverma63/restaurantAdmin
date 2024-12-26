'use strict';

/* ===== Enable Bootstrap Popover (on element  ====== */
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

/* ==== Enable Bootstrap Alert ====== */
//var alertList = document.querySelectorAll('.alert')
//alertList.forEach(function (alert) {
//  new bootstrap.Alert(alert)
//});

const alertList = document.querySelectorAll('.alert')
const alerts = [...alertList].map(element => new bootstrap.Alert(element))


/* ===== Responsive Sidepanel ====== */
const sidePanelToggler = document.getElementById('sidepanel-toggler');
const sidePanel = document.getElementById('app-sidepanel');
const sidePanelDrop = document.getElementById('sidepanel-drop');
const sidePanelClose = document.getElementById('sidepanel-close');

window.addEventListener('load', function () {
    responsiveSidePanel();
});

window.addEventListener('resize', function () {
    responsiveSidePanel();
});


function responsiveSidePanel() {
    let w = window.innerWidth;
    if (w >= 1200) {
        // if larger
        //console.log('larger');
        sidePanel.classList.remove('sidepanel-hidden');
        sidePanel.classList.add('sidepanel-visible');

    } else {
        // if smaller
        //console.log('smaller');
        sidePanel.classList.remove('sidepanel-visible');
        sidePanel.classList.add('sidepanel-hidden');
    }
};

sidePanelToggler.addEventListener('click', () => {
    if (sidePanel.classList.contains('sidepanel-visible')) {
        console.log('visible');
        sidePanel.classList.remove('sidepanel-visible');
        sidePanel.classList.add('sidepanel-hidden');

    } else {
        console.log('hidden');
        sidePanel.classList.remove('sidepanel-hidden');
        sidePanel.classList.add('sidepanel-visible');
    }
});



sidePanelClose.addEventListener('click', (e) => {
    e.preventDefault();
    sidePanelToggler.click();
});

sidePanelDrop.addEventListener('click', (e) => {
    sidePanelToggler.click();
});



/* ====== Mobile search ======= */
const searchMobileTrigger = document.querySelector('.search-mobile-trigger');
const searchBox = document.querySelector('.app-search-box');

searchMobileTrigger.addEventListener('click', () => {

    searchBox.classList.toggle('is-visible');

    let searchMobileTriggerIcon = document.querySelector('.search-mobile-trigger-icon');

    if (searchMobileTriggerIcon.classList.contains('fa-magnifying-glass')) {
        searchMobileTriggerIcon.classList.remove('fa-magnifying-glass');
        searchMobileTriggerIcon.classList.add('fa-xmark');
    } else {
        searchMobileTriggerIcon.classList.remove('fa-xmark');
        searchMobileTriggerIcon.classList.add('fa-magnifying-glass');
    }



});


document.querySelectorAll('.time-forward').forEach(element => {

    timerForward(element);

    setInterval(() => { timerForward(element) }, 1000);

});

function timerForward(elementToSetTime) {
    const timeStr = elementToSetTime.getAttribute('data-time');
    if(!timeStr) return;

    const givenTime = new Date(timeStr);
    const now = new Date();
    const timeDiff = now - givenTime;

    const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeDiff / (1000 * 60 * 60)) % 24).toString().padStart(2, '0');
    const minutes = Math.floor((timeDiff / (1000 * 60)) % 60).toString().padStart(2, '0');
    const seconds = Math.floor((timeDiff / 1000) % 60).toString().padStart(2, '0');


    elementToSetTime.innerHTML = ` ${hours}:${minutes}:${seconds} `;
}
