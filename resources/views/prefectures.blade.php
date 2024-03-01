<option value="">都道府県を選択</option>
@foreach($prefectures as $prefecture)
    <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
@endforeach