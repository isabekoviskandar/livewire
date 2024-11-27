<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $name, $price, $productId;
    public $products;
    public $isEditing = false;

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products');
    }

    public function create()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create([
            'name' => $this->name,
            'price' => $this->price,
        ]);

        $this->reset(['name', 'price']);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $product->id; // Correct property
        $this->name = $product->name;
        $this->price = $product->price;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($this->productId);
        $product->update([
            'name' => $this->name,
            'price' => $this->price,
        ]);

        $this->reset(['name', 'price', 'productId']);
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
    }
}
