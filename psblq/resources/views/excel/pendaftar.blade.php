<table>
    <thead>
        <tr>
            <th>Nama Lengkap</th>
            <th>Nis</th>
            <th>NIK</th>
            <th>No. KK</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>NISN</th>
            <th>No. Telepon</th>
            <th>RT</th>
            <th>RW</th>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>Kabupaten</th>
            <th>Provinsi</th>
            <th>Alamat</th>
            <th>Kode Pos</th>
            <th>Golongan Darah</th>
            <th>Pendidikan Formal Terakhir</th>
            <th>Tahun Lulus</th>
            <th>Pendidikan Nonformal Terakhir</th>
            <th>Organisasi yang pernah diikuti</th>
            <th>Jabatan di Organisasi</th>
            <th>Prestasi yang pernah dicapai</th>
            <th>Foto</th>
            <th>Foto KK</th>
            <th>No. KIP</th>
            <th>No. KKS</th>
            <th>No. PKH</th>
            <th>Nama Ayah</th>
            <th>NIK Ayah</th>
            <th>Pendidikan Terakhir Ayah</th>
            <th>No. Telepon Ayah</th>
            <th>Pekerjaan Ayah</th>
            <th>Penghasilan Ayah</th>
            <th>Nama Ibu</th>
            <th>NIK Ibu</th>
            <th>Pendidikan Terakhir Ibu</th>
            <th>No. Telepon Ibu</th>
            <th>Pekerjaan Ibu</th>
            <th>Penghasilan Ibu</th>
            <th>Nama Wali</th>
            <th>NIK Wali</th>
            <th>Pendidikan Terakhir Wali</th>
            <th>No. Telepon Wali</th>
            <th>Pekerjaan Wali</th>
            <th>Penghasilan Wali</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $item)
            <tr>
                <th>{{ $item->nama }}</th>
                <th>{{ $item->nis }}</th>
                <th>{{ $item->nik }}</th>
                <th>{{ $item->no_kk }}</th>
                <th>
                    @if ($item->jenis_kelamin == 'P')
                        Perempuan
                    @elseif($item->jenis_kelamin == 'L')
                        Laki-laki
                    @else
                        -
                    @endif
                </th>
                <th>{{ $item->tempat_lahir }}</th>
                <th>{{ $item->tanggal_lahir }}</th>
                <th>{{ $item->nisn }}</th>
                <th>{{ $item->no_telp }}</th>
                <th>{{ $item->rt }}</th>
                <th>{{ $item->rw }}</th>
                <th>
                    @if ($item->kelurahan)
                        {{ $item->kelurahan->name }}
                    @endif
                </th>
                <th>
                    @if ($item->kecamatan)
                        {{ $item->kecamatan->name }}
                    @endif
                </th>
                <th>
                    @if ($item->kabupaten)
                        {{ $item->kabupaten->name }}
                    @endif
                </th>
                <th>
                    @if ($item->provinsi)
                        {{ $item->provinsi->name }}
                    @endif
                </th>
                <th>{{ $item->alamat }}</th>
                <th>{{ $item->kode_pos }}</th>
                <th>{{ $item->golongan_darah }}</th>
                <th>
                    @if ($item->pendidikan_terakhir_santri)
                        {{ $item->pendidikan_terakhir_santri->pendidikan }}
                    @endif
                </th>
                <th>{{ $item->tahun_lulus }}</th>
                <th>{{ $item->pendidikan_non_formal }}</th>
                <th>{{ $item->organisasi }}</th>
                <th>{{ $item->jabatan }}</th>
                <th>{{ $item->prestasi }}</th>
                <th>{{ $item->gambar }}</th>
                <th>{{ $item->gambar_kk }}</th>
                <th>{{ $item->no_kip }}</th>
                <th>{{ $item->no_kks }}</th>
                <th>{{ $item->no_pkh }}</th>
                <th>{{ $item->nama_ayah }}</th>
                <th>{{ $item->nik_ayah }}</th>
                <th>
                    @if ($item->pendidikan_ayah)
                        {{ $item->pendidikan_ayah->pendidikan }}
                    @endif
                </th>
                <th>{{ $item->no_telp_ayah }}</th>
                <th>{{ $item->pekerjaan_ayah }}</th>
                <th>{{ $item->penghasilan_ayah }}</th>
                <th>{{ $item->nama_ibu }}</th>
                <th>{{ $item->nik_ibu }}</th>
                <th>
                    @if ($item->pendidikan_ibu)
                        {{ $item->pendidikan_ibu->pendidikan }}
                    @endif
                </th>
                <th>{{ $item->no_telp_ibu }}</th>
                <th>{{ $item->pekerjaan_ibu }}</th>
                <th>{{ $item->penghasilan_ibu }}</th>
                <th>{{ $item->nama_wali }}</th>
                <th>{{ $item->nik_wali }}</th>
                <th>{{ $item->pendidikan_terakhir_wali }}</th>
                <th>{{ $item->no_telp_wali }}</th>
                <th>{{ $item->pekerjaan_wali }}</th>
                <th>{{ $item->penghasilan_wali }}</th>
            </tr>
        @endforeach
    </tbody>
</table>
