<?php

namespace App\Livewire;

use App\Jobs\ResizeImage;
use session;
use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class CreateArticleForm extends Component
{
    use WithFileUploads;
    
    #[Validate('required', message: 'Il titolo è obbligatorio')]
    #[Validate('min:5' , message: 'Il titolo deve avere almeno 5 caratteri')]
    #[Validate('max:255', message: 'Il titolo deve avere massimo 255 caratteri')]
    public $title;
    #[Validate('required', message: 'La descrizione è obbligatoria')]
    #[Validate('min:10', message: 'La descrizione deve avere almeno 10 caratteri')]
    public $description;
    #[Validate('required', message: 'Il prezzo è obbligatorio')]
    #[Validate('numeric', message: 'Il prezzo deve essere un numero')]
    public $price;
    #[Validate('required', message: 'La categoria è obbligatoria')]
    public $category_id;
    public $article;
    public $images = [];
    public $temporary_images;
    
    public function store() {
        $this->validate();
        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => Auth::id(),
        ]);
        
        if(count($this->images) > 0){
            foreach($this->images as $image){
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create([
                    'path' => $image->store($newFileName, 'public'),
                ]);
                dispatch(new ResizeImage($newImage->path, 1200, 800));

                /* $this->article->images()->create([
                    'path' => $image->store('images', 'public'),
                ]); */
            }
            File::deleteDirectory(storage_path('app/livewire/tmp'));
        }

        $this->reset();

        
        session()->flash('success', 'Articolo creato con successo');
    }
    
    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image|max:2048',
            'temporary_images' => 'max:6',
            ])){
              
                foreach($this->temporary_images as $image){
                    $this->images[] = $image;
                }
            }
        }
        public function render()
        {
            return view('livewire.create-article-form');
        }

        public function removeImage($key){
            if(in_array($key, array_keys($this->images))){
                unset($this->images[$key]);
            }
        }
    }
    