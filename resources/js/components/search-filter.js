export default class SearchFilter {
    constructor(searchBox, elements) {
        this.searchBox = document.querySelector(`.${searchBox}`);
        this.elements = document.querySelectorAll(`.${elements}`);

        // Bind event listeners
        this.searchBox.addEventListener('input', this.filterFunction.bind(this));
    }

    filterFunction() {
        const filter = this.searchBox.value.toLowerCase();
        for (let i = 0; i < this.elements.length; i++) {
            const txtValue = this.elements[i].value.toLowerCase();
            if (txtValue.includes(filter)) {
                this.elements[i].closest('div').style.display = "";
            } else {
                this.elements[i].closest('div').style.display = "none";
                console.log(this.elements[i].closest('div'));
            }
        }
    }

    testClass() {
        console.log("class is working");
    }
}
