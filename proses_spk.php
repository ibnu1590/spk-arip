<?php
    session_start();
    error_reporting(0);
    if(empty($_SESSION['id'])){
        header('location:login.php?error_login=1');
    }
?>
<?php include 'header.php';?>
<?php include 'menu.php';?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Proses SPK</h4>
                </div>
            </div>
            <div class="row">
                <h3>Tabel Hasil Penilaian</h3>
                <div class="table-responsive">
                    <table id="example0" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama </th>
                                <?php foreach ($db->select('kriteria','kriteria')->get() as $k): ?>
                                <th>
                                    <?php
                                        $tmp = explode('_',$k['kriteria']);
                                        echo ucwords(implode(' ',$tmp));
                                    ?>
                                </th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($db->select('karyawan.nama,hasil_tpa.*','karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data):
                            ?>
                                <tr>
                                    <td><?= $data['nama']?></td>
                                    <?php foreach ($db->select('kriteria','kriteria')->get() as $td): ?>
                                    <td><?= $db->getnilaisubkriteria($data[$td['kriteria']])?></td>
                                    <?php endforeach ?>
                                </tr>
                            <?php
                                endforeach;
                                // $db->delete('banding')->count() == 1;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-lg" onclick="tpl()">Proses</button>
                </div>
            </div>
            <div id="proses_spk" style="display: none;">
                <div class="row">
                    <h3>Hitung Nilai GAP</h3>
                    <div class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama </th>
                                    <?php foreach ($db->select('kriteria','kriteria')->get() as $k): ?>
                                    <th>
                                        <?php
                                            $tmp = explode('_',$k['kriteria']);
                                            echo ucwords(implode(' ',$tmp));
                                        ?>
                                    </th>
                                    <?php endforeach ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($db->select('karyawan.nama,hasil_tpa.*','karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data):
                                ?>
                                    <tr>
                                        <td><?= $data['nama']?></td>
                                        <?php foreach ($db->select('kriteria','kriteria')->get() as $td):
                                             ?>
                                        <td><?=  $db->getnilaisubkriteria($data[$td['kriteria']]) - 3?></td>
                                        <?php endforeach ?>
                                    </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <h3>Konversi Nilai GAP</h3>
                    <div class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama </th>
                                    <?php foreach ($db->select('kriteria','kriteria')->get() as $k): ?>
                                    <th>
                                        <?php
                                            $tmp = explode('_',$k['kriteria']);
                                            echo ucwords(implode(' ',$tmp));
                                        ?>
                                    </th>
                                    <?php endforeach ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($db->select('karyawan.nama,hasil_tpa.*','karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data):
                                ?>
                                    <tr>
                                        <td><?= $data['nama']?></td>
                                        <?php foreach ($db->select('id_kriteria,kriteria','kriteria')->get() as $td): 
                                            $nilai_gap = $db->getnilaisubkriteria($data[$td['kriteria']]) - 3;
                                            $nilaiGAP = $db->getnilaisubkriteria($data[$td['kriteria']]) - 3;
                                            $nilaiSubkriteria = $db->getnilaisubkriteria($data[$td['kriteria']]);
                                            $tmp = explode('_',$td['kriteria']);
                                            $namaKriteria = ucwords(implode(' ',$tmp));

                                            if ($nilaiGAP == 0){
                                                $nilaiGAP = 5;
                                            } else if ($nilaiGAP == 1){
                                                $nilaiGAP = 4.5;
                                            } else if ($nilaiGAP == -1){
                                                $nilaiGAP = 4;
                                            } elseif ($nilaiGAP == 2) {
                                                $nilaiGAP = 3.5;
                                            } elseif ($nilaiGAP == -2) {
                                                $nilaiGAP = 3;
                                            } elseif ($nilaiGAP == 3) {
                                                $nilaiGAP = 2.5;
                                            } elseif ($nilaiGAP == -3) {
                                                $nilaiGAP = 2;
                                            } elseif ($nilaiGAP == 4) {
                                                $nilaiGAP = 1.5;
                                            } elseif ($nilaiGAP == -4) {
                                                $nilaiGAP = 1;
                                            }
                                            $tgl = date("Y-m-d");

                                            if($db->select('id_calon_kr','hitung')->where("id_calon_kr='$data[id_calon_kr]' and tanggal_lap='$tgl' and kriteria='$namaKriteria'")->count() == 0){
                                                
                                                $db->hitung($data['id_calon_kr'],$nilaiSubkriteria,$nilai_gap,$nilaiGAP,$tgl,$namaKriteria,$data['nama']);
                                            } else {
                                                
                                                $db->update('hitung',"id_subkriteria='$nilaiSubkriteria', nilai_gap='$nilai_gap', nilai_bobot='$nilaiGAP', tanggal_lap='$tgl', kriteria='$namaKriteria'")->where("id_calon_kr='$data[id_calon_kr]' and tanggal_lap='$tgl' and kriteria='$namaKriteria'")->count();
                                            }
                                        ?>
                                        <td><?=  $nilaiGAP ?></td>
                                        <?php endforeach ?>
                                    </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <h3>Hitung Core Factor dan Secondary Factor</h3>
                    <div class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama </th>
                                    <th>Core Factor</th>
                                    <th>Secondary Factor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($db->select('karyawan.nama,hasil_tpa.*','karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data):
                                ?>
                                    <tr>
                                        <td><?= $data['nama']?></td>
                                        <?php 
                                        $w=0;
                                        $x=0;
                                        foreach ($db->select('type,kriteria', 'kriteria')->get() as $td):
                                            $nilaiGAP = $db->getnilaisubkriteria($data[$td['kriteria']]) - 3;
                                            if ($nilaiGAP == 0){
                                                $nilaiGAP = 5;
                                            } else if ($nilaiGAP == 1){
                                                $nilaiGAP = 4.5;
                                            } else if ($nilaiGAP == -1){
                                                $nilaiGAP = 4;
                                            } elseif ($nilaiGAP == 2) {
                                                $nilaiGAP = 3.5;
                                            } elseif ($nilaiGAP == -2) {
                                                $nilaiGAP = 3;
                                            } elseif ($nilaiGAP == 3) {
                                                $nilaiGAP = 2.5;
                                            } elseif ($nilaiGAP == -3) {
                                                $nilaiGAP = 2;
                                            } elseif ($nilaiGAP == 4) {
                                                $nilaiGAP = 1.5;
                                            } elseif ($nilaiGAP == -4) {
                                                $nilaiGAP = 1;
                                            }
                                            $tmpExp = explode('_',$td['type']);
                                            $tmpImp = implode(' ',$tmpExp);
                                            $nilaiGab = $tmpImp."=".$nilaiGAP;
                                            if (strpos($nilaiGab, 'Secondary')  !== false) {
                                                $tampung += $nilaiGAP;
                                                $w++;
                                            }
                                            elseif (strpos($nilaiGab, 'Core') !== false) {
                                                $tampungCore += $nilaiGAP;
                                                $x++;
                                            }
                                            endforeach;
                                            $nilaiCore = $tampungCore/$x;
                                            $tampungCore = 0;

                                            $nilaiSecondary = $tampung/$w;
                                            $tampung = 0;

                                            $nilaiCFSF = $nilaiCore." ".$nilaiSecondary;
                                        ?>
                                        <td><?= round($nilaiCore,1)  ?></td>
                                        <td><?= round($nilaiSecondary,1)  ?></td>
                                    </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <h3>Hasil Nilai Total</h3>
                    <div class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama </th>
                                    <th>Nilai Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $q=0;
                                    foreach ($db->select('karyawan.nama,hasil_tpa.*','karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data):
                                ?>
                                    <tr>
                                        <td><?= $data['nama']?></td>
                                        <?php 
                                        $w=0;
                                        $x=0;
                                        
                                        foreach ($db->select('type,kriteria', 'kriteria')->get() as $td):
                                            $nilaiGAP = $db->getnilaisubkriteria($data[$td['kriteria']]) - 3;
                                            if ($nilaiGAP == 0){
                                                $nilaiGAP = 5;
                                            } else if ($nilaiGAP == 1){
                                                $nilaiGAP = 4.5;
                                            } else if ($nilaiGAP == -1){
                                                $nilaiGAP = 4;
                                            } elseif ($nilaiGAP == 2) {
                                                $nilaiGAP = 3.5;
                                            } elseif ($nilaiGAP == -2) {
                                                $nilaiGAP = 3;
                                            } elseif ($nilaiGAP == 3) {
                                                $nilaiGAP = 2.5;
                                            } elseif ($nilaiGAP == -3) {
                                                $nilaiGAP = 2;
                                            } elseif ($nilaiGAP == 4) {
                                                $nilaiGAP = 1.5;
                                            } elseif ($nilaiGAP == -4) {
                                                $nilaiGAP = 1;
                                            }
                                            $tmpExp = explode('_',$td['type']);
                                            $tmpImp = implode(' ',$tmpExp);
                                            $nilaiGab = $tmpImp."=".$nilaiGAP;
                                            if (strpos($nilaiGab, 'Secondary')  !== false) {
                                                $tampung += $nilaiGAP;
                                                $w++;
                                            }
                                            elseif (strpos($nilaiGab, 'Core') !== false) {
                                                $tampungCore += $nilaiGAP;
                                                $x++;
                                            }
                                            endforeach;
                                            $nilaiCore = $tampungCore/$x;
                                            $tampungCore = 0;

                                            $nilaiSecondary = $tampung/$w;
                                            $tampung = 0;
                                            $tgl = date("Y-m-d");
                                            $nilaiFinal = 0.6*$nilaiCore + 0.4*$nilaiSecondary;

                                            //open
                                            $hasil = [];
                                            $bulan = date('M'); 
                                            $tahun = date('Y'); 
                                            $tanggal = date('Y-m-d');
                                            $minggu = $db->weekOfMonth($tanggal);
                                            
                                            if($db->select('id_calon_kr','hasil_spk')->where("id_calon_kr='$data[id_calon_kr]' and tanggal_lap='$tgl'")->count() == 0){
                                                $db->insert('hasil_spk',"'$data[id_calon_kr]','$data[nama]','$nilaiFinal','$tgl','$minggu','$bulan','$tahun','$urutanRank',''")->count();
                                            } else {
                                                $db->update('hasil_spk',"nilai='$nilaiFinal', ranking='$urutanRank'")->where("id_calon_kr='$data[id_calon_kr]' and tanggal_lap='$tgl'")->count();
                                            }

                                            $urutanRank = 0;
                                            foreach($db->select('DISTINCT *','hasil_spk')->where("tanggal_lap='$tgl' and minggu='$minggu' and bulan='$bulan' and tahun='$tahun' and id_calon_kr in (select id_calon_kr from hasil_tpa)")->order_by('hasil_spk.nilai','desc')->get() as $data):
                                            $urutanRank++;
                                                if($db->select('id_calon_kr','hasil_spk')->where("id_calon_kr='$data[id_calon_kr]' and tanggal_lap='$tgl'")->count() == 0){
                                                    $db->insert('hasil_spk',"'$data[id_calon_kr]','$data[nama]','$nilaiFinal','$tgl','$minggu','$bulan','$tahun','$urutanRank',''")->count();
                                                } else {
                                                    $db->update('hasil_spk',"ranking='$urutanRank'")->where("id_calon_kr='$data[id_calon_kr]' and tanggal_lap='$tgl'")->count();
                                                }
                                            endforeach; 
                                            // close
                                        ?>
                                        <td><?= $nilaiFinal  ?></td>
                                    </tr>
                                <?php
                                    endforeach;  
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <h3>Hasil Nilai Rank</h3>
                    <div class="table-responsive">
                        <table id="example99" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama </th>
                                    <th>Nilai Total</th>
                                    <th>Ranking</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $x=1;
                                    // foreach($db->select('DISTINCT *','hasil_spk')->order_by('hasil_spk.nilai','desc')->get() as $data):
                                    foreach($db->select('DISTINCT *','hasil_spk')->where("tanggal_lap='$tgl' and minggu='$minggu' and bulan='$bulan' and tahun='$tahun' and id_calon_kr in (select id_calon_kr from hasil_tpa)")->order_by('hasil_spk.nilai','desc')->get() as $data):
                                    
                                ?>
                                    <tr>
                                        <td><?= $data['nama']?></td>
                                        <td><?= $data['nilai']  ?></td>
                                        <td><?= $x++ ?></td>
                                    </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
    </div>
</div>
    <!-- CONTENT-WRAPPER SECTION END-->
<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(function(){
        $("#proses").addClass('menu-top-active');
        // $.ajax({
        //     url:'truncate_tpa.php',
        //     success:function(data){
        //         //alert(data);
                    
        //     }
        // });
    });
    function tpl(){
        $("#proses_spk").show();    
    }
</script>
<script type="text/javascript">
    $(function() {
        $('#example99').dataTable();
    });
</script>