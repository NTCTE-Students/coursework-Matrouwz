@include('includes.header')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h2 class="card-title">{{ $gift->name }}</h2>
            <p class="card-title">{{ $gift->description }}</p>
            <p class="card-title"><b>Категория:</b> {{ $gift->category }}</p>
            <p class="card-title"><b>Цена:</b> {{ $gift->price }} руб.</p>
            <p class="card-title"><b>Материал:</b> {{ $gift->material }}</p>

            <form action="{{ route('check.checkout', $gift) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="quantity">Количество:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="" required>
                </div>

                <label for="date_of_order">Выберите дату заказа:</label>
                <input class="date form-control" type="text" id="date_of_order" name="date_of_order" value="" required><br>

                <script type="text/javascript">

                    $('.date').datepicker({

                       format: 'mm-dd-yyyy'

                     });

                </script>

                <div class="form-group">
                    <label for="address">Адрес доставки:</label>
                    <input type="text" class="form-control" id="address" name="address" value="" required>
                </div>

                <fieldset>
                    <legend>Выберите способ оплаты:</legend>

                    <div>
                      <input type="radio" id="cash" name="payment" value="Наличные" />
                      <label for="cash">Наличные</label>
                    </div>

                    <div>
                      <input type="radio" id="card" name="payment" value="По карте" />
                      <label for="card">По карте</label>
                    </div>

                </fieldset>

                <button type="submit" class="btn btn-primary">Заказать</button>

            </form>

        </div>

    </div>
</div>
