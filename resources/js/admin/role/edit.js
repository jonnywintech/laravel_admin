import SearchFilter from "../../components/search-filter";
import CheckBox from "../../components/checkbox";

const filter = new SearchFilter(
    ".admin__role-permission",
    ".checkbox__child",
    "div"
);

filter.filterFunction();

const checkbox = new CheckBox(
    ".checkbox__wrapper",
    ".checkbox__parent",
    ".checkbox__child"
);

checkbox.run();
