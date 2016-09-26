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
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="col-md-6">
                <div class="row">
                    <ul>
                        @foreach ($goods as $item)
                            <li>{{ $item->name }} | {{ $item->category }}  </li>
                        @endforeach
                    </ul>
                    {{-- TODO stylish goods output  --}}
                </div>
                <div class="row">
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
                        <button type="submit" class="btn btn-lg btn-primary">Заказать</button>
                    </form>
                </div>
                <div class="row">
                    <div class="alert alert-danger" style="display: none">Заполните все необходимые поля</div>
                    <div class="alert alert-success" style="display: none">Ваша заявка принята</div>
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
                    console.log(json, textStatus);
                    $('.alert.alert-success').show();
                    _this.trigger('reset');
                },
                error: function (json, textStatus) {
                    console.log(textStatus);
                    $.each(json.responseJSON, function(key, value) {
                        $('[name=' + key + ']').parent().addClass('has-error');
                    });
                    $('.alert.alert-danger').show();
                }
            });
        })
    </script>

</html>
