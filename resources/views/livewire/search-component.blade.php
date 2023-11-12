<div>
    <input wire:model="searchTerm" type="text" placeholder="Search...">
    <ul>
        @foreach ($Detail as $item)
            <li>{{ $item->ship_name }}</li>
        @endforeach
    </ul>
    <select name="" id="">
        @foreach ($shipType as $item)
        <option value="">{{$item->ship_type_desc}}</option>
        @endforeach
    </select>
</div>