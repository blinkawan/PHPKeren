<html>
  <head>
  	<style type="text/css">

body{
  margin:0;
  padding: 0;
}

h1{
  margin: 0;
}

#container{
  width:86%;
  margin:0 auto;
  min-height: 900px;
}

#footer{
  height: 30px;
  background: #f5f5f5;
  border: 1px solid #e5e5e5;
  padding-top: 10px;
  text-align: center;
}

#header{
  margin-bottom: 30px;
}

#header h1{
  position: absolute;
  top:5px;
  left: 230px;
  font-family: helvetica;
}

#content{
  margin-top: 20px;
  margin-bottom: 20px;
}

a{
 color: #0088cc;
 cursor: pointer;
}

/* root element for tabs  */
ul.css-tabs {
    margin:0 !important;
    padding:0;
    height:40px;
    border-bottom:1px solid #dddddd;
}

/* single tab */
ul.css-tabs li {
    float:left;
    padding:0;
    margin:0;
    list-style-type:none;

}

/* link inside the tab. uses a background image */
ul.css-tabs a {
    float:left;
    font-size:15px;
    font-family: helvetica;
    display:block;
    padding:10px 30px;
    text-decoration:none;
    /*border:1px solid #666;*/
    border-bottom:0px;
    height:18px;
    /*background-color:#efefef;*/
    /*color:#777;*/
    margin-right:2px;
    position:relative;
    top:1px;
    outline:0;
    /*-moz-border-radius:4px 4px 0 0;*/
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;

}

ul.css-tabs a:hover {
    background-color:#F7F7F7;
    color:#333;
}

/* selected tab */
ul.css-tabs a.current {
    /*background-color:#ddd;*/
    /*border-bottom:1px solid #ddd;*/
    border-bottom:1px solid #fff;
    color:#000;
    cursor:default;
}


/* tab pane */
.css-panes div {
    display:none;
    border:1px solid #dddddd;
    border-width:0 0px 1px 0px;
    /*min-height:150px;*/
    padding:15px 20px;
    /*background-color:#ddd;*/
}

.inside{
	list-style-type: none;
	margin-left: -50px;
	margin-top: 0px;
}

.inside li{
	float: left;
	margin-right: 8px;
  margin-left: -10px;
}

.inside li a{
  text-decoration: none;
  display: block;
  /*width: 80px;*/
  height: 25px;
  padding: 10px;
  padding-top:12px;
  padding-left: 20px; 
  padding-right: 20px;
  margin-top: -15px;
  font-family: helvetica;
  font-size: 15px;
}

.inside li a:hover{
  background: #f5f5f5;
}

.current{
	border:1px solid #dddddd;
	border-bottom:1px solid #fff;
    color:#000;
    cursor:default;
}

.css-panes{

}

.salam{
  float: right;
  font-family: helvetica;
  margin-top: 10px;
}



#content h1{
  border-bottom: 1px solid #dddddd;
  margin-bottom: 10px;
}

#info{
    margin-top: 30px;
    color: blue;
    border:1px solid #e0efda;
    border-radius: 5px;
    padding: 15px;
}

#info a{
    background: url('gambar/dialog_close.png') no-repeat transparent;
    float: right;
    text-decoration: none;
}

#welcomeBox{
    height: 300px;
}

#titlebarWelcomeBox{
    /*background: #e0e0e0;*/
    border: 1px solid #dddddd;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    padding: 15px;
    font-family: helvetica;
    background-image: linear-gradient(bottom, rgb(224,224,224) 27%, rgb(199,198,204) 65%);
    background-image: -o-linear-gradient(bottom, rgb(224,224,224) 27%, rgb(199,198,204) 65%);
    background-image: -moz-linear-gradient(bottom, rgb(224,224,224) 27%, rgb(199,198,204) 65%);
    background-image: -webkit-linear-gradient(bottom, rgb(224,224,224) 27%, rgb(199,198,204) 65%);
    background-image: -ms-linear-gradient(bottom, rgb(224,224,224) 27%, rgb(199,198,204) 65%);

    background-image: -webkit-gradient(
	linear,
	right bottom,
	right top,
	color-stop(0.27, rgb(224,224,224)),
	color-stop(0.65, rgb(199,198,204))
    );
}

