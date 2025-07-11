<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ManageCategories extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';
    public $search = '';
    public $currentUrl;

    public $categoryIdBeingEdited = null;
    public $name;

    public function setSortBy($sortColum){
        if ($this->sortBy == $sortColum) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        
        $this->sortBy = $sortColum;
        $this->sortDir = 'ASC';
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryIdBeingEdited = $category->id;
        $this->name = $category->name;
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($this->categoryIdBeingEdited);
        $category->name = $this->name;
        $category->save();

        session()->flash('success', 'Category updated successfully.');

        $this->reset(['categoryIdBeingEdited', 'name']);
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        session()->flash('success', 'Category deleted successfully.');
    }

    public function render()
    {
        $current_url = url()->current();
        $explode_url = explode('/',$current_url);
        
        $this->currentUrl = $explode_url[3].' '.$explode_url[4];

        return view('livewire.manage-categories',[
            'categories' => Category::search($this->search)
            ->orderBy($this->sortBy,$this->sortDir)
            ->paginate($this->perPage)
        ]);
    }
}
