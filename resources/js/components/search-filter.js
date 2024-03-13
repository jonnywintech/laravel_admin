
/**
 * Description placeholder
 * @date 3/13/2024 - 12:25:25 AM
 *
 * @export
 * @class SearchFilter it creates filter for search result without reloading page
 * @typedef {SearchFilter}
 */
export default class SearchFilter {

    /**
     * Creates an instance of SearchFilter.
     * @date 3/13/2024 - 12:24:25 AM
     *
     * @constructor
     * @param {*} searchBox it is queryselector so specify class or id with . or #
     * @param {*} elements  it should be specific element or class to hook on
     * @param {string} [targetParent='div'] this is earch element which should be deleted. It is parent element of elements.
     */
    constructor(searchBox, elements, targetParent = 'div') {
        this.searchBox = document.querySelector(`${searchBox}`);
        this.elements = document.querySelectorAll(`${elements}`);
        this.targetParent = targetParent;
        // Bind event listeners
        this.searchBox.addEventListener('input', this.filterFunction.bind(this));
    }

    /**
     * filterFunction that run the whole operation search
     * @date 3/13/2024 - 12:28:28 AM
     */
    filterFunction() {
        const filter = this.searchBox.value.toLowerCase();
        for (let i = 0; i < this.elements.length; i++) {
            let txtValue = this.elements[i].value
            || this.elements[i].innerText
            || this.elements[i].textContent;
                txtValue = txtValue.toLowerCase();
            if (txtValue.includes(filter)) {
                this.elements[i].closest(this.targetParent).style.display = "";
            } else {
                this.elements[i].closest(this.targetParent).style.display = "none";
            }
        }
    }

    /**
     * Testing class to be called to test if you correctly instantiated class.
     * @date 3/13/2024 - 12:28:57 AM
     */
    testClass() {
        console.log("class is working");
    }
}
