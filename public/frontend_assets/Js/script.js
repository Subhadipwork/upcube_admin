// Responsive sidebar

const rightSidebarOpen=()=>{
  $('#cart_sidebar').fadeIn(800);
  document.documentElement.style.cssText = 'height: 100%; overflow: hidden;';
}

const rightSidebarClose=()=>{
  $('#cart_sidebar').fadeOut(800);
  document.documentElement.style.cssText = 'height: 100%; overflow: auto;';
}

function showSiteMenu() {
  document.querySelector('.responsiveSiteMenu').style.cssText = 'transform: translate(0, 0);';
  document.documentElement.style.cssText = 'height: 100%; overflow: hidden;';
}

function hideSitemenu() {
  document.querySelector('.responsiveSiteMenu').style.cssText = 'transform: translate(-350px, 0);';
  document.documentElement.style.cssText = 'height: 100%; overflow: auto;';
}

// Search bar open

const searchBarOpen=()=>{
  document.querySelector('.search_bar').style.cssText = 'width: 100%; display: block;';
}

const searchBarClose=()=>{
  document.querySelector('.search_bar').style.cssText = 'width: 100%; display: none;';
}




// add to cart numbers

$(document).ready(function() {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
}
);

// prdouct details page gallery

let cardContainer = document.querySelector(".details_body");
// console.log(cardContainer);
let bigImageCard = document.querySelector(".fullImage");
// console.log(bigImageCard);
let smallImageCard = document.querySelectorAll(".smallImages img");
// console.log(smallImageCard);

// bigImageCard.addEventListener("click", (e) => {
//   e.target.style = "transform: scale(2.2)";
// });
// bigImageCard.addEventListener("mouseover", (e) => {
//   e.target.style = "transform: scale(1)";
// });
// // for mobile device users.
// bigImageCard.addEventListener("touchend", (e) => {
//   e.target.style = "transform: scale(1)";
// });
smallImageCard.forEach((Element) => {
  Element.addEventListener("click", (e) => {
    // console.log(e.target.src);
    bigImageCard.src = e.target.src;
  });
});


// Countdown timer

// Get the countdown container element
const countdownContainer = document.getElementById("countdown-container");

// Set the target date and time (adjust it according to your needs)
const targetDate = new Date("2023-12-31T23:59:59").getTime();

// Function to initialize the countdown
function startCountdown() {
  // Get the current date and time
  const currentDate = new Date().getTime();

  // Calculate the time remaining
  const timeRemaining = targetDate - currentDate;

  // Calculate and update the days, hours, minutes, and seconds
  // const daysElement = document.getElementById("days");
  const hoursElement = document.getElementById("hours");
  const minutesElement = document.getElementById("minutes");
  const secondsElement = document.getElementById("seconds");

  // Calculate the days, hours, minutes, and seconds remaining
  let days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
  let hours = Math.floor(
    (timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 20 * 20)
  );
  let minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
  let seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
hours = String(hours).padStart(2, "0");
  minutes = String(minutes).padStart(2, "0");
  seconds = String(seconds).padStart(2, "0");
  // Update the HTML elements with the calculated values
  // daysElement.textContent = days;
  hoursElement.textContent = hours;
  minutesElement.textContent = minutes;
  secondsElement.textContent = seconds;

  // TODO: Implement the countdown logic to update the timer every second
}

// ...

// Update the countdown timer every second
setInterval(startCountdown, 1000);

// ...


// add to cart numbers in sidebar

$(document).ready(function() {
  $('.cartminus').click(function () {
      var $input = $(this).parent().find('input');
      var count = parseInt($input.val()) - 1;
      count = count < 1 ? 1 : count;
      $input.val(count);
      $input.change();
      return false;
  });
  $('.cartplus').click(function () {
      var $input = $(this).parent().find('input');
      $input.val(parseInt($input.val()) + 1);
      $input.change();
      return false;
  });
}
);

// const searchBox = document.querySelector(".searchBox");
// const searchBtn = document.querySelector(".search");
// const closeBtn = document.querySelector(".close");

// searchBtn.addEventListener("click", () => {
//   searchBox.classList.add("active");
// });
// closeBtn.addEventListener("click", () => {
//   searchBox.classList.remove("active");
// });




