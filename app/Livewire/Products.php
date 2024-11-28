<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $name, $price, $productId;
    public $searchName = ''; // For name search
    public $searchPrice = ''; // For price search
    public $isEditing = false;
    public $products = []; 

    public function mount()
    {
        $this->all();
    }

    public function all(){
        $this->products = Product::all();

        return $this->products;
    }

    public function render()
    {
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
        $this->fetchProducts(); 
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $product->id;
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
        $this->isEditing = false;
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
    }

    public function cancel()
    {
        $this->reset(['name', 'price', 'productId']);
        $this->isEditing = false;
    }

    public function search()
    {
        // dd(12);
        $this->products = Product::where('name', 'like', $this->searchName . '%')
        ->where('price', 'like', $this->searchPrice . '%')
        ->get();
    }
}
