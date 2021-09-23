<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">タイトル</label>
    
    <div class="col-sm-10">
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" required value="{{ isset($post->title) ? $post->title : null }}">
        
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
 
<div class="form-group row">
    <label for="body" class="col-sm-2 col-form-label">内容</label>
    
    <div class="col-sm-10">
        <textarea name="body" class="form-control @error('body') is-invalid @enderror" rows="5">{{ isset($post->body) ? $post->body : null }}</textarea>
        
        @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
 
<div class="form-group row">
    <label for="is_public" class="col-sm-2 col-form-label">ステータス</label>
    
    <div class="col-sm-10">
        @foreach([1 => '公開', 0 => '非公開'] as $key => $value)
            <div class="form-check form-check-inline">
                <input type="radio" name="is_public" id="is_public{{ $key }}" class="form-check-input @error('is_public') is-invalid @enderror" {{ isset($post) ? $post->is_public == $key  ? 'checked' :'' :'' }} value="{{ $key }}">
                
                <label for="is_public{{ $key }}" class="form-check-label">{{ $value }}</label>
                @if($key === 0)
                    @error('is_public')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                @endif
            </div>
        @endforeach
    </div>
</div>
 
<div class="form-group row">
    <label for="published_at" class="col-sm-2 col-form-label">公開日</label>
    
    <div class="col-sm-10">
        <input type="datetime" name="published_at" value="{{ isset($post->published_at)
                ? $post->published_at->format('Y-m-d H:i')
                : now()->format('Y-m-d H:i') }}" class="form-control @error('published_at') is-invalid @enderror">
        
        @error('published_at')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
 
<div class="form-group row">
    <label for="tags" class="col-sm-2 control-label">タグ</label>

    <div class="col-sm-10">
        <div class="{{ $errors->has('tags.*') ? 'is-invalid' : '' }}">
            @foreach ($tags as $key => $tag)
                <div class="form-check form-check-inline">
                    
                    <input type="checkbox" name="tags[]" class="form-check-input" id="tag{{ $key }}" value="{{ $key }}" {{ $key == $tag ? 'selected' : '' }}>
                    
                    <label class="form-check-label" for="tag{{$key}}">{{ $tag }}</label>
                </div>
            @endforeach
        </div>
        @error('tags.*')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>
 
<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
        <a href="{{route('back.posts.index')}}" class="btn btn-secondary">一覧へ戻る</a>
    </div>
</div>