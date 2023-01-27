var rates = document.querySelectorAll(".rate");
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
