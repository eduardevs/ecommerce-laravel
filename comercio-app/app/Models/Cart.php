<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // use HasFactory;
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->items = $oldCart->totalPrice;
        }
    }

    public function add($item, $size, $color, $qty)
    {
        $storedItem = ['qty' => 0, 'product_id' => 0, 'product_name' => $item->p_name, 'product_price' => $item->p_featured_photo, 'size' => $size, 'color' => $color, 'item' => $item];

        if ($this->items) {
            if (array_key_exists($item->id, $this->items)) {
                $storedItem = $this->items[$item->id];
            }
        }

        $storedItem['qty'] += $qty;
        $storedItem['product_id'] = $item->id;
        $storedItem['product_name'] = $item->name;

        $storedItem['product_price'] = $item->p_current_price;
        $storedItem['product_image'] = $item->p_featured_photo;
        $storedItem['size'] = $size;
        $storedItem['color'] = $color;

        $this->totalQty += $qty;
        $this->totalPrice += $item->p_current_price * $qty;
        $this->items[$item->id] = $storedItem;
    }

    public function updateQty($id, $qty)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
        $this->totalQty += $qty;
        $this->totalPrice += $this->items[$id]['product_price'] * $qty;
    }

    public function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
        unset($this->items[$id]);
    }
}
