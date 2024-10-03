<form method="POST" action="{{ $action }}">
    @csrf
    <button type="submit" id="createButton">Create</button>

    <table class="table1">
        <thead>
            <tr>
                @foreach(array_keys($data[0]) as $header)
                <th>{{ $header }}</th>
                @endforeach
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                @foreach($row as $value)
                <td>{{ $value }}</td>
                @endforeach
                <td><button type="button">Edit</button></td>
                <td><button type="button">Delete</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>