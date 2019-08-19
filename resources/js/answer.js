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
                $(this).css("background-color", "yellow");
            } else {
                previousRating.css("background-color", "white");
                previousRating = $(this);
                $(this).css("background-color", "yellow");
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

            previousRating.css("background-color", "yellow");

            showAdditional();
        }
    };

    return {
        init,
        validationInit,
    };
}

window.answer = answer;
