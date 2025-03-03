<div class="col-md-4 mx-auto">
    <form wire:submit="createUser" action="" autocomplete="off" class="text-center">
        <di class="row m-2">


        <input wire:model="name" type="text"  id="" class="form-control m-1" placeholder="name">
        @error('name') <span class="text-red-500" style="color: red">{{$message}}</span> @enderror
        <input wire:model="email" type="email" class="form-control m-1"  id="" placeholder="email" >
        @error('email') <span class="text-red-500" style="color: red">{{$message}}</span> @enderror
        <input wire:model="password" type="password" class="form-control m-1"  id="" placeholder="password" autocomplete="new-password">
        @error('password') <span class="text-red-500" style="color: red">{{$message}}</span> @enderror

        <button class="btn btn-success" >Envoyer</button>
        </di>
    </form>
</div>