#bodyWelcomeBox{
    /*background: #f9f9f9;*/
    border: 1px solid #dddddd;
    border-top: 0px;
    height: 300px;
    padding: 10px;
    color: black;
    font-family: helvetica;
}

#ajaxLoader{
    position: fixed;
    margin:0 500px;
    display: block;
    width: 300px;
    height: 95px;
    background: url("gambar/ajax-loader.gif") no-repeat;
}

</style>
    <script src="jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="jquery-ui-1.8.17.custom.min.js" type="text/javascript"></script>
    <script src="jquery.tools.min.js" type="text/javascript"></script>
    <script src="blockUi.js" type="text/javascript"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){

        $(".css-panes").hide();

      	$("ul.css-tabs").tabs("div.css-panes > div");
      	$("ul.css-tabs a").on("click",function(){
      		$(this).addClass("current");
      		$("ul.css-tabs a").not(this).removeClass("current");
          $(".css-panes").show();
      	});
        
        $("ul.inside a").on("click",function(){
          $(this).css("background","#0088cc");
          $(this).css("color","white");
          $("ul.inside a").not(this).css("background","");
          $("ul.inside a").not(this).css("color","");
        });

         $("#ajaxLoader").hide();
         $("#info").hide();
         $("#info a").on("click",function(){
//               $("#info").animate({
//                   opacity:"0.25"
//               },500);
               $("#info").slideUp(300);
         });

         $("#menusiswa").on("click",function(){
            $("#content").load("tablesiswa.php");
         });

         $("#menumatapelajaran").on("click",function(){
//             var image="<img src='gambar/ajax-loader.gif' />";
//             $("#content").html(image).load("satu.php");
               $("#content").load("satu.php");
               $('#content').fadeIn('slow');   
//               return false;
         });

         $("#menukelas").on("click",function(){
            $("#content").load("dua.php");
            $('#content').fadeIn('slow');    
         });

$.ajaxSetup({
    global:true
});

$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);

      });
    </script>
  </head>
  <body>
    <div id="container">
        <div id="header">
          <img src="login-bg.jpg" width="150" height="150"/>
          <h1>HAU HAU HAU</h1>
          <div class="salam">
            Halo Agung Setiawan | Profil | Keluar
          </div>
        </div>

        <ul class="css-tabs">
	         <li><a href="#">Administrasi</a></li>
	         <li><a href="#">Laporan</a></li>
	         <li><a href="#">Setting</a></li>
         </ul>
 
<!-- tab "panes" -->
	     <div class="css-panes">
	       	<div>
            <ul class="inside">
               <li><a id="menusiswa" >Siswa</a></li>
               <li><a id="menumatapelajaran" >Mata Pelajaran</a></li>
               <li><a id="menukelas" >Kelas</a></li>
               <li><a id="menutahunajaran" >Tahun Ajaran</a></li>
               <li><a id="menunilai" >Nilai</a></li>
            </ul>
		      </div>
		      <div>
            <ul class="inside">
               <li><a href=#>Menu One</a></li>
               <li><a href=#>Menu Two</a></li>
               <li><a href=#>Menu Three</a></li>
            </ul>
          </div>
		      <div>
            <ul class="inside">
               <li><a href=#>Menu One</a></li>
               <li><a href=#>Menu Two</a></li>
               <li><a href=#>Menu Three</a></li>
            </ul>
          </div>
	     </div>
         
        <div id="ajaxLoader">
        </div>

         <div id="info">
             <span id="pesan"></span> <a >&nbsp&nbsp&nbsp&nbsp&nbsp</a>
           </div>

       <div id="content">
           <div id="welcomeBox">
               <div id="titlebarWelcomeBox">
                   Welcome
               </div>
               <div id="bodyWelcomeBox">
                   Selamat Datang my Friends!
               </div>
           </div>
       </div>

    </div>
    <div id="footer">
       Develop by <a href="#">Agung Setiawan</a>
    </div>
  </body>
</html>