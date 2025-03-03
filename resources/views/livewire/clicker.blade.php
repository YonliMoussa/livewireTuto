<div>
    @include('livewire.creat')
    <hr>
     {{-- Affichage des messages de session --}}
     @if (session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
         {{ session('success') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
     
     @endif
 
     @if (session('warning'))
     <div class="alert alert-warning alert-dismissible fade show" role="alert">
         {{ session('success') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
     @endif
 
     @if (session('error'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
         {{ session('error') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
     @endif
   <div class="container">
       <div class="row">
           <div class="col-md-4">
               <h1>Liste des utilisateurs</h1>
           </div>
           <div class="col-md-6">
               <input type="search" wire:model.live.debounce.500ms="search">
           </div>

{{-- <div class="row strong">Nombre coché :<b>{{ $nbchecked }}</b></div> --}}

       </div>

       <table class="table table-sm">
           <thead>
           <th>Nom</th>
           <th>Action</th>
           </thead>
           <tbody>


          
           @foreach ($users as $user)

               @include('livewire.index')
           @endforeach
           </tbody>



       </table>
       {{$users->links()}}
   </div>
</div>
