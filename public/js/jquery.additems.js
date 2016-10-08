var panelGoods = $('#choose-goods');
var panelOrders = $('#ordered-goods');
var countPopup = $('#count-popup');

panelGoods.find('li.good-item').each(function(index, el) {
    $(el).on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        var item = $(this).clone();

        // console.log();

        // countPopup.show();
        panelOrders.find('ul.good').append(item);
    });
});

$('#reset').on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    panelOrders.find('ul.good').empty();
});;
