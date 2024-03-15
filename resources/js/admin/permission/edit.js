import SearchFilter from "../../components/search-filter";

const filter = new SearchFilter(
    ".admin__permission-roles",
    ".checkbox__child",
    "div"
);

filter.filterFunction();
