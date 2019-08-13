function answer() {

    const init = () => {
        let form = $("#answer-form");

        $("#rating").change(function () {
            let rating = this.value;

            if (rating < 7) {
                $(".additional-info").show();
            } else {
                $(".additional-info").hide();
            }
        });

        form.submit(function() {
            $(this).find(".filter-input").filter(function(){ return !this.value; }).attr("disabled", "disabled");
            return true; // ensure form still submits
        });

        form.find(".filter-input").prop( "disabled", false );
    };

    return {
        init
    };
}

window.answer = answer;
