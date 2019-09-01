function getBuilder(part) {
    return (id = 0, context) =>
        context ? context.find(`${part}_${id}`) : $(`${part}_${id}`);
}

function answer() {
    const getRating = getBuilder('#rating');

    let selectedRating = null;
    let previousRating = null;
    let form = $("#answer-form");
    let number = $(".number");

    const showAdditional = () => {
        if (selectedRating < 7) {
            $(".additional-info").show();
        } else {
            $(".additional-info").hide();
        }

    };

    const init = () => {

        number.click(function () {
            selectedRating = $(this).data("rating");

            if (previousRating === null) {
                previousRating = $(this);
                $(this).toggleClass("number--active");
            } else {
                previousRating.toggleClass("number--active");
                previousRating = $(this);
                $(this).toggleClass("number--active");
            }

            showAdditional();
        });

        form.submit(function() {
            $(this).find(".filter-input").filter(function(){ return !this.value; }).attr("disabled", "disabled");
            $("<input />").attr("type", "hidden")
                .attr("name", "rating")
                .attr("value", selectedRating)
                .appendTo(this);
            return true;
        });
    };

    const validationInit = (rating) => {

        if (rating !== '') {
            selectedRating = rating;
            previousRating =  getRating(rating);

            previousRating.toggleClass("number--active");

            showAdditional();
        }
    };

    return {
        init,
        validationInit,
    };
}

window.answer = answer;
