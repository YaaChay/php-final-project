var rates = document.querySelectorAll(".rate");
var reviewRates = document.querySelectorAll(".reviewRate");
var itemReviewBar = document.querySelector(".itemReviewBar");
var star1 = document.getElementById("star1");
var star2 = document.getElementById("star2");
var star3 = document.getElementById("star3");
var star4 = document.getElementById("star4");
var star5 = document.getElementById("star5");

rates.forEach(rate => {
    for (let i = 1; i <= 5; i++) {
        var iElement = document.createElement("i");
        var star = rate.dataset.star;
        if (i > star) {
            iElement.setAttribute("class", "bi bi-star");
            rate.appendChild(iElement);
        } else {
            iElement.setAttribute("class", "bi bi-star-fill");
            rate.appendChild(iElement);
        }

    }
});

reviewRates.forEach(rate => {
    for (let i = 1; i <= 5; i++) {
        var iElement = document.createElement("i");
        var star = rate.dataset.star;
        if (i > star) {
            iElement.setAttribute("class", "bi bi-star");
            rate.appendChild(iElement);
        } else {
            iElement.setAttribute("class", "bi bi-star-fill");
            rate.appendChild(iElement);
        }
    }

});


//add click function to stars
star1.onclick = () => {
    itemReviewBar.dataset.star = 1;
    star1.removeAttribute("class");
    star1.setAttribute("class", "bi bi-star-fill");
    star2.removeAttribute("class");
    star2.setAttribute("class", "bi bi-star");
    star3.removeAttribute("class");
    star3.setAttribute("class", "bi bi-star");
    star4.removeAttribute("class");
    star4.setAttribute("class", "bi bi-star");
    star5.removeAttribute("class");
    star5.setAttribute("class", "bi bi-star");
};
star2.onclick = () => {
    itemReviewBar.dataset.star = 2;
    star1.removeAttribute("class");
    star1.setAttribute("class", "bi bi-star-fill");
    star2.removeAttribute("class");
    star2.setAttribute("class", "bi bi-star-fill");
    star3.removeAttribute("class");
    star3.setAttribute("class", "bi bi-star");
    star4.removeAttribute("class");
    star4.setAttribute("class", "bi bi-star");
    star5.removeAttribute("class");
    star5.setAttribute("class", "bi bi-star");
};
star3.onclick = () => {
    itemReviewBar.dataset.star = 3;
    star1.removeAttribute("class");
    star1.setAttribute("class", "bi bi-star-fill");
    star2.removeAttribute("class");
    star2.setAttribute("class", "bi bi-star-fill");
    star3.removeAttribute("class");
    star3.setAttribute("class", "bi bi-star-fill");
    star4.removeAttribute("class");
    star4.setAttribute("class", "bi bi-star");
    star5.removeAttribute("class");
    star5.setAttribute("class", "bi bi-star");
};
star4.onclick = () => {
    itemReviewBar.dataset.star = 4;
    star1.removeAttribute("class");
    star1.setAttribute("class", "bi bi-star-fill");
    star2.removeAttribute("class");
    star2.setAttribute("class", "bi bi-star-fill");
    star3.removeAttribute("class");
    star3.setAttribute("class", "bi bi-star-fill");
    star4.removeAttribute("class");
    star4.setAttribute("class", "bi bi-star-fill");
    star5.removeAttribute("class");
    star5.setAttribute("class", "bi bi-star");
};
star5.onclick = () => {
    itemReviewBar.dataset.star = 5;
    star1.removeAttribute("class");
    star1.setAttribute("class", "bi bi-star-fill");
    star2.removeAttribute("class");
    star2.setAttribute("class", "bi bi-star-fill");
    star3.removeAttribute("class");
    star3.setAttribute("class", "bi bi-star-fill");
    star4.removeAttribute("class");
    star4.setAttribute("class", "bi bi-star-fill");
    star5.removeAttribute("class");
    star5.setAttribute("class", "bi bi-star-fill");
};