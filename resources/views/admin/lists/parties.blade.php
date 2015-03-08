<h2>All parties <small>{{ count($parties) }}</small></h2>

<table class="table table-hover">
    <thead>
        <th>Name</th>
    </thead>
    <tbody>
        @foreach($parties as $party)
            <tr>
                <td>
                    {{ $party->name }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>