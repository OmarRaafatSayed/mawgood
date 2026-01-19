public function products()
{
    return $this->hasMany(Product::class);
}

public function orders()
{
    return $this->hasManyThrough(Order::class, Product::class);
}