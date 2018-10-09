{!! csrf_field() !!}

<div class="form-line">
    <label class="form-label" for="title">Title:</label>
    <input class="form-text-input" id="title" name="title" value="{{ old('title', $project->title) }}">
    @if($errors->has('title'))
        <div class="validation-error">{{ $errors->first('title') }}</div>
    @endif
</div>

<div class="form-line">
    <label class="form-label" for="url">URL:</label>
    <input class="form-text-input" id="url" name="url" value="{{ old('url', $project->url) }}">
    @if($errors->has('url'))
        <div class="validation-error">{{ $errors->first('url') }}</div>
    @endif
</div>

<div class="form-line">
    <label class="form-label" for="tools_used">Tools used:</label>
    <input class="form-text-input" id="tools_used" name="tools_used" value="{{ old('tools_used', $project->tools_used) }}">
    @if($errors->has('tools_used'))
        <div class="validation-error">{{ $errors->first('tools_used') }}</div>
    @endif
</div>

<div class="form-line">
    <label class="form-label" for="my_role">My role:</label>
    <textarea class="form-text-input" rows="3" id="my_role" name="my_role">{{ old('my_role', $project->my_role) }}</textarea>
    @if($errors->has('my_role'))
        <div class="validation-error">{{ $errors->first('my_role') }}</div>
    @endif
</div>

<div class="form-line">
    <label class="form-label" for="description">Description:</label>
    <textarea class="form-text-input markdown-editor" rows="15" id="description" name="description">{{ old('description', $project->markdown) }}</textarea>
    @if($errors->has('description'))
        <div class="validation-error">{{ $errors->first('description') }}</div>
    @endif
</div>

<div class="form-line form-checkbox">
    <input class="mr-2" name="published" value="1" type="checkbox" {{ $project->published_at ? 'checked' : '' }}> Published
</div>

<div class="form-line">
    <button type="submit" class="btn btn-blue">{{ $submitText }}</button>
</div>