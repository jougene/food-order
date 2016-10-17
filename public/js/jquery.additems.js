(function () {
    var panelGoods = $('#choose-goods');
    var panelOrders = $('#ordered-goods');
    var countPopup = $('#count-popup');
    var goods = [];

    panelGoods.find('li.good-item').each(function(index, el) {
        $(el).on('click', function(event) {
            event.preventDefault();
            var goodItem = {};

            // countPopup.offset($(this).offset()).show();
            
            goodItem.id = $(this).find('a').attr('rel');
            goodItem.count = 1;
            goods.push(goodItem);
            $('[name=goods]').val(JSON.stringify(goods));
            panelOrders.find('ul.good').html(JSON.stringify(goods));

            // countPopup.find('[type=submit]').on('click', function () {
            //     console.log(goods);
            // });
        });
    });

    $('#reset').on('click', function(event) {
        event.preventDefault();

        goods = [];
        $('[name=goods]').val(goods);
        
        panelOrders.find('ul.good').empty();
    });
})();