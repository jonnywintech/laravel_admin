import SearchFilter from "../../components/search-filter";
import CheckBox from "../../components/checkbox";

class SearchFilterCustom extends SearchFilter{

    filterFunction() {
        const filter = this.searchBox.value.toLowerCase();
        for (let i = 0; i < this.elements.length; i++) {
            let txtValue =
                this.elements[i].value ||
                this.elements[i].innerText ||
                this.elements[i].textContent;
            txtValue = txtValue.toLowerCase();
            if (txtValue.includes(filter)) {
                this.elements[i].closest(this.targetParent).style.display = "";
                this.elements[i].style.display = "";
            } else {
                this.elements[i].closest(this.targetParent).style.display =
                this.elements[i].style.display = "none";
                    "none";
            }
        }
    }
}

const filter = new SearchFilterCustom(
    ".admin__role-permission",
    ".checkbox__child",
    "div"
);

filter.filterFunction();

class CheckBoxCustom extends CheckBox {


    run() {
        this.wrapper.forEach((box) => {
            const parent = box.querySelector(this.parentCheckbox);
            parent.addEventListener("click", () => {
                const children = box.querySelectorAll(this.childCheckbox);
                if (parent.checked) {
                    children.forEach((child) => {
                        if(child.style.display == "none"){
                            return;
                        }
                        child.checked = true;
                    });
                } else {
                    children.forEach((child) => {
                        child.checked = false;
                    });
                }
            });
        });
    }

}



const checkbox = new CheckBoxCustom(
    ".checkbox__wrapper",
    ".checkbox__parent",
    ".checkbox__child"
);

checkbox.run();

