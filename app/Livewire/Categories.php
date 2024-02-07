<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    //#[Rule('required|min:3|max:10')]
    public $category = '';

    public $search;

    public bool $success = false;

    public function render()
    {
        $catData = Category::where('categoryName','like',"%{$this->search}%")->paginate(5);

        return view('livewire.categories', compact('catData'));
    }

    public function addCategory()
    {
        $validated = $this->validate([
            'category' => 'required|min:3|max:50',
        ]);

       //$validated = $this->validate();
        
        Category::create([
            'categoryName' => $validated['category'],
        ]);

        $this->reset('category');

        $this->success = true;
    }

    public function deleteCategory($id){
        try {
            $category = Category::where('id', $id)->first();
            if($category != null){
                if( !$category->asset){
                    dd('yes');
                }else{
                    session()->flash('msgSuccess', 'No asset linked');
                    return;
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        dd($category->categoryName);
    }
}
