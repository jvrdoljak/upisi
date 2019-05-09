<div class="card col-lg-8 offset-lg-2">
    <table class="table table-bordered">
        <tr>
        <th>Smjer</th>
        <th width="280px">Akcija</th>
        </tr>
        @foreach ($data as $smjer)
        <tr>
            <td>{{ $smjer->naziv }}</td>
            <td>
            <a class="btn btn-info" href="{{ route('kreiranjeranglisti.show', $smjer->id) }}">Prikaz liste</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
