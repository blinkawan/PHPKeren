 <head>
  <style type="text/css">
   /* =TABLE*/
table, tr, th,td{
            border: 1.5px solid #dddddd;
            border-collapse: collapse;
            
          }
          table{
              margin-top: 10px;
          }

th{
 border-radius: 20px;
}

td{
    height: 15px;
}

          td, th{
            padding:5px;
            font-family: helvetica;
            color: #686A70;
          }
          

          th{
            color:#0088cc;
            font-weight: normal;
          }

          .odd{
            background: #f9f9f9;
          }

          .short{
            width: 50px;
          }

          .long{
            width:300px;
          }

          button{
            height:30px;
            border:solid 1.5px  #dddddd;
            border-radius: 5px;
            width:80px;
          }

          button:hover {
            background: white;
          }
          
          form{
              width: 200px;
          }
          
          form input,form select{
              width: 180px;
          }
          
          input,select{
              height: 30px;
              border: 1px solid #dddddd;
              border-radius: 5px;
              padding: 5px;
              margin-top: 5px;
              margin-bottom: 10px;
              font-family: monospace;
          }
          
          label{
              font-family: helvetica;
          }
          
          #cek{
              margin-left: 17px;
              margin-top: 5px;
              /*margin-top: 11px;*/
          }
          
          .error{
     	color: red;
     }
/* END =TABLE*/
  </style>
  
  <script type="text/javascript" src="jquery-1.9.1.min.js"></script>
  <script src="jquery.validate.min.js" type="text/javascript"></script>
  <script src="jquery.tools.min.js"></script>
  <script src="blockUi.js" type="text/javascript"></script>
  <script type="text/javascript">
      //=TABLE
         $("table tr:odd").addClass("odd");

                $("table").on("mouseover","tr:gt(0)",function(){
                      $(this).css("background","#f2f2f2");
                   });

                $("table").on("mouseout","tr:gt(0)",function(){
                      $(this).css("background","");
                   });

                $(".editButton").on("click",function(){
//                      alert($(this).closest("tr").find("td").eq(2).text());
                   $("#table").hide();
                   $("#formEdit").show();
                   $("#formEdit #nomorSiswa").val($(this).closest("tr").find("td").eq(2).text());
                   $("#formEdit #nama").val($(this).closest("tr").find("td").eq(3).text());
                   var kelas=$(this).closest("tr").find("td").eq(4).text();
                   $("#formEdit #kelas option:contains('"+kelas+"')").attr("selected", "true");
//                   $("#yourdropdown option").is("selected").text()
                   $('html, body').animate({
					scrollTop: $('#content').offset().top
				}, 800);
                });
                
                $("#formTambah").hide();
                $("#formEdit").hide();
                
                $("#buttonTambah").on("click",function(){
                    $("#table").hide();
                    $("#formTambah").delay(0).show(0);
                    $('html, body').animate({
					scrollTop: $('#content').offset().top
				}, 800);
                });
                
                jQuery.validator.addMethod("alpha", function(value, element) {
                    return this.optional(element) || value == value.match(/^[a-z A-Z]+$/);
                },"Nama hanya boleh huruf.");

                 var validation={
                        rules:{
                            nama:{
                                required:true,
                                alpha:true
                            }
                        },
                        messages:{
                            nama:{
                                required:"Nama harus diisi"
                            }
                        }
                    };
                    $("#formTambahX").validate(validation);
                    $("#formEditX").validate(validation);
               
                $("#buttonSimpan").on("click",function(){
                    var nama=$("#formTambah #nama").val();
                    var kelas=$("#formTambah #kelas option:selected").val();
//                           $("#formTambahX").validate();
                         if($("#formTambahX").valid()==false){
                             return;
                         }
                         
                        $.ajax({
                       type:"post",
                       async:true,
                       url:"../controller/SiswaController.php",
                       data:"nama="+nama+"&kelas="+kelas+"&perintah=simpan",
                       beforeSend:function(){
                         $.blockUI();  
                       },
                       success:function(data){
                           $.unblockUI();
                           $("#info #pesan").html("Berhasil Menambah Data");
                           $("#info").css("background","#def0d8");
                           $("#info").show();
                           $("#formTambah").hide();
                           $("#content").load("tablesiswa.php");
                           $('html, body').animate({
					scrollTop: $('#info').offset().top
				}, 800);
                       }
                   });
                  return false;
                });
                
                $("#buttonEdit").on("click",function(){
                    var nomorSiswa=$("#formEdit #nomorSiswa").val();
                    var nama=$("#formEdit #nama").val();
                    var kelas=$("#formEdit #kelas option:selected").val();
                    
                    if($("#formEditX").valid()==false){
                             return;
                         }
                    
                   $.ajax({
                       type:"post",
                       async:true,
                       url:"../controller/SiswaController.php",
                       data:"nama="+nama+"&kelas="+kelas+"&nomorSiswa="+nomorSiswa+"&perintah=ubah",
                       beforeSend:function(){
                           $.blockUI();
                       },
                       success:function(data){
                           $.unblockUI();
                           $("#info #pesan").html("Berhasil Megubah Data");
                           $("#info").css("background","#def0d8");
                           $("#info").show();
                           $("#formTambah").hide();
                           $("#content").load("tablesiswa.php");
                           $('html, body').animate({
					scrollTop: $('#info').offset().top
				}, 800);
                       }
                   }); 
                   return false;
                });
                
                $("#buttonHapus").on("click",function(){
                    var nomorSiswa=$('input:radio[name=cek]:checked').closest("tr").find("td").eq(2).text();
                    if(nomorSiswa==""){
                           $("#info").show();
                           $("#info #pesan").html("Tidak Ada Data yang Terseleksi");
                           $("#info").css("background","pink");
                        return;
                    }
                    $.ajax({
                        type:"post",
                        async:true,
                        url:"../controller/SiswaController.php",
                        data:"nomorSiswa="+nomorSiswa+"&perintah=hapus",
                        beforeSend:function(){
                            $.blockUI();
                        },
                        success:function(data){
               
                           $("#info #pesan").html("Berhasil Menghapus Data");
                           $("#info").css("background","pink");
                           $("#info").show();
                           $("#formTambah").hide();
                           $("#content").load("tablesiswa.php");
                           $('html, body').animate({
					scrollTop: $('#info').offset().top
				}, 800);
                        }
                    }).done(function(){
                        $.unblockUI();
                    });
                });
                
                 $.ajaxSetup({
    async:true
});
        // END =TABLE
  </script>

