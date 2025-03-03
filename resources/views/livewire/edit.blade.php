@if($editingId==$user->id)
    <div class="row">


<div class="col-md-4">


    <input wire:model='editingName' name="name" class="form-control my-1 @error('editingName') is-invalid @enderror">
    @error('editingName')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4">



    <input wire:model='editingEmail' name="email" class=" form-control my-1 @error('editingEmail') is-invalid @enderror">
    @error('editingEmail')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4">
    <button wire:click="updateUser" class="btn btn-info">save</button> <button wire:click="cancelEdit" class="btn btn-warning">Annuler</button>
</div>
    </div>
@endif
