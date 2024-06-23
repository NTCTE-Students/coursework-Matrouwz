@include('includes.header')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">История заказов</h2>
            @foreach(Auth::user()->checks as $check)
            <div class="card my-2">
                <div class="card-body">
                    <h5 class="card-title">Чек #{{ $check->id }}</h5>
                    <h2 class="card-title"><b>Товар:</b> {{ $check->gift->name }}</h2>
                    <p class="card-title"><b>Описание:</b> {{ $check->gift->description }}</p>
                    <p class="card-title"><b>Категория:</b> {{ $check->gift->category }}</p>
                    <p class="card-title"><b>Материал:</b> {{ $check->gift->material }}</p>
                    <p class="card-title"><b>Количество:</b> {{ $check->quantity }} шт.</p>
                    <p class="card-title"><b>Цена:</b> {{ $check->gift->price }} руб.</p>
                    <p class="card-title"><b>Способ оплаты:</b> {{ $check->payment }}</p>
                    <p class="card-title"><b>Дата доставки:</b> {{ $check->date_of_order }}</p>
                    <p class="card-title"><b>Дата оформления заказа:</b> {{ $check->order_date }}</p>


                    @if(empty($check->review))
                            <form action="{{ route('checks.review', $check->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="comment">Оставьте отзыв:</label>
                                    <textarea class="form-control" id="comment" name="comment"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Оценка:</label>
                                    <div>
                                        @for($i = 1; $i <= 5; $i++)
                                            <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}>
                                            <label for="star{{ $i }}">{{ $i }}</label>
                                        @endfor
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Отправить отзыв</button>
                            </form>
                        @else
                            <p><b>Ваш отзыв:</b> {{ $check->review->comment }}</p>
                            <p><b>Ваша оценка:</b> {{ $check->review->rating }} из 5</p>
                        @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
