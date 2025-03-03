<tr>

<td>
   <input type="checkbox"  wire:click="toggleCheck({{$user->id}})" {{$user->is_checked?'checked':''}}> {{$user->name}}
@include('livewire.edit')
</td>
    <td>
        
        <button class="btn btn-danger" wire:click.prevent="deleteUser({{$user->id}})" title="supprimer l'utilisateur" ><i class="bi bi-trash"></i></button>
        <button wire:click="editUser({{$user->id}})" class="btn btn-info" title="Modifier utilisateur"><i class="bi bi-pencil"></i></button>
    </td>
</tr>