<head>
 
 <div id="table">
     <h1>Data Siswa</h1>
 <button id="buttonTambah">Tambah</button>
 <button id="buttonHapus" >Hapus</button>
        <table>
              <thead>
                <tr>
                      <th class="short">Cek</th>
                      <th class="short">#</th>
                      <th class="long">Nomor Induk Siswa</th>
                      <th class="long">Nama</th>
                      <th class="long">Kelas</th>
                      <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    include_once '../service/SiswaServiceImpl.php';
                    $siswaService=new SiswaServiceImpl();
                    $siswas=$siswaService->ambilSemuaSiswaDenganKelas();
                    $num=1;
                    
                    foreach ($siswas as $siswa){
                  ?>
                 <tr>
                     <td><input type="radio" name="cek" id="cek"></td>
                     <td><?php echo $num; ?></td>
                     <td style="text-align: right;padding-right: 20px;"><?php echo $siswa->getNomorSiswa(); ?></td>
                     <td><?php echo $siswa->getNama(); ?></td>
                     <td><?php echo $siswa->getKelas()->getNama(); ?></td>
                     <td><button  class="editButton"><img src="pencil3.png" height="20"/> Edit</button></td>
                 </tr>
                 <?php
                   $num++;
                    }?>
              </tbody>
        </table>
 </div>
 
 <div id="formTambah">
     <h1>Tambah Data Siswa</h1>
     <form id="formTambahX">
     <label>Nama :</label> </br>
     <label id="labelNama" for="nama" class="error" />
     <input type="text" name="nama" id="nama" class="required" />
     
     <label>Kelas :</label>
     <?php
     include_once '../service/KelasServiceImpl.php';
     $kelasService=new KelasServiceImpl();
     $kelases=$kelasService->ambilSemuaKelas();
     ?>
     <select id="kelas" name="kelas">
         <?php
         foreach($kelases as $kelas){
         ?>
         <option value="<?php echo $kelas->getIdKelas(); ?>"><?php echo $kelas->getNama(); ?></option>
         <?php
         }
         ?>
     </select>
     <!--<button id="buttonSimpan">Simpan</button>-->
     <!--<input type="button" id="buttonSimpan" value="TES"/>-->
     <input type="submit" id="buttonSimpan" value="TES"/>
     </form>
 </div>

<div id="formEdit">
    <h1>Ubah Data Siswa</h1>
     <form id="formEditX">
         
     <input type="hidden" id="nomorSiswa"/>
     
     <label>Nama :</label> </br>
     <label id="labelNama" for="nama" class="error" />
     <input type="text" name="nama" id="nama" />
     
     <label>Kelas :</label>
     <?php
     include_once '../service/KelasServiceImpl.php';
     $kelasService=new KelasServiceImpl();
     $kelases=$kelasService->ambilSemuaKelas();
     ?>
     <select id="kelas" name="kelas">
         <?php
         foreach($kelases as $kelas){
         ?>
         <option value="<?php echo $kelas->getIdKelas(); ?>"><?php echo $kelas->getNama(); ?></option>
         <?php
         }
         ?>
     </select>
     <!--<button id="buttonEdit">Edit</button>-->
<!--     <input type="button" id="buttonEdit" value="Simpan Perubahan"/>-->
     <input type="submit" id="buttonEdit" value="Simpan Perubahan"/>
     </form>
</div>
  