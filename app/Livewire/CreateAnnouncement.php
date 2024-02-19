<?php

namespace App\Livewire;

use Livewire\Component;
use App\Jobs\ReizeImage;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;
    
    public $title;
    public $price;
    public $description;
    public $category;
    public $images = [];
    public $temporary_images;
    public $announcement;
    
    
    
    protected $rules = [
        'title' => 'required|min:3',
        'price' => 'required',
        'description' => 'required|min:5',
        'category' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024'
    ];
    
    protected $messages = [
        'title.min' => 'Il titolo deve essere almeno di 3 caratteri',
        'title.required' => 'Il titolo è obbligatorio',
        'price.required' => 'Il prezzo è obbligatorio',
        'description.required' => 'La descrizione è obbligatoria',
        'description.min' => 'La descrizione deve essere almeno di 5 caratteri',
        'category.required' => 'La categoria è obbligatoria',
        'temporary_images.*.image' => "Il file deve essere un'immgine",
        'temporary_images.*.max' => "Il file deve essere massimo di 1 MB",
        'images.*.image' => "Il file deve essere un'immgine",
        'images.*.max' => "Il file deve essere massimo di 1 MB",
        
    ];
    
    
    public function store()
    {
        // Convalida i dati
        $validatedData = $this->validate();
        
        // Verifica se la categoria esiste
        $category = Category::find($validatedData['category']);
        
        
        // Imposta 'user_id' prima di creare l'annuncio
        $validatedData['user_id'] = Auth::id();
        
        // Crea l'annuncio utilizzando la relazione
        $this->announcement = $category->announcements()->create($validatedData);
        
        // Salva le immagini se disponibili
        if (count($this->images)) {
            foreach ($this->images as $image) {
                // $this->announcement->images()->create(['path' => $image->store('images', 'public')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);
                
                /*RemoveFaces::withChain([ 
                    new ReizeImage($newImage->path, 300, 400),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                    ])->dispatch($newImage->id);
                }  */
                File::deleteDirectory(storage_path('/app/livewire-tmp'));
            }
            
            session()->flash('message', 'Il tuo annuncio è stato inserito correttamente');
            $this->cleanForm();
        }
    }
        
        
        public function cleanForm()
        {
            $this->title = '';
            $this->price = '';
            $this->description = '';
            $this->category = [];
            $this->images = [];
            $this->temporary_images = [];
            // $this->$form_id = rand();
        }
        
        
        
        public function updated($propertyName)
        {
            $this->validateOnly($propertyName);
        }
        
        public function updatedTemporaryImages()
        {
            if ($this->validate([
                'temporary_images.*' => 'image|max:1024',
                ])) {
                    foreach ($this->temporary_images as $image) {
                        $this->images[] = $image;
                    }
                }
            }
            
            public function removeImage($key)
            {
                if (in_array($key, array_keys($this->images))) {
                    unset($this->images[$key]);
                }
            }
            
            public function render()
            {
                return view('livewire.create-announcement');
            }
        }
    