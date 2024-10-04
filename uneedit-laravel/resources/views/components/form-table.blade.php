@once
<script src="{{ asset('js/form_table.js') }}"></script>
@endonce

<?php
$form_id = $attributes->get('id');
?>

<form id="{{ $form_id }}" method="POST" action="{{ $action }}">
    @csrf
    <button form-id="{{ $form_id }}" type="submit" id="createButton">Create</button>

    <table class="table1">
        <thead>
            <tr>
                @foreach(array_keys($table_data[0]) as $header)
                <th>{{ $header }}</th>
                @endforeach
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($table_data as $row)
            <tr>
                @foreach($row as $value)
                <td>{{ $value }}</td>
                @endforeach
                <td><button form-id="{{ $form_id }}" type="button">Edit</button></td>
                <td><button form-id="{{ $form_id }}" type="button">Delete</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>