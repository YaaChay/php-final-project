var rates = document.querySelectorAll(".rate");
var itemRates = document.querySelectorAll(".itemRate");
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
itemRates.forEach(rate => {
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