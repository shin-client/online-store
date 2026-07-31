<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
 * PRODUCT ATTRIBUTES
 * @property int $id
 * @property string $name
 * @property string $category
 * @property string $description
 * @property string $image
 * @property int $price
 * @property string $icon
 * @property Illuminate\Support\Carbon|null @created_at
 * @property Illuminate\Support\Carbon|null @updated_at
 *
 * @method int getId()
 * @method void setId(int $id)
 * @method string getName()
 * @method void setName(string $name)
 * @method string getDescription()
 * @method void setDescription(string $description)
 * @method string getImage()
 * @method void setImage(string $image)
 * @method int getPrice()
 * @method void setPrice(int $price)
 * @method string getIcon()
 * @method void setIcon(string $icon)
 * @method string getCategory()
 * @method void setCategory(string $category)
 * */
class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'description',
        'image',
        'price',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getIcon(): string
    {
        return $this->attributes['icon'] ?? 'package';
    }

    public function setIcon(string $icon): void
    {
        $this->attributes['icon'] = $icon;
    }

    public function getCategory(): string
    {
        return $this->attributes['category'] ?? 'General';
    }

    public function setCategory(string $category): void
    {
        $this->attributes['category'] = $category;
    }

    public function getCreatedAt(): ?string
    {
        return $this->attributes['created_at'] ?? null;
    }

    public function setCreatedAt($value)
    {
        $this->attributes['created_at'] = $value;

        return $this;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->attributes['updated_at'] ?? null;
    }

    public function setUpdatedAt($value)
    {
        $this->attributes['updated_at'] = $value;

        return $this;
    }
}
