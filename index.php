<html>
    <head>
        <title>Tugas 5 Praktikum Pemrograman Web - 119140029</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    </head>
    <body>
        <div class="container">
            <br />
            <h2 align="center">DATA MAHASISWA UNIVERSITAS ABAL-ABAL</h2><br />
            <select name="datamaha" id="datamaha" multiple class="form-control selectpicker">
            <?php
            include('koneksi.php');
            $query = $conn->query("SELECT DISTINCT prodi FROM mahasiswa");
            {
            $prodi = $row->prodi;
                if ($prodi='IF'){
                    echo '<option value="'.$prodi.'">Teknik Informatika</option>'; 
                }
                if ($prodi='EL'){
                    echo '<option value="'.$prodi.'">Teknik Elektro</option>';
                }
                if ($prodi='ME'){
                    echo '<option value="'.$prodi.'">Teknik Mesin</option>';
                }
                if ($prodi='TG'){
                    echo '<option value="'.$prodi.'">Teknik Geofisika</option>';
                }
                if ($prodi='GL'){
                    echo '<option value="'.$prodi.'">Teknik Geologi</option>';
                }
            }
            
            ?>
            </select>
            <input type="hidden" name="data_mahasiswa" id="data_mahasiswa" />
            <div style="clear:both"></div>
            <br />
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <br />
            <br />
            <br />
            <footer>  M. Ammar Fadhila Ramadhan - 119140029 </footer>
        </div>
        
<script>
$(document).ready(function(){
    load_data();
    function load_data(query='')
    {
        $.ajax({
            url:"dbgrab.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                $('tbody').html(data);
            }
        })
    }
    $('#datamaha').change(function(){
        $('#data_mahasiswa').val($('#datamaha').val());
        var query = $('#data_mahasiswa').val();
        load_data(query);
    });
});
</script>
</body>
</html>