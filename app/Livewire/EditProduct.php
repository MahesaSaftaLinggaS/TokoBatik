<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class EditProduct extends Component
{
    public $product_name = '';
    public $photo = ''; // changed to string for URL input
    public $product_description = '';
    public $product_price = '';
    public $category_id;
    public $currentUrl;
    public $all_categories;
    public $product_details;

    public function mount($id){
        $this->product_details = Product::find($id);
        $this->product_name = $this->product_details->name;
        $this->product_description = $this->product_details->description;
        $this->product_price = $this->product_details->price;
        $this->category_id = $this->product_details->category_id;
        $this->photo = $this->product_details->image;
        $this->all_categories = Category::all();
    }

    public function update(){
        //validation 
        $this->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|url', // Validate as URL
        ]);

        $photoPath = $this->photo; // Use the URL directly

        $this->product_details->update([
            'name' => $this->product_name,
            'description' => $this->product_description,
            'price' => $this->product_price,
            'category_id' => $this->category_id,
            'image' => $photoPath,
        ]);

        return $this->redirect('/products', navigate: true);
    }

    public function render()
    {
        return view('livewire.edit-product')->layout('admin-layout');
    }
}
