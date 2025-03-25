@foreach ($Superheroes as $superheroe)
    <tr>
        <td>{{ $superheroe->nombre_real }}</td>
        <td>{{ $superheroe->nombre_superheroe }}</td>
        <td>
            <form action="{{ route ('superheroe.restore', $superheroe->id) }}" method="POST">
                @csrf
                <button type ="submit">RESTAURAR</button>
            </form>
        </td>
    </tr>
