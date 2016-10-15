(function () {
    var panelGoods = $('#choose-goods');
    var panelOrders = $('#ordered-goods');
    var countPopup = $('#count-popup');
    var goods = [];

    panelGoods.find('li.good-item').each(function(index, el) {
        $(el).on('click', function(event) {
            event.preventDefault();
            /* Act on the event */
            var item = $(this).clone();
            
            goods.push($(this).find('a').attr('rel'));
            $('[name=goods]').val(goods);

            countPopup.offset($(this).offset());
            countPopup.show();
            
            countPopup.find('[name=plus]').on('click', function () {
                counter++;      
                $(this).off('click');
            });

            countPopup.find('[name=minus]').on('click', function () {
                counter--;
                $(this).off('click');
            });

            countPopup.find('[type=submit]').on('click', function () {
                panelOrders.find('ul.good').append(item);
            });
        });
    });

    $('#reset').on('click', function(event) {
        event.preventDefault();

        goods = [];
        $('[name=goods]').val(goods);
        /* Act on the event */
        panelOrders.find('ul.good').empty();
    });
})();