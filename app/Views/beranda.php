<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Paket 2 (Kelas A)</h2>
                <h5 class="text-white op-7 mb-2">Paket Ini Menggunakan Database SQLite</h5>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="modal fade" role="dialog" id="modaldetail">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-size: 20px;" id="blokjudul"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" id="blokhasil" style="font-size: 17px;"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-card-no-pd mt--2">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5><b>Data Country</b></h5>
                            <button class="btn btn-primary" id="" onclick="negara()">Sinkronisasi SQLite ke Firebase</button>
                        </div>
                        <h3 class="text-info fw-bold"><?= $jmlnegara->Jumlah; ?></h3>
                    </div><br>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-muted mb-0">Progress</p>
                        <p class="text-muted mb-0">75%</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5><b>Data City</b></h5>
                            <button class="btn btn-danger" id="" onclick="">Sinkronisasi SQLite ke Firebase</button>
                        </div>
                        <h3 class="text-primary fw-bold"><?= $jmlkota->Jumlah; ?></h3>
                    </div><br>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-muted mb-0">Progress</p>
                        <p class="text-muted mb-0">25%</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5><b>Data CountryLanguage</b></h5>
                            <button class="btn btn-success" id="" onclick="">Sinkronisasi SQLite ke Firebase</button>
                        </div>
                        <h3 class="text-primary fw-bold"><?= $jmlbahasa->Jumlah; ?></h3>
                    </div><br>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success w-50" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-muted mb-0">Progress</p>
                        <p class="text-muted mb-0">50%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><b>SOAL</h3>
                    <p class="card-text">
                    <h5>Tampilkan Daftar Bahasa yang hanya digunakan oleh sebuah Negara (Bahasa tersebut tidak digunakan oleh Negara lain).
                        Layout data disusun sedemikian rupa yang jika ditekan akan memunculkan grafik (jenis area) yang berisi semua kota beserta
                        populasinya dalam Negara tersebut.
                    </h5>
                    </p>
                    <?php
                    if (is_array($dtcountry)) {
                        foreach ($dtcountry as $k) {
                            $bahasa = $k->Language;
                            $nama = $k->Name;
                            echo "<button class='btn btn-secondary' onclick='caridatagrafik()'>$bahasa<br>$nama</button>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-group col-md-12">
                        <label>Penerbit</label>

                    </div>
                </div>
                <div class="card-body" id="blokdata"></div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-database.js"></script>
<script>
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyCHmm0mbXR5vKKhlieKFLsM8IlVyCMw79Q",
        authDomain: "pemrograman-web-fe60e.firebaseapp.com",
        databaseURL: "https://pemrograman-web-fe60e-default-rtdb.firebaseio.com",
        projectId: "pemrograman-web-fe60e",
        storageBucket: "pemrograman-web-fe60e.appspot.com",
        messagingSenderId: "141001275696",
        appId: "1:141001275696:web:fbe4d13701aa479fa130f5",
        measurementId: "G-16F34R2BDX"
    };
    firebase.initializeApp(firebaseConfig);
    let db = firebase.database();
    let dtpelanggan = db.ref("blokpelanggan");
    dtpelanggan.on('value', sukses, gagal);

    function negara() {
        let ID = $("#txtid").val();
        let Name = $("#txtnama").val();
        let CountryCode = $("#cbojk").val();
        let District = $("#txtnama").val();
        let Population = $("#population").val();
        if (ID == "" || Name == "" || CountryCode == "" || District == "" || Population == "")
            db.ref("blokpelanggan/" + id).set({
                nama: nama,
                jenis_kelamin: jk,
                no_telp: telp
            })
    }

    function caridatagrafik() {
        let country = $("#cbocountry").val();
        if (country != "") {
            $.getJSON(`<?= BASEURLKU; ?>grafik/${country}`, function(result) {
                if (result.length != 0) {
                    var namef = [];
                    var populasif = [];
                    $.each(result, function(i, key) {
                        let nm = key.Name;
                        let ppl = key.Populasi;
                        namef.push(nm);
                        populasif.push(parseInt(ppl));
                    })
                    buatgrafik(namef, populasif);
                } else {
                    swal({
                        title: "Gagal",
                        text: "Data Tidak di Temukan",
                        icon: "error"
                    });
                    $("#blokdata").html("");
                }
            })
        } else {
            $("#blokdata").html("");
        }
    }

    function buatgrafik(namef, populasif) {
        Highcharts.chart('blokdata', {
            chart: {
                type: 'areaspline'
            },
            title: {
                text: "Grafik Kota Pada Negara"
            },
            xAxis: {
                categories: namef,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' + '<td style="padding:0"><b>{point.y:.0f} Jiwa</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: "Populasi",
                data: populasif
            }]
        });
    }
</script>