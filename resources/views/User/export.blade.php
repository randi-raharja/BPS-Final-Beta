<table>
    <thead>
        <tr>
            <td>Nama</td>
            <td>Email</td>
            <td>Alamat</td>
            <td>No. Hp</td>
            <td>No. WA</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->alamat }}</td>
                <td>{{ $user->no_hp }}</td>
                <td>{{ $user->wa }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
