const boxes = document.querySelectorAll(".checkbox__wrapper");

boxes.forEach((box) => {
    const parent = box.querySelector(".checkbox__parent");
    parent.addEventListener("click", () => {
        const children = box.querySelectorAll(".checkbox__child");
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
