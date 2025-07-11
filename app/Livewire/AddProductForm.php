<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class AddProductForm extends Component
{
    public $currentUrl;
    public $product_name = '';
    public $photo = ''; // now a string for image URL
    public $product_description = '';
    public $product_price = '';

    public $category_id;

    public $all_categories;

    public function mount(){
        $this->all_categories = Category::all();
    }
    
    public function save(){
        $this->validate([
            'product_name' => 'required',
            'photo' => 'required|url',
            'product_description' => 'required',
            'product_price' => 'required|numeric',
            'category_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $this->product_name;
        $product->image = $this->photo; // store image URL directly
        $product->description = $this->product_description;
        $product->price = $this->product_price;
        $product->category_id = $this->category_id;
        $product->save();

        return $this->redirect('/products', navigate: true);
    }
    public function render()
    {
        $current_url = url()->current();
        $explode_url = explode('/',$current_url);
        
        $this->currentUrl = $explode_url[3].' '.($explode_url[4] ?? '');

        return view('livewire.add-product-form');
    }
}
