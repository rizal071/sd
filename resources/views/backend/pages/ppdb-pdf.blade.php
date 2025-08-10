<h2>Data Pendaftar PPDB</h2>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NISN</th>
            <th>Tgl Lahir</th>
            <th>Alamat</th>
            <th>Orang Tua</th>
            <th>Telepon</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pendaftar as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->tgl_lahir }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->nama_ortu }}</td>
                <td>{{ $item->telepon }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
