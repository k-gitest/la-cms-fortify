<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;//追加
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'body', 'is_public', 'published_at'
    ];
 
    protected $casts = [
        'is_public' => 'bool',
        'published_at' => 'datetime'
    ];
    
    //スコープ機能　公開のみ表示
    public function scopePublic(Builder $query)
    {
        return $query->where('is_public', true);
    }
 
    //スコープ機能 公開記事一覧取得
    public function scopePublicList(Builder $query , string $tagSlug = null)
    {
        if ($tagSlug) {
            $query->whereHas('tags', function($query) use ($tagSlug) {
                $query->where('slug', $tagSlug);
            });
        }
        
        return $query
            ->with('tags')//追加
            ->public()
            ->latest('published_at')
            ->paginate(10);
    }
 
    //スコープ機能 公開記事をIDで取得
    public function scopePublicFindById(Builder $query, int $id)
    {
        return $query->public()->findOrFail($id);
    }
    
    // 公開日を年月日で表示
    public function getPublishedFormatAttribute()
    {
        return $this->published_at->format('Y年m月d日');
    }
    
    //Userモデルとのリレーション設定
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    //Tagモデルとのリレーション設定
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
    protected static function boot()
    {
        parent::boot();
     
        // 保存時user_idをログインユーザーに設定
        self::saving(function($post) {
            $post->user_id = \Auth::id();
        });
    }
    
}
