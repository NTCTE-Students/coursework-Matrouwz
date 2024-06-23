@include('includes.header')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Главная</h1>
        </div>

        <div class="col-md-12 mb-4">
            <form method="GET" action="{{ route('index') }}">
                <div class="form-group">
                    <label for="category">Выберите категорию:</label>
                    <select class="form-control" id="category" name="category">
                        <option value="">Все</option>
                        @foreach($gifts as $gift)
                            <option value="{{ $gift->category }}" {{ request('category') == $gift->category ? 'selected' : '' }}>
                                {{ $gift->category }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Фильтр</button>
                <div class="form-group">
                    <br>
                    <label for="sort">Сортировка по цене:</label>
                    <select class="form-control" id="sort" name="sort">
                        <option value="">Без сортировки</option>
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>По возрастанию</option>
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>По убыванию</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Сортировка</button><br>
            </form>
            <h2 class="my-4">Выберите подарок</h2>
        </div>

        @foreach ($gifts as $gift)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">{{ $gift->name }}</h2>
                        <p class="card-title"><b>Категория:</b> {{ $gift->category }}</p>
                        <p class="card-title"><b>Цена:</b> {{ $gift->price }} руб.</p>
                        <a href="{{ route('gift.show', $gift) }}" class="btn btn-primary">Заказать</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
