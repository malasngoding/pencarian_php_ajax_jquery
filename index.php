<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Membuat Login Dengan PHP dan MySQLi - www.malasngoding.com</title>
</head>
<body>

  <style type="text/css">

    h2, h3{
      text-align: center;
    }

    .kotak{
      width: 800px;
      background: white;
      border: 1px solid black;
      margin: 10px auto;
      padding: 10px 10px;
    }

    input{
      width: 200px;
      padding: 5px 3px;
      font-size: 11pt;
      box-sizing : border-box;
    }

    .form{
      box-sizing : border-box;
      width: 100%;
      padding: 10px;
    }
    
    table{
      width: 100%;
    }

    table,tr,td,th{
      border: 1px solid black;
      border-collapse: collapse;
    }

    th,td{
      padding: 5px;
    }
  </style>

  <h2>WWW.MALASNGODING.COM</h2>

  <div class="kotak">

    <h3>Data Pegawai</h3>

    <div>
      <label>Cari Pegawai</label>
      <br>
      <input type="text" class="cari" name="cari" placeholder="cari pegawai di sini..">
    </div>
    
    <br>

    <table class="tableku">
      <tr>
        <th width="1%">No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Pegawai</th>
      </tr>
      <tr>
        <?php 
        include 'koneksi.php';
        $no = 1;
        $pegawai = mysqli_query($koneksi,"select * from pegawai");
        while($p = mysqli_fetch_array($pegawai)){
          ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $p['pegawai_nama'] ?></td>
            <td><?php echo $p['pegawai_alamat'] ?></td>
            <td><?php echo $p['pegawai_hp'] ?></td>
          </tr>
          <?php
        }
        ?>
      </tr>
    </table>

  </div>


<script type="text/javascript" src="jquery.js"></script>
<script>
  $(document).ready(function(){

    $("body").on("change keyup keydown",".cari",function(){
      var cari = $(this).val();
      var data = "cari="+cari;
      // alert(cari);
      $.ajax({
        method:'POST',
        url:'ajax_cari.php',
        data:data,
        success:function(result){
          // alert(result);
          $(".tableku").html(result);
        }
      })
    })

  });
</script>
</body>
</html>