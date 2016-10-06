<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Food order</title>

        <script src="https://code.jquery.com/jquery-3.1.1.min.js" charset="utf-8"></script>
        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" >
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                {{-- {{ dd($goods) }} --}}
                <div class="panel panel-primary">
                    <div class="panel-heading">Выберите товары:</div>
                    <div class="panel-body">
                        <ul class="good">
                            @foreach ($goods as $item)
                                <li class="good-item">
                                    <a href="#">
                                        {{ $item->id }}
                                        <img src="{{ $item->image }}" width="100" height="100" alt="" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">Вы заказали:</div>
                    <div class="panel-body">
                        <ul class="good">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">Заполните форму ниже для заказа выбранных товаров:</div>
                    <div class="panel-body">
                        <form id="order" action="/foodorder" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Имя">
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="Адрес">
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Телефон">
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary" style="margin-bottom: 10px">Заказать</button>
                        </form>
                        <div class="alert alert-danger" style="display: none">Заполните все необходимые поля</div>
                        <div class="alert alert-success" style="display: none">Ваша заявка принята</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $('#order').on('submit', function (e) {
            e.preventDefault();
            var _this = $(this);
            var token = $('input[name=_token]').val();
            $('.has-error').removeClass('has-error');
            $('.alert').hide();
            $.ajax({
                url: _this.attr('action'),
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data:  _this.serialize(),
                dataType: 'json',
                success: function (json, textStatus) {
                    // console.log(json, textStatus);
                    $('.alert.alert-success').show();
                    _this.trigger('reset');
                },
                error: function (json, textStatus) {
                    // console.log(json);
                    $.each(json.responseJSON, function(key, value) {
                        $('[name=' + key + ']').parent().addClass('has-error');
                    });
                    $('.alert.alert-danger').show();
                }
            });
        })
    </script>

</html>
