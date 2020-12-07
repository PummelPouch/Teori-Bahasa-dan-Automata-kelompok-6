<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Kas.xls");

$date1 = date_create($this->session->flashdata('tglawal'));
$date2 = date_create($this->session->flashdata('tglakhir'));

?>
<table class="table table-hover">
    <thead>
        <tr>
            <th colspan=6 height="20px">LAPORAN KAS</th>
        </tr>
        <tr>
            <th colspan=6 height="20px">Karang Taruna</th>
        </tr>
        <tr>
            <th colspan=6 height="20px">Periode Bulan : <?= date_format($date1, " F Y") ?> - <?= date_format($date2, "F Y")  ?></th>
        </tr>


        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Id Trans</th>
            <th scope="col">Uraian</th>
            <th scope="col">Debit</th>
            <th scope="col">Kredit</th>
            <th scope="col">Saldo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $_saldo = 0;
        foreach ($saldo_awal as $s) :
        
        if ($row['debit'] == 0) {
            $jumlah = $row['kredit'];

            $_saldo = $_saldo - $jumlah;
        } else {
            $jumlah = $row['debit'];
            $_saldo = $_saldo + $jumlah;
        }
        endforeach;
        ?>
        <tr>
            <th scope="row"></th>
            <td>-</td>
            <td>-</td>

            <td>Saldo Kas Akhir</td>
            <td style="text-align:right;">-</td>
            <td style="text-align:right;">-</td>
            <td style="text-align:right;"> <?= $_saldo ?>
            </td>
        </tr>

        <?php
        if ($_saldo != 0) {
            $saldo = $_saldo;
        } else {
            $saldo = 0;
        }
            $count = 0;
            $saldo = 0;
            foreach($jurnal as $row) {
                $count = $count + 1;
                
                if ($row['debit'] == 0) {
                    $jumlah = $row['kredit'];

                    $saldo = $saldo - $jumlah;
                } else {
                    $jumlah = $row['debit'];
                    $saldo = $saldo + $jumlah;
                }
            ?>

            <tr>
                <th scope="row"><?php echo $count ?></th>
                <td><?php echo date('d F Y', strtotime($row['tanggal'])); ?></td>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['keterangan'] ?></td>
                <td>Rp. <?php echo number_format($row['debit'],0,',','.')?>,-</td>
                <td>Rp. <?php echo number_format($row['kredit'],0,',','.')?>,-</td>
                <td>Rp. <?php echo number_format($saldo,0,',','.')?>,-</td>
                </td>
                <?php } ?>
            </tr>
    </tbody>
</table>