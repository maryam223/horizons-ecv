<div class="w-75 p-2">
        <h6>Mes autres documents</h6>
        <form action="../">
        <select class="form-select w-100" aria-label="Mes autres documents" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
            <option selected>Mes autres documents</option>
            @foreach($data as $data)
            @if($data->type_doc == "autres")
            <option value="{{url('/view',$data->id)}}">{{$data->name}}</option>
            @endif
            @endforeach
        </select>
        </form>

</div>