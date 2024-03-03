// define all UI variable
const navToggler = document.querySelector('.nav-toggler');
const navMenu = document.querySelector('.site-navbar ul');
const navLinks = document.querySelectorAll('.site-navbar a');

// load all event listners`
allEventListners();

// functions of all event listners
function allEventListners() {
  // toggler icon click event
  navToggler.addEventListener('click', togglerClick);
  // nav links click event
  navLinks.forEach( elem => elem.addEventListener('click', navLinkClick));
}

// togglerClick function
function togglerClick() {
  navToggler.classList.toggle('toggler-open');
  navMenu.classList.toggle('open');
}

// navLinkClick function
function navLinkClick() {
  if(navMenu.classList.contains('open')) {
    navToggler.click();
  }
}


// Modal popup
document.addEventListener('DOMContentLoaded', function () {
    var buttons = document.querySelectorAll('.show-popup');

    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            var modal = document.getElementById('memberModal');
            var modalImg = modal.querySelector('.modal-img');
            var modalName = modal.querySelector('.modal-name');
            var modalDetail = modal.querySelector('.modal-detail');
            var modalNumber = modal.querySelector('.modal-number');
            var modalExpert = modal.querySelector('.modal-expert');

            modalImg.src = button.getAttribute('data-member-img');
            modalName.textContent = button.getAttribute('data-member-name');
            modalDetail.textContent = button.getAttribute('data-member-detail');
            modalNumber.textContent = button.getAttribute('data-member-number');
            // Clear existing bullet points
            modalExpert.innerHTML = '';

            // Parse the modal-expert data as JSON array
            var expertise = JSON.parse(button.getAttribute('data-member-expert'));

            // Display each bullet point as a list item
            expertise.forEach(function (point) {
                var li = document.createElement('li');
                li.textContent = point;
                modalExpert.appendChild(li);
            });

            modal.showModal();

            modal.showModal();
        });
    });

    var btnClose = document.querySelector('.btn-close');
    btnClose.addEventListener('click', function () {
        var modal = document.getElementById('memberModal');
        modal.close();
    });
});