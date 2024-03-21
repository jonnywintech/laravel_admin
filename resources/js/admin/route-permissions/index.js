import SearchFilter from "../../components/search-filter";

const filter = new SearchFilter(
    ".admin__routes-search",
    ".permission__item-text",
    "tr"
);
filter.filterFunction();

const submitButtons = document.querySelectorAll(".submit__button");

submitButtons.forEach((button) => {
    button.addEventListener("click", () => {
        storeScrollPosition();
        button.closest("tr").querySelector("form").submit();
    });
});

const deleteButtons = document.querySelectorAll(".permission__item-button");

deleteButtons.forEach((button) => {
    button.addEventListener("click", () => {
        const textValue = button.parentNode.innerText.slice(0, -2);
        let input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "delete_permission[]");
        input.value = textValue;
        button.closest("td").querySelector("form").appendChild(input);
        button.parentNode.remove();
    });
});

const storeScrollPosition = () => {
    let scrollPos = window.scrollY;
    localStorage.setItem("scrollPosition", scrollPos);
};

window.onload = function() {
    let scrollPos = localStorage.getItem('scrollPosition');
    if (scrollPos !== null) {
        window.scrollTo(0, scrollPos);
        localStorage.removeItem('scrollPosition');
    }
}
