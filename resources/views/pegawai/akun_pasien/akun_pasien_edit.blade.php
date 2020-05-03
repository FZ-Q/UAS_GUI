<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Pasien</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{url('/assets/css/admin_style.css')}}">
    <script src="{{url('/assets/vue/vue.js')}}"></script>
    <style></style>
</head>



<body>
    <div class="container_r">
        <div class="col-12">
            <button class="btn btn-reverse btn-arrow btnbutton" style="float: right;">
                <span>Back<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36.1 25.8" enable-background="new 0 0 36.1 25.8" xml:space="preserve">
                        <g>
                            <line fill="none" stroke="#FFFFFF" stroke-width="3" stroke-miterlimit="10" x1="0" y1="12.9" x2="34" y2="12.9"></line>
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="3" stroke-miterlimit="10" points="22.2,1.1 34,12.9 22.2,24.7   "></polyline>
                        </g>
                    </svg></span>
            </button>

            <h1>Edit Data Pasien</h1>
            <p>Mohon isi data secara lengkap dan benar.</p>
            <hr style="height: 10px; background-color: black; border: 10px;">

            <div id="app">
            @foreach($tb_pasien as $pasien)
                <form action="{{url('pegawai/akun-pasien/edit/action')}}" id="form_reg" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $pasien->id_pasien }}">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email Anda" value="{{ $pasien->email }}" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" value="{{ $pasien->password }}" required>

                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" placeholder="Nama Lengkap Anda" value="{{ $pasien->nama_pasien }}" required>

                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="" cols="30" rows="10" placeholder="Alamat" value="{{ $pasien->alamat }}" required></textarea>

                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $pasien->tgl_lahir }}" required></input>

                    <label for="st_bpjs">Status BPJS</label>
                    <select id="st_bpjs" name="st_bpjs" v-model="selected"  required>
                        <option value="Tidak" >Tidak</option>
                        <option value="Iya">Iya</option>
                    </select>

                    <label v-if="selected === 'Iya'" for="n_bpjs">Nomor BPJS</label>
                    <input v-if="selected === 'Iya'" type="number" id="no_bpjs" name="no_bpjs" placeholder="Nomor BPJS " value="{{ $pasien->n_bpjs }}" required>
                    
                    <label for="st_p">Status Pasien</label>
                    <select id="st_p" name="st_p" v-model="selectedrm" required>
                        <option value="Baru">Baru</option>
                        <option value="Lama">Lama</option>
                    </select>
                    
                    <label v-if="selectedrm === 'Baru'" for="n_rm">Tambahkan Nomor Rekam Medis dengan Merubah Status Pasien <br><br></label>
                    <label v-if="selectedrm === 'Lama'" for="n_rm">Nomor Rekam Medis</label>
                    <input v-if="selectedrm === 'Lama'" type="number" id="n_rm" name="n_rm" placeholder="Nomor Rekam Medis " value="{{ $pasien->n_rm }}" required>

                    <button type="submit" class="registerbtn" value="Submit"> Edit</button>
                </form>
                @endforeach
            </div>
           
        </div>
    </div>

</body>
<script>
    new Vue({
        el: '#app',
        data: {
            selected: '{{ $pasien->status_bpjs }}',
            selectedrm: '{{ $pasien->status_pasien }}'
        }
    });
</script>

</html> 