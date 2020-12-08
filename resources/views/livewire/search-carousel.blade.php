<div class="card-body">
    <div class="row">
        <div class="col-12">
            <input type="text" wire:model.debounce.500ms="search" class="form-control-sm" placeholder="rechercher un label" style="width: inherit;">
              {{-- <div class="lds-ellipsis" ><div></div><div></div><div></div> --}}
        </div>
    </div>
    <div class="row" style="position: relative; margin-top: 0px;">
    	<div class="col" style="position: absolute; top: 0px;">
            @if(strlen($search) > 2)
                @if(count($carouselsResults) > 0)
            		<ul class="ul-results">
            			@foreach ($carouselsResults as $c) 
            				<li class="li-results"><a href="{{route('carousels.edit', $c->id)}}">{{$c->name}}</a></li>
            			@endforeach
            		</ul>
                @else
                    <ul class="ul-results">
                        <li class="li-results">Aucun résultat n'a été trouvé</li>
                    </ul>
                @endif
            @endif
    	</div>
    </div>
</div>
