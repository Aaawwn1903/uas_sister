<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4">Daftar Buku</h1>

        <table class="w-full border">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-100">Judul</th>
                    <th class="px-4 py-2 bg-gray-100">Pengarang</th>
                    <th class="px-4 py-2 bg-gray-100">Sinopsis</th>
                </tr>
            </thead>
            <tbody>
                <!-- Menampilkan data buku dari database -->
                @foreach ($buku as $item)
                <tr>
                    <td class="px-4 py-2">{{ $item->judul }}</td>
                    <td class="px-4 py-2">{{ $item->pengarang }}</td>
                    <td class="px-4 py-2">{{ $item->sinopsis }}</td>
                </tr>
                @endforeach

                <!-- Menampilkan data buku dari file Excel yang diimpor -->
                @foreach ($importedBuku as $item)
                <tr>
                    <td class="px-4 py-2">{{ $item->judul }}</td>
                    <td class="px-4 py-2">{{ $item->pengarang }}</td>
                    <td class="px-4 py-2">{{ $item->sinopsis }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="text-2xl font-bold mt-8 mb-4">Upload File Excel</h2>
        <form action="{{ route('upload-excel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="excel_file" class="block text-sm font-medium text-gray-700">File Excel</label>
                <input type="file" name="excel_file" id="excel_file" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md">Upload</button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
