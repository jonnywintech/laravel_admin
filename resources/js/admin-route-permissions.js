let forms = document.querySelectorAll("form");

function load() {
    forms.forEach((form) => {
        let data = [];

        const deleteButtons = form.querySelectorAll(".permission__item-button");
        let deleteInput = form.querySelector(".permission__delete-container");

        deleteButtons.forEach((deleteButton) => {
            deleteButton.addEventListener("click", () => {
                console.log("clicked delete button");
                data.push(deleteButton.previousElementSibling.textContent);
                deleteInput.value = JSON.stringify(data);
                deleteButton.closest("div").remove();
            });
        });
    });
}

load();
