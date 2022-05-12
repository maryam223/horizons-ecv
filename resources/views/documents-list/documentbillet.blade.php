<div>
        <h3>Mes billets</h3>
        <form action="../">
        <select class="form-select" aria-label="Mes billets" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
            <option selected>Mes billets</option>
            @foreach($data as $data)
            @if($data->type_doc == "billets")
            <option value="{{url('/view',$data->id)}}">{{$data->name}}</option>
            @endif
            @endforeach
        </select>
        </form>

</div>