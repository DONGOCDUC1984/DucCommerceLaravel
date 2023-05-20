<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', "user_id", "user_email", "description", "type", "price", "image_path", "user_tel", "city",
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters["tag"] ?? false) {
            $query->where("type", "like", "%" . request("tag") . "%");
        };

        if ($filters["search"] ?? false) {
            $query->where("name", "like", "%" . strtolower(request("search")) . "%")
                ->orWhere("user_email", "like", "%" . strtolower(request("search")) . "%")
                ->orWhere("description", "like", "%" . strtolower(request("search")) . "%")
                ->orWhere("type", "like", "%" . strtolower(request("search")) . "%")
                ->orWhere("user_tel", "like", "%" . request("search") . "%")
                ->orWhere("city", "like", "%" . strtolower(request("search")) . "%");
        };

        if ($filters["price"] ?? false) {
            $priceRange = explode(" ", request("price"));
            $query->where("price", ">=", (int)$priceRange[0])
                ->where("price", "<=", (int)$priceRange[1]);
        };
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
