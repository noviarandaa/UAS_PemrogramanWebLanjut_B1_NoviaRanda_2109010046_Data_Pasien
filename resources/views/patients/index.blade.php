<!-- resources/views/patients/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Novia Randa</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1em;
            font-family: 'Arial', sans-serif;
            min-width: 600px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }
        table th,
        table td {
            padding: 12px 15px;
            border: 1px solid #dddddd;
        }
        table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }
        table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        table tbody tr:hover {
            background-color: #f1f1f1;
        }
        table tbody tr td a,
        table tbody tr td button {
            color: #009879;
            text-decoration: none;
            border: none;
            background: none;
            cursor: pointer;
        }
        table tbody tr td button {
            padding: 0;
            font: inherit;
        }
    </style>
</head>
<body>
    <h1>Daftar Pasien Rumah Sakit</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('patients.create') }}">Tambah Pasien Baru</a>
    <table>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Tanggal Lahir</th>
            <th>Actions</th>
        </tr>
        @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->dob }}</td>
                <td>
                    <a href="{{ route('patients.edit', $patient->id) }}">Edit</a>
                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $patients->links() }}
</body>
</html>