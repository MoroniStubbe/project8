<meta name="csrf-token" content="{{ csrf_token() }}">

@once
<script>
    const createURL = "{{ url('/admin/add_product/create/') }}";
    const destroyURL = "{{ url('/admin/add_product/destroy/') }}";
</script>
<script src="{{ asset('js/form_table.js') }}"></script>
@endonce

<?php
$form_id = $attributes->get('id');
?>

<form id="{{ $form_id }}" method="POST" action="{{ $action }}">
    @csrf
    <button form-id="{{ $form_id }}" type="submit" class="create-button">Create</button>

    <table class="table1">
        <thead>
            <tr>
                @if(!empty($table_data))
                @foreach(array_keys($table_data[0]) as $header)
                <th>{{ $header }}</th>
                @endforeach
                <th>Edit</th>
                <th>Delete</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($table_data as $row)
            <tr>
                @foreach($row as $value)
                <td>{{ $value }}</td>
                @endforeach
                <td><button class="edit-button" form-id="{{ $form_id }}" type="button">Edit</button></td>
                <td><button class="delete-button" form-id="{{ $form_id }}" type="button">Delete</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>