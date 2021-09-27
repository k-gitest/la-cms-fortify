<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">タグ名</label>
    
    <div class="col-sm-10">
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ isset($tag->name) ? $tag->name : null }}">
        
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
 
<div class="form-group row">
    <label for="slug" class="col-sm-2 col-form-label">スラッグ</label>
    
    <div class="col-sm-10">
        <textarea name="slug" class="form-control @error('slug') is-invalid @enderror" rows="5">{{ isset($tag->slug) ? $tag->slug : null }}</textarea>
        
        @error('tag')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
 
<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
        <a href="{{route('back.tags.index')}}" class="btn btn-secondary">一覧へ戻る</a>
    </div>
</div>