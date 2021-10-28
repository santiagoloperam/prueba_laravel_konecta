<div>
    <div class="card">

        @if(session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
        @endif
        
        
    	<div class="card-header">
            <div class="row">
                <div class="column text-gray-500">
                    <select wire:model="perpage" class="form-control">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>
                </div>
                <div class="column flex w-50 ml-2 text-gray-500">
            		<input wire:model="search" class="form-control" placeholder="Busque por nombre o correo"/>
                </div>

                <a class="btn btn-secondary ml-2" href="{{ route('admin.users.create') }}">
                    Agregar Usuario
                </a>
                
            </div>
    	</div>

    	@if($users->count())

    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
                        @foreach($columns as $c)
                           <th wire:click="sort('{{ $c['name'] }}')">
                                <div type="btn"  class="btn btn-dark w-100">
                                    {{ $c['description'] }}
                                    @if($sortColumn == $c['name'])
                                        @if($sortDirection == 'asc')
                                            &uarr;
                                        @else
                                            &darr;
                                        @endif
                                    @endif
                                </div>
                            </th> 
                        @endforeach
    				<th>ROL</th>
    				<th></th>
    			</tr>
    			</thead>
    			
    			<tbody>
    				@foreach($users as $user)
    				<tr>
    					<td>{{ $user->id }}</td>
    					<td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
    					<td>
                            {{ isset($user->roles[0]->id) ? $user->roles[0]->name : ""}}
                        </td>
    					<td>
    						<a class="btn btn-primary" href="{{ route('admin.users.edit',$user) }}">Editar</a>
    					</td>
                        <td width="10px">
                                <form action="{{ route('admin.users.destroy',$user) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Está seguro de eliminar el registro?')">   Eliminar
                                    </button>
                                </form>
                            </td>
    				</tr>
    				@endforeach
    			</tbody>
    		</table>
    	</div>

    	<div class="card-footer">
    		{{ $users->links() }}
    	</div>

    	@else
    		<div class="card-body">
    			<strong>No hay registros!</strong>
    		</div>

    	@endif
    </div>
</div>
