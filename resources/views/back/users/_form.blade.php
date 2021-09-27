<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">ユーザー名</label>
    
    <div class="col-sm-10">
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ isset($user->name) ? $user->name : null }}">
        
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
 
<div class="form-group row">
    <label for="body" class="col-sm-2 col-form-label">メールアドレス</label>
    
    <div class="col-sm-10">
        <textarea name="email" class="form-control @error('email') is-invalid @enderror" rows="5">{{ isset($user->email) ? $user->email : null }}</textarea>
        
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
 
<div class="form-group row">
    <label for="is_public" class="col-sm-2 col-form-label">パスワード</label>
    
    <div class="col-sm-10">
        <textarea name="password" class="form-control @error('password') is-invalid @enderror" rows="5">{{ isset($user->password) ? $user->password : null }}</textarea>
        
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
</div>
 
<div class="form-group row">
    <label for="role" class="col-sm-2 col-form-label">権限</label>
    
    <div class="col-sm-10">
        <select type="select" name="role" class="form-control" >
            @foreach(config('common.user.roles') as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
    
    
</div>
 

 
<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
        <a href="{{route('back.posts.index')}}" class="btn btn-secondary">一覧へ戻る</a>
    </div>
</div>