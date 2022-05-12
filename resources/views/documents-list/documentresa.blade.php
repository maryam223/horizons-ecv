<div class="w-75 p-2">
        <h6>Mes documents de réservation</h6>
        <form action="../">
        <select class="form-select w-100" aria-label="Mes documents de réservation" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
            <option selected>Mes réservations</option>
            @foreach($data as $data)
            @if($data->type_doc == "resa")
            <option value="{{url('/view',$data->id)}}">{{$data->name}}</option>
            @endif
            @endforeach
        </select>
        </form>

</div>