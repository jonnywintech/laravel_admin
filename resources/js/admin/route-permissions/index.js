import SearchFilter from "../../components/search-filter";

const filter = new SearchFilter('.admin__routes-search','.permission__item-text', 'tr');
filter.filterFunction();


const submitButtons = document.querySelectorAll('.submit__button');


submitButtons.forEach(button => {
    button.addEventListener('click', ()=>{
        button.closest('tr').querySelector('form').submit();

    })
})
