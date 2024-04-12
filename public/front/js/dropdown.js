$(function() {

    // Добавляем обработчик события клика на элементы списка внутри dropdown
    $('.dropdown-filter').on('click', '.dropdown-item', function(event) {
        // Отменяем всплытие события, чтобы оно не достигло родительских элементов,
        // включая сам dropdown
        $(this).hasClass('keep_open') && event.stopPropagation();
        // event.preventDefault();
    });

});
