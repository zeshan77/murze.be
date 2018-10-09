{!! csrf_field() !!}

<div class="form-line">
    <label class="form-label" for="title">Title:</label>
    <input class="form-text-input" id="title" name="title" value="{{ old('title', $page->title) }}">
    @if($errors->has('title'))
        <div class="validation-error">{{ $errors->first('title') }}</div>
    @endif
</div>

<div class="form-line">
    <label class="form-label" for="text">Content:</label>
    <textarea class="form-text-input markdown-editor" rows="15" id="text" name="content">{{ old('content', $page->markdown) }}</textarea>
    @if($errors->has('content'))
        <div class="validation-error">{{ $errors->first('content') }}</div>
    @endif
</div>

<div class="form-line form-checkbox">
    <input class="mr-2" name="published" value="1" type="checkbox" {{ $page->published_at ? 'checked' : '' }}> Published
</div>

<div class="form-line">
    <button type="submit" class="btn btn-blue">{{ $submitText }}</button>
</div>