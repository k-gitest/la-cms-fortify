<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ログイン | Laravelチュートリアル</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<div id="app">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">ログイン</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" accept-charset="UTF-8">
                            @csrf
                            
                            <div class="form-group">
                                <label for="name">ユーザー名</label>
                                <input name="name" class="@error('name') is-invalid @enderror" type="text" value="">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="password">パスワード</label>
                                <input name="password" class="@error('password') is-invalid @enderror" type="password" value="">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div>
                                <button type="submit" class="btn btn-primary">ログイン</button>
                            </div>
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>