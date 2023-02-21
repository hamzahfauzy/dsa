<div style="width:1000px;margin:auto;padding:30px;">
<h1 style="padding:0;margin:0;text-align:center;">BIMBINGAN KONSELING STMIK ROYAL</h1>
<p align="center">Jl. Prof.H.M.Yamin No.173, Kisaran Naga, Kec. Kota Kisaran Timur, Kabupaten Asahan, Sumatera Utara 21222</p>
<hr>
<h2 align="center" style="padding:0;margin:0;">LAPORAN HASIL PENILAIAN</h2>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th width="20px">#</th>
            <?php 
            foreach($fields as $field): 
                $label = $field;
                if(is_array($field))
                {
                    $label = $field['label'];
                }
                $label = _ucwords($label);
            ?>
            <th><?=$label?></th>
            <?php endforeach ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $index => $d): ?>
        <tr>
            <td><?=$index+1?></td>
            <?php 
            foreach($fields as $key => $field): 
                $label = $field;
                if(is_array($field))
                {
                    $label = $field['label'];
                    $data_value = Form::getData($field['type'],$d->{$key},true);
                    if($field['type'] == 'number' && floor( $data_value ) == $data_value)
                    {
                        $data_value = number_format($data_value);
                    }
                    if($field['type'] == 'file')
                    {
                        $data_value = '<a href="'.asset($data_value).'" target="_blank">Lihat File</a>';
                    }
                    $field = $key;
                }
                else
                {
                    $data_value = $d->{$field}??'';
                }
                $label = _ucwords($label);
            ?>
            <td>
            <?=$label == 'Warna' ? "<div style='background:".$data_value.";padding:10px'></div>" : nl2br($data_value)?>
            </td>
            <?php endforeach ?>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<center>
    <b>Diketahui Oleh, <br><br><br><br><br><br><u>INDRA RAMADHONA</u><br>KETUA BIMBINGAN KONSELING</b>
</center>
</div>
<script>window.print()</script>