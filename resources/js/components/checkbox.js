export default class CheckBox {
    constructor(wrapper, parentCheckbox, childCheckbox) {
        this.wrapper = document.querySelectorAll(`${wrapper}`);
        this.parentCheckbox = `${parentCheckbox}`;
        this.childCheckbox = `${childCheckbox}`;
    }

    run() {
        this.wrapper.forEach((box) => {
            const parent = box.querySelector(this.parentCheckbox);
            parent.addEventListener("click", () => {
                const children = box.querySelectorAll(this.childCheckbox);
                if (parent.checked) {
                    children.forEach((child) => {
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
