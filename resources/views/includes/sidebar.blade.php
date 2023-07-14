<div class="sidebar">
    <form action="{{ route('filter') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tag-filter"><h4>Фильтр по тегам</h4></label>
            <select id="tag-filter" class="form-control border-0" multiple name="tag_ids[]">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, request()->input('tag_ids', [])) ? 'selected' : '' }}>{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-outline-secondary mt-1">Применить</button>
    </form>
</div>




