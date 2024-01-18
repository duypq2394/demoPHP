<?php
//セキュアコーディング：業務支援システムでログイン済かチェックする。
include("../include/authcheck.php");
authcheck();

SESSION_start();
/*
php.ini session_auto_start=0を1に変えるとsession_start(）関数が不要
*/
include("../include/setuzoku.ini");
include("../include/sakusei_ymd.ini");

/****************************************
* FORMで送られた情報を受ける処理
****************************************/
function ukeru1($torihikisaki_no,$juchu_no,$shohin_mei,$tanto,$tanka,$session1,$kagensan,$zaikosu,$torihiki_item,$sentaku_item,$check_item) {
    global $torihikisaki_no;
    global $juchu_no;
    global $shohin_mei;
    global $tanto;
    global $tanka;
    global $session1;
    global $kagensan;
    global $zaikosu;
    global $torihiki_item;
    global $sentaku_item;
    global $check_item;
         $torihikisaki_no = $_REQUEST["torihikisaki_no"];
         $juchu_no = $_REQUEST["juchu_no"];
         $shohin_mei = $_REQUEST["shohin_mei"];
         $tanto = $_REQUEST["tanto"];
         $tanka = $_REQUEST["tanka"];
         $session1 = $_REQUEST["session1"];
         $kagensan = $_REQUEST["kagensan"];
         $zaikosu = $_REQUEST["zaikosu"];
         $torihiki_item = $_REQUEST["torihiki_item"];
         $sentaku_item = $_REQUEST["sentaku_item"];
         $check_item = $_REQUEST["check_item"];
}

function ukeru2($denpyo_no,$denpyo_no2,$renban,$torihikisaki_mei,$zipcode,$jusho1,$jusho2,$namae_soto,$shohin_code,$denpyo_kubun,$suryo) {
    global $denpyo_no;
    global $denpyo_no2;
    global $renban;
    global $torihikisaki_mei;
    global $zipcode;
    global $jusho1;
    global $jusho2;
    global $namae_soto;
    global $shohin_code;
    global $denpyo_kubun;
    global $suryo;
         $denpyo_no = $_REQUEST["denpyo_no"];
         $denpyo_no2 = $_REQUEST["denpyo_no2"];
         $renban = $_REQUEST["renban"];
         $torihikisaki_mei = $_REQUEST["torihikisaki_mei"];
         $zipcode = $_REQUEST["zipcode"];
         $jusho1 = $_REQUEST["jusho1"];
         $jusho2 = $_REQUEST["jusho2"];
         $namae_soto = $_REQUEST["namae_soto"];
         $shohin_code = $_REQUEST["shohin_code"];
         $denpyo_kubun = $_REQUEST["denpyo_kubun"];
         $suryo = $_REQUEST["suryo"];
}

function ukeru3($tani,$kingaku,$hakobi,$tanto,$tanto_mei,$biko,$seikyu_sime,$seikyu_ym,$tekiyo,$denpyo_new,$za_torihikisaki_no,$za_torihikisaki_mei) {
    global $tani;
    global $kingaku;
    global $hakobi;
    global $tanto;
    global $tanto_mei;
    global $biko;
    global $seikyu_sime;
    global $seikyu_ym;
    global $tekiyo;
    global $denpyo_new;
    global $za_torihikisaki_no;
    global $za_torihikisaki_mei;
         $tani = $_REQUEST["tani"];
         $kingaku = $_REQUEST["kingaku"];
         $hakobi = $_REQUEST["hakobi"];
         $tanto_mei = $_REQUEST["tanto_mei"];
         $tanto = $_REQUEST["tanto"];
         $biko = $_REQUEST["biko"];
         $seikyu_sime = $_REQUEST["seikyu_sime"];
         $seikyu_ym = $_REQUEST["seikyu_ym"];
         $tekiyo = $_REQUEST["tekiyo"];
         $denpyo_new = $_REQUEST["denpyo_new"];
         $za_torihikisaki_no = $_REQUEST["za_torihikisaki_no"];
         $za_torihikisaki_mei = $_REQUEST["za_torihikisaki_mei"];
}

function ukeru4($joho_ymd,$joho_torihikisaki,$joho_kubun,$joho_juchuno,$joho_hakobi,$processing,$kensaku_no,$kensaku_kubun,$kari_zaiko1,$kari_zaiko2) {
    global $joho_ymd;
    global $joho_torihikisaki;
    global $joho_kubun;
    global $joho_juchuno;
    global $joho_hakobi;
    global $processing;
    global $kensaku_no;
    global $kensaku_kubun;
    global $kari_zaiko1;
    global $kari_zaiko2;
         $joho_ymd = $_REQUEST["joho_ymd"];
         $joho_torihikisaki = $_REQUEST["joho_torihikisaki"];
         $joho_kubun = $_REQUEST["joho_kubun"];
         $joho_juchuno = $_REQUEST["joho_juchuno"];
         $joho_hakobi = $_REQUEST["joho_hakobi"];
         $processing = $_REQUEST["processing"];
         $kensaku_no = $_REQUEST["kensaku_no"];
         $kensaku_kubun = $_REQUEST["kensaku_kubun"];
         $kari_zaiko1 = $_REQUEST["kari_zaiko1"];
         $kari_zaiko2 = $_REQUEST["kari_zaiko2"];
}

function ukeru5($shohinmei,$tani,$uri_tanka,$kanmi,$ig_kubun,$shohin_kensu,$bango,$hinshu,$hinshu_teisei) {
    global $shohinmei;
    global $joho_kubun;
    global $uri_tanka;
    global $kanmi;
    global $ig_kubun;
    global $shohin_kensu;
    global $bango;
    global $hinshu;
    global $hinshu_teisei;
         $shohinmei = $_REQUEST["shohinmei"];
         $tani = $_REQUEST["tani"];
         $uri_tanka = $_REQUEST["uri_tanka"];
         $kanmi = $_REQUEST["kanmi"];
         $ig_kubun = $_REQUEST["ig_kubun"];
         $shohin_kensu = $_REQUEST["shohin_kensu"];
         $bango = $_REQUEST["bango"];
         $hinshu = $_REQUEST["hinshu"];
         $hinshu_teisei = $_REQUEST["hinshu_teisei"];
}

/********************
* 締め処理
*********************/
function sime() {
	setuzoku();
	global $con;

	$torihikisaki_no=$_SESSION['torihikisaki_no'];
	$hakobi=$_SESSION['hakobi'];
	$sql="select * from torihikisaki where bango='$torihikisaki_no'";
	$result=pg_exec($con,$sql);
	if ($result == FALSE) {
		print("MIN検索に失敗した。$sql<br>");
		exit;
	}
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow >0 ) {
		$data = pg_fetch_object($result, 0);
		$sime = $data->sime;
	}

	print("<div style=\"position:absolute; left:260px; top:500px\">\n");
	//      print("sime = $sime<br>\n");
	print("</div>\n");

	switch ($sime) {
	//15締め対応20110803(start)
	        case '0':
	              $seikyu_sime='15';
	              break;
	//15締め対応20110803(end)
	        case '1':
	              $seikyu_sime='20';
	              break;
	        case '2':
	              $seikyu_sime='25';
	              break;
	        default:
	          $yy=mb_substr($hakobi, 0 ,4);
	          $mm=mb_substr($hakobi, 5 ,2);
	          $dd='01';
	          $aa='/';
	          $ymd=$yy.$aa.$mm.$aa.$dd;
	          $now =strtotime($ymd);
	          $seikyu_sime = date("t", $now);
	          if ($seikyu_sime == '28') {
	              $uruu=date('L');
	              if ($uruu == 1) {
	                  $seikyu_sime=29;
	              }
	          }
	}

	$_SESSION['seikyu_sime']=$seikyu_sime;

	$y_h=mb_substr($hakobi, 0,4);
	$m_h=mb_substr($hakobi, 5,2);
	$d_h=mb_substr($hakobi, 8,2);
	$s=$sime;

	$kijun_ymd=$y_h.$m_h.$d_h;

	$y_h= intval($y_h);
	$m_h= intval($m_h);

	switch ($sime) {
	//15締め対応20110803(start)
	        case 0:
	               $s_data='15';
	               //範囲の前の年月日
	               $mae_t=$m_h - 1;    //前月を求める
	               $mae_t=str_pad($mae_t, 2, "0",STR_PAD_LEFT);
	               $s_m=intval($s_data) + 1;
	               $y_h2=$y_h;
	               if ($mae_t == 0) {
	                   $y_h2=$y_h -1;
	                   $mae_t=12;
	                   $s_m=intval($s_data) + 1;       //締日+1→21
	               }
	               //範囲の後ろの年月日
	               $usiro_t=str_pad($m_h, 2, "0",STR_PAD_LEFT);      //基準月をそのまま
	               $mae_ymd=$y_h2.$mae_t.$s_m;     //範囲の前の年月日data
	               $usiro_ymd=$y_h.$usiro_t.$s_data;   //範囲の後ろの年月日data
	               if (($mae_ymd <= $kijun_ymd) and ($usiro_ymd >= $kijun_ymd)) {
	                   $seikyu_ym=$y_h.str_pad($m_h, 2, "0",STR_PAD_LEFT);
	               } else {
	                   if ($mae_ymd >= $kijun_ymd) {
	                       $m_h2 = $m_h -1;
	                       $m_h2=str_pad($m_h2, 2, "0",STR_PAD_LEFT);
	                       $seikyu_ym=$y_h.$m_h2;
	                       if ($m_h2 == 0) {
	                           $m_h2='12';
	                           $y_h2=$y_h - 1;
	                           $seikyu_ym=$y_h2.$m_h2;
	                       }
	                   }
	                   if ($usiro_ymd <= $kijun_ymd) {
	                       $m_h2 = $m_h + 1;
	                       $m_h2=str_pad($m_h2, 2, "0",STR_PAD_LEFT);
	                       $seikyu_ym=$y_h.$m_h2;
	                       if ($m_h2 == 13) {
	                           $m_h2='01';
	                           $y_h2=$y_h + 1;
	                           $seikyu_ym=$y_h2.$m_h2;
	                       }
	                   }
	               }
	               break;
	//15締め対応20110803(end)
	        case 1:
	               $s_data='20';
	               //範囲の前の年月日
	               $mae_t=$m_h - 1;    //前月を求める
	               $mae_t=str_pad($mae_t, 2, "0",STR_PAD_LEFT);
	               $s_m=intval($s_data) + 1;
	               $y_h2=$y_h;
	               if ($mae_t == 0) {
	                   $y_h2=$y_h -1;
	                   $mae_t=12;
	                   $s_m=intval($s_data) + 1;       //締日+1→21
	               }
	               //範囲の後ろの年月日
	               $usiro_t=str_pad($m_h, 2, "0",STR_PAD_LEFT);       //基準月をそのまま
	               $mae_ymd=$y_h2.$mae_t.$s_m;     //範囲の前の年月日data
	               $usiro_ymd=$y_h.$usiro_t.$s_data;   //範囲の後ろの年月日data
	               if (($mae_ymd <= $kijun_ymd) and ($usiro_ymd >= $kijun_ymd)) {
	                   $seikyu_ym=$y_h.str_pad($m_h, 2, "0",STR_PAD_LEFT);
	               } else {
	                   if ($mae_ymd >= $kijun_ymd) {
	                       $m_h2 = $m_h -1;
	                       $m_h2=str_pad($m_h2, 2, "0",STR_PAD_LEFT);
	                       $seikyu_ym=$y_h.$m_h2;
	                       if ($m_h2 == 0) {
	                           $m_h2='12';
	                           $y_h2=$y_h - 1;
	                           $seikyu_ym=$y_h2.$m_h2;
	                       }
	                   }
	                   if ($usiro_ymd <= $kijun_ymd) {
	                       $m_h2 = $m_h + 1;
	                       $m_h2=str_pad($m_h2, 2, "0",STR_PAD_LEFT);
	                       $seikyu_ym=$y_h.$m_h2;
	                       if ($m_h2 == 13) {
	                           $m_h2='01';
	                           $y_h2=$y_h + 1;
	                           $seikyu_ym=$y_h2.$m_h2;
	                       }
	                   }
	               }
	               break;
	        case 2:
	               $s_data='25';
	               //範囲の前の年月日
	               $mae_t=$m_h - 1;    //前月を求める
	               $mae_t=str_pad($mae_t, 2, "0",STR_PAD_LEFT);
	               $s_m=intval($s_data) + 1;
	               $y_h2=$y_h;
	               if ($mae_t == 0) {
	                   $y_h2=$y_h -1;
	                   $mae_t=12;
	                   $s_m=intval($s_data) + 1;       //締日+1→21
	               }
	               //範囲の後ろの年月日
	               $usiro_t=str_pad($m_h, 2, "0",STR_PAD_LEFT);      //基準月をそのまま
	               $mae_ymd=$y_h2.$mae_t.$s_m;     //範囲の前の年月日data
	               $usiro_ymd=$y_h.$usiro_t.$s_data;   //範囲の後ろの年月日data

	               
	               if (($mae_ymd <= $kijun_ymd) and ($usiro_ymd >= $kijun_ymd)) {
	                   $seikyu_ym=$y_h.str_pad($m_h, 2, "0",STR_PAD_LEFT);
	               } else {
	                   if ($mae_ymd >= $kijun_ymd) {
	                       $m_h2 = $m_h -1;
	                       $m_h2=str_pad($m_h2, 2, "0",STR_PAD_LEFT);
	                       $seikyu_ym=$y_h.$m_h2;
	                       if ($m_h2 == 0) {
	                           $m_h2='12';
	                           $y_h2=$y_h - 1;
	                           $seikyu_ym=$y_h2.$m_h2;
	                       }
	                   }
	                   if ($usiro_ymd <= $kijun_ymd) {
	                       $m_h2 = $m_h + 1;
	                       $m_h2=str_pad($m_h2, 2, "0",STR_PAD_LEFT);
	                       $seikyu_ym=$y_h.$m_h2;
	                       if ($m_h2 == 13) {
	                           $m_h2='01';
	                           $y_h2=$y_h + 1;
	                           $seikyu_ym=$y_h2.$m_h2;
	                       }
	                   }
	               }
	               break;
	        case 3:
	               $s_data=$seikyu_sime;
	               $dd='01';
	               $mae_ymd=$y_h.str_pad($m_h, 2, "0",STR_PAD_LEFT).$dd;     //範囲の前の年月日data
	               $usiro_ymd=$y_h.str_pad($m_h, 2, "0",STR_PAD_LEFT).$s_data;   //範囲の後ろの年月日data
	               

	               if (($mae_ymd <= $kijun_ymd) and ($usiro_ymd >= $kijun_ymd)) {
	                   $seikyu_ym=$y_h.str_pad($m_h, 2, "0",STR_PAD_LEFT);
	               } else {
	                   if ($mae_ymd >= $kijun_ymd) {
	                       $m_h2 = $m_h -1;
	                       $m_h2=str_pad($m_h2, 2, "0",STR_PAD_LEFT);
	                       $seikyu_ym=$y_h.$m_h2;
	                       if ($m_h2 == 0) {
	                           $m_h2='12';
	                           $y_h2=$y_h - 1;
	                           $seikyu_ym=$y_h2.$m_h2;
	                       }
	                   }
	                   if ($usiro_ymd <= $kijun_ymd) {
	                       $m_h2 = $m_h + 1;
	                       $m_h2=str_pad($m_h2, 2, "0",STR_PAD_LEFT);
	                       $seikyu_ym=$y_h.$m_h2;
	                       if ($m_h2 == 13) {
	                           $m_h2='01';
	                           $y_h2=$y_h + 1;
	                           $seikyu_ym=$y_h2.$m_h2;
	                       }
	                   }
	               }
	               break;
	        default:
	}

	print("<div style=\"position:absolute; left:60px; top:500px\">\n");
	//      print("torihikisaki_no = $torihikisaki_no<br>\n");
	//      print("hakobi = $hakobi<br>\n");
	//      print("seikyu_sime = $seikyu_sime<br>\n");
	//      print("sime = $sime<br>\n");
	//      print("kijun_ymd = $kijun_ymd<br>\n");
	//      print("mae_ymd = $mae_ymd<br>\n");
	//      print("usiro_ymd = $usiro_ymd<br>\n");
	//      print("seikyu_ym = $seikyu_ym<br>\n");
	print("</div>\n");

	$_SESSION['seikyu_ym']=$seikyu_ym;

}

/**************
* function終了
**************/

/*****************************
* function  開始 2005.12.13
******************************/

/**************
* 表示処理(親)
**************/
function hyoji() {
	setuzoku();
	global $con;

	$torihikisaki_no=$_SESSION['torihikisaki_no'];		//取引先番号
	$hakobi=$_SESSION['hakobi'];						//発行日
	$denpyo_kubun=$_SESSION['denpyo_kubun'];			//伝票区分
	$juchu_no=$_SESSION['juchu_no'];					//受注番号
	$hinshu=$_SESSION['hinshu'];						//品種

	//発行日が空の場合は、システム日付を設定
	if (empty($hakobi)) {
		$y=date('Y');
		$m=date('m');
		$d=date('d');
		$a=".";
		$hakobi=$y.$a.$m.$a.$d;
	}
	print("<div style=\"position:absolute; left:400px; top:190px\" id=\"remaining_stock\"></div>\n");
	print("<div style=\"position:absolute; left:20px; top:80px\">\n");
		print("<img src=\"gazo/bar_1.gif\">\n");
	print("</div>\n");

	//伝票区分の凡例を表示
	print("<div style=\"position:absolute; left:267px; top:67px\">\n");
		print("<span style=\"font: 9pt/10pt 'MS PGothic'; color: #8080FF\">伝票区分 ".
		    "<span style=\"font: 15px 'MS PGothic'; color: #804040\">１：</span>売上 ".
		    "<span style=\"font: 15px 'MS PGothic'; color: #804040\">２：</span>預り売上 ".
		    "<span style=\"font: 15px 'MS PGothic'; color: #804040\">３：</span>預り出荷 ".
		    "<span style=\"font: 15px 'MS PGothic'; color: #804040\">４：</span>仮伝 ".
		    "<span style=\"font: 15px 'MS PGothic'; color: #ff0000\">５：赤伝<br></span>\n");
	print("</div>\n");

	//変更状態を取得
	$kawatta=$_SESSION['kawatta'];
	if ($kawatta == '2') {		//変わった場合は、受注番号をクリア
		$juchu_no="";
	}
	//ＴＯＰ情報表示＆検索画面
	$hakobi = htmlspecialchars($hakobi, ENT_QUOTES, "UTF-8");
	$torihikisaki_no = htmlspecialchars($torihikisaki_no, ENT_QUOTES, "UTF-8");
	$denpyo_kubun = htmlspecialchars($denpyo_kubun, ENT_QUOTES, "UTF-8");
	$juchu_no = htmlspecialchars($juchu_no, ENT_QUOTES, "UTF-8");
	$hinshu = htmlspecialchars($hinshu, ENT_QUOTES, "UTF-8");
	$kensaku_kubun = htmlspecialchars($kensaku_kubun, ENT_QUOTES, "UTF-8");
	$kensaku_no = htmlspecialchars($kensaku_no, ENT_QUOTES, "UTF-8");
//---------------------------------------------- 2013/12/20-DUY 番号１ ---------------------------------------------------------
	print("<div style=\"position:absolute; left:170px; top:90px\">\n");  //200903追加
	  print("<form name=\"myFORM\" action=\"seikyu1.php\" method=\"POST\">\n");
	  print("<table border=\"0\">\n");
	//   print("<tr><td style=\"text-align:center; vertical-align:bottom\"><span style=\"font: 10pt/10pt 'MS PGothic'\">発行日付</span></td>\n");
	//   print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">取引先番号</span></td>\n");
	//   print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">伝票区分</span></td>\n");
	  print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">受注番号</span></td>\n");
	//   print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">品種</span></td>\n");  //200903追加
	  print("<td rowspan=\"2\" style=\"vertical-align:bottom\">\n");
	  print("<input type=\"image\" src=\"gazo/hyoji.gif\">\n");
	  print("</td>\n");
	  print("</div>\n");  //200903追加

	  print("<div style=\"position:absolute; left:70px; top:97px\">\n");  //200903追加
	  print("<tr><td>\n");
	//   print("<input type=\"text\" name=\"hakobi\" value=\"$hakobi\" style=\"width:80px; height:19px; text-align: center; font-size: 10pt; border-width: 1px; ime-mode: inactive\" onkeypress=\"return check(event, this.form, 'torihikisaki_no')\" />\n");
	//   print("</td>\n");
	//   print("<td>\n");
	//   print("<input type=\"text\" name=\"torihikisaki_no\" value=\"$torihikisaki_no\" style=\"width:65px; height:19px; text-align: center; font-size: 10pt; border-width: 1px; ime-mode: inactive\" onkeypress=\"return check(event, this.form, 'denpyo_kubun')\" />\n");
	//   print("</td>\n");
	//   print("<td>\n");
	//   print("<input type=\"text\" name=\"denpyo_kubun\" value=\"$denpyo_kubun\" style=\"width:65px; height:19px; text-align: center; font-size: 10pt; border-width: 1px; ime-mode: inactive\" onkeypress=\"return check(event, this.form, 'juchu_no')\" />\n");
	//   print("</td>\n");
	//   print("<td>\n");
	  print("<input type=\"text\" name=\"juchu_no\" value=\"$juchu_no\"  style=\"width:65px; height:19px; text-align: center; font-size: 10pt; border-width: 1px; ime-mode: inactive\" onkeypress=\"return check(event, this.form, 'hakobi')\" />\n");
	  print("</td>\n");
	//   print("<td>\n");
	//   print("<input type=\"text\" name=\"hinshu\" value=\"$hinshu\" style=\"width:40px; height:19px; text-align: center; font-size: 10pt; border-width: 1px; ime-mode: inactive\" onkeypress=\"return check(event, this.form, 'hakobi')\" />\n");  //200903追加
	//   print("</td>\n");
	  print("</table>\n");
	  print("<input type=\"hidden\" name=\"torihikisaki_no\" value=\"$torihikisaki_no\">\n");
	  print("<input type=\"hidden\" name=\"check_item\" value=\"表示\">\n");
	  print("</form>\n");
	print("</div>\n");
	print("<div style=\"position:absolute; left:350px; top:90px\">\n");
	  print("<form name=\"myFORM\" action=\"seikyu1.php\" method=\"POST\">\n");
	  print("<table border=\"0\">\n");
	//   print("<tr><td><span style=\"font: 10pt/10pt 'MS PGothic'\">伝票区分</span></td>\n");
	  print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">伝票番号</span></td>\n");
	  print("<td rowspan=\"2\" style=\"vertical-align:bottom\">\n");
	  print("<input type=\"image\" src=\"gazo/kensaku001.gif\">\n");
	  print("</td>\n");
	  print("<tr><td>\n");
	//   print("<tr><td>\n");
	//   print("<input type=\"text\" name=\"kensaku_kubun\" value=\"$kensaku_kubun\" style=\"width:35px; height:20px; text-align: right; font-size: 15px; ime-mode: inactive\" onkeypress=\"return check(event, this.form, 'denpyo_new')\" />\n");
	//   print("</td>\n");
	//   print("<td>\n");
	  print("<input type=\"text\" name=\"kensaku_no\" value=\"$kensaku_no\" style=\"text-align: right; ime-mode: inactive; width: 75px\" size=\"12\" onkeypress=\"return check(event, this.form, 'denpyo_kubun')\" />\n");
	  print("</td>\n");
	  print("</table>\n");
	  print("<input type=\"hidden\" name=\"check_item\" value=\"売上検索\">\n");
	  print("</form>\n");
	print("</div>\n");
	///////////////////////////////////////////////////////////////////////////////////////////////////////change
}

/********************
* 表示処理(明細１)
*********************/
function hyoji_meisai001() {
	setuzoku();
	global $con;

	//在庫数を取得する
	$zaikosu=$_SESSION['zaikosu'];
	//在庫数が空 または、 0 の場合
	if (!empty($zaikosu) or $zaikosu== '0') {
		//セッション変数の情報を設定
		$denpyo_no=$_SESSION['denpyo_no'];
		$denpyo_kubun=$_SESSION['denpyo_kubun'];
		$hakobi=$_SESSION['hakobi'];
		$juchu_no=$_SESSION['juchu_no'];
		$torihikisaki_no=$_SESSION['torihikisaki_no'];
		$torihikisaki_mei=$_SESSION['torihikisakimei'];
		$zipcode=$_SESSION['zipcode'];
		$jusho1=$_SESSION['jusho1'];
		$jusho2=$_SESSION['jusho2'];
		$tanto_mei=$_SESSION['tanto_mei'];
		$shohin_code=$_SESSION['shohin_code'];
		$shohin_mei=$_SESSION['shohin_mei'];
		$suryo=$_SESSION['zaikosu'];
		$tani=$_SESSION['tani'];
		$tanka=$_SESSION['tanka'];
		$biko=$_SESSION['biko'];
		$kingaku=doubleval($suryo) * doubleval($tanka);
	} else {
		$denpyo_no=$_SESSION['denpyo_no'];
		$denpyo_kubun=$_SESSION['denpyo_kubun'];
		$hakobi=$_SESSION['hakobi'];
		$juchu_no=$_SESSION['juchu_no'];
		$torihikisaki_no=$_SESSION['torihikisaki_no'];
		$torihikisakimei=$_SESSION['torihikisakimei'];
		$shohin_code=$_SESSION['shohin_code'];
		$shohin_mei=$_SESSION['shohin_mei'];
		//伝票区分で判断
		switch ($denpyo_kubun) {
			case '3':		//預かり出荷の場合
			      $suryo=$_SESSION['kagensan'];		//加減算を設定
			      break;
			default:
			      $suryo=$_SESSION['suryo'];		//数量を設定
		}
		$tani=$_SESSION['tani'];
		$tanka=$_SESSION['tanka'];    
		$biko=$_SESSION['biko'];
		$zipcode=$_SESSION['zipcode'];
		$jusho1=$_SESSION['jusho1'];
		$jusho2=$_SESSION['jusho2'];
		$tanto_mei=$_SESSION['tanto_mei'];
		//数量と単価に値が入っていれば、金額を算出
		if (!empty($suryo) and !empty($tanka)) {
			$kingaku=doubleval($suryo) * doubleval($tanka);
		}   
	}

	//表示ボタンが押された時の処理
	$kawatta=$_SESSION['kawatta'];
	if ($kawatta == '2') {		//取引先番号を変更した場合
		$juchu_no="";
		$shohin_mei="";
		$kagensan="";
		$suryo="";
		$tani="";
		$tanka="";
		$kingaku="";
		$biko="";
	}

	$kanmi = htmlspecialchars($kanmi, ENT_QUOTES, "UTF-8");
	$juchu_no = htmlspecialchars($juchu_no, ENT_QUOTES, "UTF-8");
	$shohin_mei = htmlspecialchars($shohin_mei, ENT_QUOTES, "UTF-8");
	$kagensan = htmlspecialchars($kagensan, ENT_QUOTES, "UTF-8");
	$suryo = htmlspecialchars($suryo, ENT_QUOTES, "UTF-8");
	$tani = htmlspecialchars($tani, ENT_QUOTES, "UTF-8");
	$tanka = htmlspecialchars($tanka, ENT_QUOTES, "UTF-8");
	$kingaku = htmlspecialchars($kingaku, ENT_QUOTES, "UTF-8");
	$biko = htmlspecialchars($biko, ENT_QUOTES, "UTF-8");
	$tanto_mei = htmlspecialchars($tanto_mei, ENT_QUOTES, "UTF-8");

	print("<div style=\"position:absolute; left:210px; top:700px\">\n");
	//  print("suryo=$suryo<br>\n");
	//  print("suryo_s=$suryo_s<br>\n");
	//  print("denpyo_kubun=$denpyo_kubun<br>\n");
	//  $kagensan=$_SESSION['kagensan'];
	//  print("kagensan=$kagensan<br>\n");
	//  print("zaikosu=$zaikosu<br>\n");
	print("</div>\n");

	print("<div style=\"position:absolute; left:20px; top:140px\">\n");
	  print("<form action=\"seikyu1.php\" method=\"POST\">\n");
	  print("<table border=\"1\" style=\"border-spacing:0px\">\n");
	  print("<tr style=\"background-color: #B0B0FF\"><td><span style=\"font: 10pt/10pt 'MS PGothic'\">受注NO</span></td>\n");
	  print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">品名・規格</span></td>\n");
	  print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">数量</span></td>\n");
	  print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">単位</span></td>\n");
	  print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">単価</span></td>\n");
	  print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">金額</span></td>\n");
	  print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">備考</span></td>\n");
	  
	  print("<td rowspan=\"2\" style=\"vertical-align:bottom;width: 70px;\">\n");
	  if ($kanmi == '完') {
	          print("<input type=\"radio\" name=\"kanmi\" value=\"完\" checked><span style=\"font: 9pt/10pt 'MS PGothic'\">完</span><br>".
	                "<input type=\"radio\" name=\"kanmi\" value=\"未\"><span style=\"font: 9pt/10pt 'MS PGothic'\">未</span>\n");
	         } else if ($kanmi == '未'){
	          print("<input type=\"radio\" name=\"kanmi\" value=\"完\"><span style=\"font: 9pt/10pt 'MS PGothic'\">完</span><br>".
	                "<input type=\"radio\" name=\"kanmi\" value=\"未\" checked><span style=\"font: 9pt/10pt 'MS PGothic'\">未</span>\n");
	         } else {
	          print("<input type=\"radio\" name=\"kanmi\" value=\"完\"><span style=\"font: 9pt/10pt 'MS PGothic'\">完</span><br>".
	                "<input type=\"radio\" name=\"kanmi\" value=\"未\"><span style=\"font: 9pt/10pt 'MS PGothic'\">未</span>\n");
	         }
	  print("</td>\n");
	  print("<td rowspan=\"2\" style=\"vertical-align:middle\">\n");
	  print("<button type=\"button\" onclick=\"add()\" style=\"border: 0px; margin: 0px; padding: 0px\"><img src=\"gazo/kosin.gif\"/></button>\n");
	  print("</td>\n");
	  print("<tr><td>\n");
	  print("<input type=\"text\" name=\"juchu_no\" id=\"juchu_no1\" value=\"$juchu_no\" style=\"width: 50px; height: 19px\">\n");
	  print("</td>\n");
	  print("<td>\n");
	  print("<input type=\"text\" name=\"shohin_mei\" id=\"shohin_mei\" value=\"$shohin_mei\" style=\"width:375px; height: 19px\">\n"); /*29-28*/
	  print("</td>\n");
	  print("<td>\n");
	  if ($denpyo_kubun == '3') {
	      $kagensan=$_SESSION['kagensan'];
	      print("<input type=\"text\" name=\"suryo\" id=\"suryo\" value=\"$kagensan\" style=\"text-align: right ;width: 53px; height: 19px\">\n");
	  } else {
	      print("<input type=\"text\" name=\"suryo\" id=\"suryo\" value=\"$suryo\" style=\"text-align: right ;width: 53px; height: 19px\">\n");
	  }
	  print("</td>\n");
	  print("<td>\n");
	  print("<input type=\"text\" name=\"tani\" id=\"tani\" value=\"$tani\" style=\"text-align: right;width: 55px; height: 19px\">\n");
	  print("</td>\n");
	  print("<td>\n");
	  print("<input type=\"text\" name=\"tanka\" id=\"tanka\" value=\"$tanka\" style=\"text-align: right;width: 55px; height: 19px\">\n");
	  print("</td>\n");
	  print("<td>\n");
	  if ($denpyo_kubun == '3') {
	      $kingaku="";
	      print("<input type=\"text\" name=\"kingaku\" id=\"kingaku\" value=\"$kingaku\" style=\"text-align: right;width: 77px; height: 19px\">\n");
	  } else {
	      print("<input type=\"text\" name=\"kingaku\" id=\"kingaku\" value=\"$kingaku\" style=\"text-align: right;width: 77px; height: 19px\">\n");
	  }
	  print("</td>\n");
	  print("<td>\n");
	  print("<input type=\"text\" name=\"biko\" id=\"biko\" value=\"$biko\" style=\"width: 160px; height: 19px\">\n");
	  print("</td>\n");
	  print("</table>\n");
	  print("<input type=\"hidden\" name=\"tanto_mei\" id=\"tanto_mei\" value=\"$tanto_mei\">\n");
	  print("<input type=\"hidden\" name=\"check_item\" id=\"check_item\" value=\"更新\">\n");
	  print("</form>\n");
	print("</div>\n");
}

/********************
* 表示処理(明細２)
*********************/
function hyoji_meisai002() {
	setuzoku();
	global $con;

	//基本情報を取得
	$ken=$_SESSION['kensaku'];

	if (($ken == '有') or ($ken == '無')) {
	    $denpyo_no=$_SESSION['kensaku_no'];
	    $denpyo_kubun=$_SESSION['kensaku_kubun'];
	} else {
	    $denpyo_no=$_SESSION['denpyo_no'];
	    $denpyo_kubun=$_SESSION['denpyo_kubun'];
	}
	$hakobi=$_SESSION['hakobi'];
	$torihikisaki_no=$_SESSION['torihikisaki_no'];
	$torihikisaki_mei=$_SESSION['torihikisaki_mei'];
	$juchu_no=$_SESSION['juchu_no'];

	$zipcode=$_SESSION['zipcode'];
	$jusho1=$_SESSION['jusho1'];
	$jusho2=$_SESSION['jusho2'];
	$uriage_ymd=$_SESSION['uriage_ymd'];
	$tanto_mei=$_SESSION['tanto_mei'];
	$seikyu_ym=$_SESSION['seikyu_ym'];
	$seikyu_sime=$_SESSION['seikyu_sime'];

	$hinshu=$_SESSION['hinshu'];    //2009.03追加

    print("<div style=\"position:absolute; left:20px; top:200px\">\n");
        print("<img src=\"gazo/uriage.gif\"<br>\n");
    print("</div>\n");
	print("<form name=\"myFORM\" action=\"seikyu1.php\" method=\"POST\">\n");
	print("<div style=\"position: absolute; display: flex; height: 21px; left: 145px; top: 200px; background-color: #d7d7ff; align-items: center;padding-inline: 5px;\">\n");
	print("<span style=\"font: 10pt/10pt 'MS PGothic';margin-right: 5px\">取引先番号</span>\n");
		print("<input type=\"text\" name=\"torihikisaki_no\" value=\"$torihikisaki_no\" style=\"width:65px; text-align: center; font-size: 10pt; border-width: 1px; ime-mode: inactive; margin-right: 5px\" onkeypress=\"return check(event, this.form, 'denpyo_kubun')\" />\n");
		print("<input type=\"image\" style=\"height: 21px;\" src=\"gazo/hyoji.gif\">\n");
		print("<input type=\"hidden\" name=\"check_item\" value=\"表示\">\n");
	print("</div>\n");
	print("</form>\n");

	//住所表示
	$aaa='〒';
	$aaaa=$aaa.$zipcode;
	$jusho=$jusho1.$jusho2;

	$aaaa = htmlspecialchars($aaaa, ENT_QUOTES, "UTF-8");
	$jusho = htmlspecialchars($jusho, ENT_QUOTES, "UTF-8");
	$hinshu = htmlspecialchars($hinshu, ENT_QUOTES, "UTF-8");
	$torihikisaki_mei = htmlspecialchars($torihikisaki_mei, ENT_QUOTES, "UTF-8");

	print("<div style=\"position:absolute; left:20px; top:225px\">\n");
	    print("<span style=\"font: 11pt/10pt 'MS PGothic'; color: #000000\">$aaaa</span>\n");
	print("</div>\n");

	print("<div style=\"position:absolute; left:35px; top:245px\">\n");
	    print("<span style=\"font: 11pt/11pt 'MS PGothic'; color: #000000\">$jusho</span>\n");
	print("</div>\n");

	print("<div style=\"position:absolute; left:323px; top:280px\">\n");  //2009.03追加
	    print("<span style=\"font: 10pt/11pt 'MS PGothic'; color: #0000bb\">品種=</span>\n");
	    print("<span style=\"font: 10pt/11pt 'MS PGothic'; color: #0000bb\">$hinshu</span>\n");
	print("</div>\n");

	//取引先名表示   $torihikisaki_mei=$namae_soto;
	print("<div style=\"position:absolute; left:35px; top:273px\">\n");
	    print("<span style=\"font: 12pt/14pt 'MS PGothic'; color: #000000\">$torihikisaki_mei</span>\n");
	print("</div>\n");

    switch ($denpyo_kubun) {
       case 1:
              $denpyo_kubun_hyo = '売上';
              break;
       case 2:
              $denpyo_kubun_hyo = '預り売上';
              break;
       case 3:
             $denpyo_kubun_hyo = '預り出荷';
              break;
       case 4:
              $denpyo_kubun_hyo = '仮伝';
              break;
       case 5:
              $denpyo_kubun_hyo = '赤仮伝';
              break;
       default:
    }
    $denpyo_no = htmlspecialchars($denpyo_no, ENT_QUOTES, "UTF-8");
    $seikyu_ym = htmlspecialchars($seikyu_ym, ENT_QUOTES, "UTF-8");
    $seikyu_sime = htmlspecialchars($seikyu_sime, ENT_QUOTES, "UTF-8");
    $denpyo_kubun_hyo = htmlspecialchars($denpyo_kubun_hyo, ENT_QUOTES, "UTF-8");
    $hakobi = htmlspecialchars($hakobi, ENT_QUOTES, "UTF-8");

	print("<form action=\"seikyu1.php\" method=\"POST\">\n");
	print("<div style=\"position:absolute; left:647px; top:200px\">\n");
	print("<table border=\"1\" style=\"border-spacing:0px\">\n");
	print("<tr style=\"background-color: #B0B0FF\"><td colspan=\"2\"><span style=\"font: 10pt/10pt 'MS PGothic'\">伝票番号</span></td>\n");
	print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">請求月</span></td>\n");
	print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">締日</span></td>\n");
	print("<tr><td colspan=\"2\"><input type=\"text\" name=\"denpyo_no\" value=\"$denpyo_no\" style=\"width: 194px; height: 19px\"></td>\n");
	print("<td>\n");
	print("<input type=\"text\" name=\"seikyu_ym\" value=\"$seikyu_ym\" style=\"text-align: center;width: 90px; height: 19px\">\n");
	print("</td>\n");
	print("<td>\n");
	print("<input type=\"text\" name=\"seikyu_sime\" value=\"$seikyu_sime\" style=\"text-align: center;width: 62px; height: 19px\">\n");
	print("</td>\n");
	print("<tr style=\"background-color: #B0B0FF\"><td><span style=\"font: 10pt/10pt 'MS PGothic'\">伝票区分</span></td>\n");
	print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">発行日</span></td>\n");
	print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">売上日</span></td>\n");
	print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">担当者</span></td>\n");

	print("<tr><td>\n");
	// print("<input type=\"text\" name=\"denpyo_kubun_hyo\" value=\"$denpyo_kubun_hyo\" style=\"text-align: center;width: 65px; height: 19px\">\n");
	print("<select id=\"select\" style=\"width: 110px; height: 19px\">\n");
	print("<option value=\"1\" style=\"color: #000000\">１：売上</option>\n");
	print("<option value=\"2\" style=\"color: #000000\">２：預り売上</option>\n");
	print("<option value=\"3\" style=\"color: #000000\">３：預り出荷</option>\n");
	print("<option value=\"4\" style=\"color: #000000\">４：仮伝</option>\n");
	print("<option value=\"5\" style=\"color: #ff0000\">５：赤伝</option>\n");
	print("</select>\n");
	print("</td>\n");
	print("<td>\n");
	print("<input type=\"text\" name=\"hakobi\" value=\"$hakobi\" style=\"width: 80px; height: 19px\">\n");
	print("</td>\n");
	ymd();
	$uriage_ymd=$_SESSION['s_ymd'];
	$uriage_ymd = htmlspecialchars($uriage_ymd, ENT_QUOTES, "UTF-8");
	$tanto_mei = htmlspecialchars($tanto_mei, ENT_QUOTES, "UTF-8");
	print("<td>\n");
	print("<input type=\"text\" name=\"uriage_ymd\" value=\"$uriage_ymd\" style=\"width: 90px; height: 19px\">\n");
	print("</td>\n");
	print("<td>\n");
	print("<input type=\"text\" name=\"tanto_mei\" value=\"$tanto_mei\" style=\"width: 62px; height: 19px\">\n");
	print("</td></table>\n");
	print("</div>\n");
	print("</form>\n");

	$sql = "select * from seikyu where (denpyo_no='$denpyo_no') and (denpyo_kubun='$denpyo_kubun')";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
    if ($resultNumRow > 0) {
        $rowCount=0;
        $kaiage_togetu= 0;
        while ($rowCount < $resultNumRow) {
               $data = pg_fetch_object($result,$rowCount);
               $torihikisaki_no = $data->torihikisaki;
               $sakusei_ymd = $data->hakobi;
               $kaiage_togetu = intval($kaiage_togetu) + intval($data->kingaku);
        $rowCount++;
        }
    }

	print("<div style=\"position:absolute; left:20px; top:300px\" id=\"dataTable\">\n");
		print("<table border=\"1\" style=\"border-spacing:0px\">\n");
		print("<tr style=\"background-color: #B0B0FF\"><td><span style=\"font: 10pt/10pt 'MS PGothic'\">受注NO</span></td>\n");
		print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">品名・規格</span></td>\n");
		print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">数量</span></td>\n");
		print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">単位</span></td>\n");
		print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">単価</span></td>\n");
		print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">金額</span></td>\n");
		$aa=$_SESSION['kensaku'];
		if (($aa == '有') or ($aa == '追')) {
		    print("<td colspan=\"3\"><span style=\"font: 10pt/10pt 'MS PGothic'\">備考</span></td>\n");
		} else {
		    print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">備考</span></td>\n");
		}
		$ken=$_SESSION['kensaku'];
		///////////////////change 
		print("<td><span style=\"font: 10pt/10pt 'MS PGothic'\">操作</span></td>\n");
		///////////////////change
		
	if (($ken == '有') or ($ken == '無')) {
		$denpyo_no=$_SESSION['kensaku_no'];
		$denpyo_kubun=$_SESSION['kensaku_kubun'];
		$sql = "select * from seikyu where (denpyo_no='$denpyo_no') and (denpyo_kubun='$denpyo_kubun')";
		$result = pg_exec($con,$sql);
		$resultNumRow = pg_numrows($result);
		if ($resultNumRow > 0) {
			$rowCount=0;
			$kaiage_togetu= 0;

			while ($rowCount < $resultNumRow) {
				$data = pg_fetch_object($result,$rowCount);
				$juchu_no = $data->juchu_no;
				$renban = $data->renban;
				$shohin_mei = $data->shohin_mei;
				$sakusei_ymd = $data->hakobi;
				$suryo = $data->suryo;
				$tani = $data->tani;
				$tanka = $data->tanka;
				$kingaku = $data->kingaku;
				$biko = $data->biko;

				//格納処理
				$juchu_no = htmlspecialchars($juchu_no, ENT_QUOTES, "UTF-8");
				$shohin_mei = htmlspecialchars($shohin_mei, ENT_QUOTES, "UTF-8");
				$suryo = htmlspecialchars($suryo, ENT_QUOTES, "UTF-8");
				$tani = htmlspecialchars($tani, ENT_QUOTES, "UTF-8");
				$tanka = htmlspecialchars($tanka, ENT_QUOTES, "UTF-8");
				$kingaku = htmlspecialchars($kingaku, ENT_QUOTES, "UTF-8");
				$biko = htmlspecialchars($biko, ENT_QUOTES, "UTF-8");

				print("<form action=\"seikyu1.php\" method=\"POST\">\n");
				print("<tr><td>\n");
				print("<input type=\"text\" name=\"juchu_no\" value=\"$juchu_no\" style=\"width: 50px; height: 19px\">\n");
				print("</td>\n");
				print("<td>\n");
				print("<input type=\"text\" name=\"shohin_mei\" value=\"$shohin_mei\" style=\"width: 375px; height: 19px\">\n");/*170-200*/
				print("</td>\n");
				print("<td>\n");
				print("<input type=\"text\" name=\"suryo\" value=\"$suryo\" style=\"text-align: center ;width: 53px; height: 19px\">\n");
				print("</td>\n");
				print("<td>\n");
				print("<input type=\"text\" name=\"tani\" value=\"$tani\" style=\"text-align: center;width: 55px; height: 19px\">\n");
				print("</td>\n");
				print("<td>\n");
				print("<input type=\"text\" name=\"tanka\" value=\"$tanka\" style=\"text-align: center;width: 55px; height: 19px\">\n");
				print("</td>\n");
				print("<td>\n");
				print("<input type=\"text\" name=\"kingaku\" value=\"$kingaku\" style=\"text-align: right;width: 77px; height: 19px\">\n");/*67-77*/
				print("</td>\n");
				print("<td>\n");
				print("<input type=\"text\" name=\"biko\" value=\"$biko\" style=\"width: 160px; height: 19px\">\n");/*110-160*/
				print("</td>\n");
				///////////////////////////////////////change
				// print("<td>\n");
				// print("<div class=\"input\" style=\"width: 125px;height: 19px;display: flex;justify-content: space-between;align-items: center;border-width: 1px;border-color: rgb(188 181 181);border-style: inset;border-radius: 2px;padding: 1px;\">");
				// print("<button type=\"button\" onclick=\"deleteRow($rowCount)\" style=\"box-shadow: 0 30px 40px rgba(0,0,0,0);border-width: 1.3px;border-color: #665daf;background: #000099;color: white;font-family: HGS創英角ﾎﾟｯﾌﾟ体;margin-left: 2px;\">削除</button>");
				// print("<div style=\"display: flex;align-items: center;\">");
				// print("<button type=\"button\" onclick=\"up($rowCount)\" style=\"box-shadow: 0 30px 40px rgba(0,0,0,0);border-width: 1.3px;border-color: #665daf;background: #000099;color: white;font-family: HGS創英角ﾎﾟｯﾌﾟ体;margin-right: 3px;\">↑</button>");
				// print("<button type=\"button\" onclick=\"down($rowCount)\" style=\"box-shadow: 0 30px 40px rgba(0,0,0,0);border-width: 1.3px;border-color: #665daf;background: #000099;color: white;font-family: HGS創英角ﾎﾟｯﾌﾟ体\">↓</button>");	
				// print("</td>\n");
				///////////////////////////////////////change
				$gokei = intval($gokei) + intval($kingaku);
				print("</form>\n");
				$rowCount++;
			}
		}
	} else {
		$sql = "select * from seikyu where denpyo_no='$denpyo_no' order by juchu_no asc";
		$result = pg_exec($con,$sql);
		$resultNumRow = pg_numrows($result);
		if ($resultNumRow > 0) {
			$rowCount=0;
			$kaiage_togetu= 0;
			while ($rowCount < $resultNumRow) {

				$data = pg_fetch_object($result,$rowCount);
				$juchu_no = $data->juchu_no;
				$renban = $data->renban;
				$shohin_mei = $data->shohin_mei;
				$sakusei_ymd = $data->hakobi;
				$suryo = $data->suryo;
				$tani = $data->tani;
				$tanka = $data->tanka;
				$kingaku = $data->kingaku;
				$biko = $data->biko;

				$juchu_no = htmlspecialchars($juchu_no, ENT_QUOTES, "UTF-8");
				$shohin_mei = htmlspecialchars($shohin_mei, ENT_QUOTES, "UTF-8");
				$suryo = htmlspecialchars($suryo, ENT_QUOTES, "UTF-8");
				$tani = htmlspecialchars($tani, ENT_QUOTES, "UTF-8");
				$tanka = htmlspecialchars($tanka, ENT_QUOTES, "UTF-8");
				$kingaku = htmlspecialchars($kingaku, ENT_QUOTES, "UTF-8");
				$biko = htmlspecialchars($biko, ENT_QUOTES, "UTF-8");
				$denpyo_kubun = htmlspecialchars($denpyo_kubun, ENT_QUOTES, "UTF-8");
				$denpyo_no = htmlspecialchars($denpyo_no, ENT_QUOTES, "UTF-8");
				print("<form action=\"seikyu1.php\" method=\"POST\">\n");
				print("<tr><td>\n");
				print("<input type=\"text\" name=\"juchu_no\" value=\"$juchu_no\" style=\"width: 50px; height: 19px\">\n");/*50-60*/
				print("</td>\n");
				print("<td>\n");
				print("<input type=\"text\" name=\"shohin_mei\" value=\"$shohin_mei\" style=\"width: 375px; height: 19px\">\n");
				print("</td>\n");
				print("<td>\n");
				print("<input type=\"text\" name=\"suryo\" value=\"$suryo\" style=\"text-align: center ;width: 53px; height: 19px\">\n");
				print("</td>\n");
				print("<td>\n");
				print("<input type=\"text\" name=\"tani\" value=\"$tani\" style=\"text-align: center;width: 55px; height: 19px\">\n");
				print("</td>\n");
				print("<td>\n");
				print("<input type=\"text\" name=\"tanka\" value=\"$tanka\" style=\"text-align: center;width: 55px; height: 19px\">\n");
				print("</td>\n");
				print("<td>\n");
				print("<input type=\"text\" name=\"kingaku\" value=\"$kingaku\" style=\"text-align: right;width: 77px; height: 19px\">\n");
				print("</td>\n");
				print("<td>\n");
				print("<input type=\"text\" name=\"biko\" value=\"$biko\" style=\"width: 160px; height: 19px\">\n");
				print("</td>\n");
				///////////////////////////////////////change
				// print("<td>\n");
				// print("<div class=\"input\" style=\"width: 125px;height: 19px;display: flex;justify-content: space-between;align-items: center;border-width: 1px;border-color: rgb(188 181 181);border-style: inset;border-radius: 2px;padding: 1px;\">");
				// print("<button type=\"button\" onclick=\"deleteRow(0)\" style=\"box-shadow: 0 30px 40px rgba(0,0,0,0);border-width: 1.3px;border-color: #665daf;background: #000099;color: white;font-family: HGS創英角ﾎﾟｯﾌﾟ体;margin-left: 2px;\">削除</button>");
				// print("<div style=\"display: flex;align-items: center;\">");
				// print("<button type=\"button\" style=\"box-shadow: 0 30px 40px rgba(0,0,0,0);border-width: 1.3px;border-color: #665daf;background: #000099;color: white;font-family: HGS創英角ﾎﾟｯﾌﾟ体;margin-right: 3px;\">↑</button>");
				// print("<button type=\"button\" onclick=\"down(0)\" style=\"box-shadow: 0 30px 40px rgba(0,0,0,0);border-width: 1.3px;border-color: #665daf;background: #000099;color: white;font-family: HGS創英角ﾎﾟｯﾌﾟ体\">↓</button>");	
				// print("</td>\n");

				// print("<td>\n");
				// print("<div class=\"input\" style=\"width: 125px;height: 19px;display: flex;justify-content: space-between;align-items: center;border-width: 1px;border-color: rgb(188 181 181);border-style: inset;border-radius: 2px;padding: 1px;\">");
				// print("<button type=\"button\" onclick=\"deleteRow($rowCount)\" style=\"box-shadow: 0 30px 40px rgba(0,0,0,0);border-width: 1.3px;border-color: #665daf;background: #000099;color: white;font-family: HGS創英角ﾎﾟｯﾌﾟ体;margin-left: 2px;\">削除</button>");
				// print("<div style=\"display: flex;align-items: center;\">");
				// print("<button type=\"button\" onclick=\"up($rowCount)\" style=\"box-shadow: 0 30px 40px rgba(0,0,0,0);border-width: 1.3px;border-color: #665daf;background: #000099;color: white;font-family: HGS創英角ﾎﾟｯﾌﾟ体;margin-right: 3px;\">↑</button>");
				// print("<button type=\"button\" onclick=\"down($rowCount)\" style=\"box-shadow: 0 30px 40px rgba(0,0,0,0);border-width: 1.3px;border-color: #665daf;background: #000099;color: white;font-family: HGS創英角ﾎﾟｯﾌﾟ体\">↓</button>");	
				// print("</td>\n");
				///////////////////////////////////////change
				$aa=$_SESSION['kensaku'];
				if (($aa == '有') or ($aa == '追')) {
					print("<td><input type=\"submit\" name=\"check_item\" value=\"追加\"></td>");
					print("<input type=\"hidden\" name=\"denpyo_kubun\" value=\"$denpyo_kubun\">\n");
					print("<input type=\"hidden\" name=\"denpyo_no\" value=\"$denpyo_no\">\n");
					print("<input type=\"hidden\" name=\"juchu_no\" value=\"$juchu_no\">\n");
				}
				$gokei = intval($gokei) + intval($kingaku);
				print("</form>\n");
				$rowCount++;
			}
		}
	}

	if ($rowCount < 4) {
		$gyo= 3 - $rowCount;
		$end_no =0;
		while ($gyo >= $end_no) {
		$a11 = htmlspecialchars($a11, ENT_QUOTES, "UTF-8");
		$a22 = htmlspecialchars($a22, ENT_QUOTES, "UTF-8");
		$a33 = htmlspecialchars($a33, ENT_QUOTES, "UTF-8");
		$a44 = htmlspecialchars($a44, ENT_QUOTES, "UTF-8");
		$a55 = htmlspecialchars($a55, ENT_QUOTES, "UTF-8");
		$a66 = htmlspecialchars($a66, ENT_QUOTES, "UTF-8");
		$a77 = htmlspecialchars($a77, ENT_QUOTES, "UTF-8");
		print("<tr><td>\n");
		print("<input type=\"text\" name=\"a11\" value=\"$a11\" style=\"width: 50px; height: 19px\">\n");
		print("</td>\n");
		print("<td>\n");
		print("<input type=\"text\" name=\"a22\" value=\"$a22\" style=\"width: 375px; height: 19px\">\n");
		print("</td>\n");
		print("<td>\n");
		print("<input type=\"text\" name=\"a33\" value=\"$a33\" style=\"text-align: center ;width: 53px; height: 19px\">\n");
		print("</td>\n");
		print("<td>\n");
		print("<input type=\"text\" name=\"a44\" value=\"$a44\" style=\"text-align: center;width: 55px; height: 19px\">\n");
		print("</td>\n");
		print("<td>\n");
		print("<input type=\"text\" name=\"a55\" value=\"$a55\" style=\"text-align: center;width: 55px; height: 19px\">\n");
		print("</td>\n");
		print("<td>\n");
		print("<input type=\"text\" name=\"a66\" value=\"$a66\" style=\"text-align: right;width: 77px; height: 19px\">\n");
		print("</td>\n");
		print("<td>\n");
		print("<input type=\"text\" name=\"a77\" value=\"$a77\" style=\"width: 160px; height: 19px\">\n");
		print("</td>\n");
		///////////////////////////////////////change
		print("<td>\n");
		print("<div class=\"input\" style=\"width: 125px;height: 19px;display: flex;justify-content: space-between;align-items: center;border-width: 1px;border-color: rgb(188 181 181);border-style: inset;border-radius: 2px;padding: 1px;\">");
		print("<button type=\"button\" onclick=\"deleteRow($end_no)\" style=\"box-shadow: 0 30px 40px rgba(0,0,0,0);border-width: 1.3px;border-color: #665daf;background: #000099;color: white;font-family: HGS創英角ﾎﾟｯﾌﾟ体;margin-left: 2px;\">削除</button>");
		print("<div style=\"display: flex;align-items: center;\">");
		print("<button type=\"button\" onclick=\"up($end_no)\" style=\"box-shadow: 0 30px 40px rgba(0,0,0,0);border-width: 1.3px;border-color: #665daf;background: #000099;color: white;font-family: HGS創英角ﾎﾟｯﾌﾟ体;margin-right: 3px;\">↑</button>");
		print("<button type=\"button\" onclick=\"down($end_no)\" style=\"box-shadow: 0 30px 40px rgba(0,0,0,0);border-width: 1.3px;border-color: #665daf;background: #000099;color: white;font-family: HGS創英角ﾎﾟｯﾌﾟ体\">↓</button>");	
		print("</td>\n");
		///////////////////////////////////////change
		$end_no++;
		}
	}

	switch ($denpyo_kubun) {
		case 3:
			$gokei = "";
			break;
		case 4:
			$gokei = "";
			break;
		default:
	}
	$tekiyo = htmlspecialchars($tekiyo, ENT_QUOTES, "UTF-8");
	$gokei = htmlspecialchars($gokei, ENT_QUOTES, "UTF-8");
	$denpyo_no = htmlspecialchars($denpyo_no, ENT_QUOTES, "UTF-8");
	$hinshu_teisei = htmlspecialchars($hinshu_teisei, ENT_QUOTES, "UTF-8");

	print("<form action=\"seikyu1.php\" method=\"POST\">\n");
	print("<tr style=\"background-color: #B0B0FF\"><td><span style=\"font: 10pt/10pt 'MS PGothic'\">摘要</span></td>\n");
	print("<td>\n");
	print("<input type=\"text\" name=\"tekiyo\" value=\"$tekiyo\" style=\"width: 200px; height: 19px\">\n");
	print("</td>\n");
	print("<td style=\"background-color: #B0B0FF; text-align: right\" colspan=\"3\"><span style=\"font: 10pt/10pt 'MS PGothic'\">合計</span></td>\n");
	$aa=$_SESSION['kensaku'];
	if (($aa == '有') or ($aa == '追')) {
		print("<td colspan=\"4\">\n");
	} else {
		print("<td>\n");
	}

	print("<input type=\"text\" id=\"gokei\" name=\"gokei\" value=\"$gokei\"style=\"text-align: right;width: 77px; height: 19px\">\n");
	print("</td>\n");
	print("<td></td>\n");
	print("<td></td>\n");
	print("</table>\n");
	print("</form>\n");
	print("</div>\n");

	print("<div style=\"position:absolute; left:818px; top:468px\">\n");
		print("<form action=\"seikyu1.php\" method=\"POST\">\n");
		print("<input type=\"image\" src=\"gazo/sinki.gif\">\n");
		print("<input type=\"hidden\" name=\"check_item\" value=\"新規\">\n");
		print("<input type=\"hidden\" name=\"denpyo_no\" value=\"$denpyo_no\">\n");
		print("</form>\n");
	print("</div>\n");

	print("<div style=\"position:absolute; left:885px; top:468px\">\n");
		print("<form action=\"seikyu1.php\" method=\"POST\">\n");
		print("<input onclick=\"saveData()\" type=\"image\" src=\"gazo/clear.gif\"/>\n");
		////////////////////////////////////// change 
		print("<input type=\"hidden\" name=\"check_item\" value=\"登録\">\n");
		////////////////////////////////////// change 
		print("</form>\n");
	print("</div>\n");

	print("<div style=\"position:absolute; left:952px; top:468px\">\n");
		print("<form action=\"seikyu1.php\" method=\"POST\">\n");
		print("<input type=\"image\" src=\"gazo/chusi.gif\">\n");
		print("<input type=\"hidden\" name=\"check_item\" value=\"中止\">\n");
		print("</form>\n");
	print("</div>\n");

	print("<div style=\"position:absolute; left:818px; top:505px\">\n");
		print("<form action=\"seikyu1.php\" method=\"POST\">\n");
		print("<table border=\"0\">\n");
		print("<tr>\n");
		print("<td><input type=\"text\" name=\"hinshu_teisei\" value=\"$hinshu_teisei\"style=\"width:33px; height:19px\"></td>\n");
		print("<td><input type=\"image\" src=\"gazo/hinshu.gif\"></td>\n");
		print("</table>\n");
		print("<input type=\"hidden\" name=\"check_item\" value=\"品種\">\n");
		print("</form>\n");
	print("</div>\n");
}

/********************
* 表示処理
*********************/
function hyoji_shori() {
	setuzoku();
	global $con;

	//基本情報を取得
	$denpyo_no=$_SESSION['denpyo_no']; //最初(default時)に情報を持つ
	$hakobi=$_SESSION['hakobi'];
	$torihikisaki_no=$_SESSION['torihikisaki_no'];
	$denpyo_kubun=$_SESSION['denpyo_kubun'];
	$juchu_no=$_SESSION['juchu_no'];

	print("<div style=\"position:absolute; left:800px; top:200px\">\n");
	print("</div>\n");

	$sql = "select * from stock where juchu_no = '$juchu_no'";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow > 0) {
		$rowCount=0;
		$data = pg_fetch_object($result,$rowCount);
		$shurui=$data->shurui;
		$_SESSION['shurui']=$shurui;

		print("<div style=\"position:absolute; left:800px; top:400px\">\n");
		print("</div>\n");

		switch ($shurui) {
			case 0:  //一般
				$sql2 = "select * from juchu_top where bango = '$juchu_no'";
				$result2 = pg_exec($con,$sql2);
				$resultNumRow2 = pg_numrows($result2);
				if ($resultNumRow2 > 0) {
					$rowCount2=0;
					$data2 = pg_fetch_object($result2,$rowCount2);
					$suryo=$data2->suryo;
					$kingaku=$data2->uriage_kin;
					$tanka=$data2->tanka;
					$tani=$data2->tani;
					$tanto=$data2->tanto;
					$shohin_code=$data2->shohin_code;
					$shohin_mei=$data2->shohin_mei;
					$torihikisaki_stok=$data2->torihikisaki;
					$hinshu=$data2->hinshu; //2009.03追加
					$_SESSION['hinsha_ig']='i';

					print("<div style=\"position:absolute; left:800px; top:550px\">\n");
					print("</div>\n");
					$_SESSION['rot_no']="";
				}
				break;
			case 1:  //グラビヤ
				$sql3 = "select * from grabiya_top where bango = '$juchu_no'";
				$result3 = pg_exec($con,$sql3);
				$resultNumRow3 = pg_numrows($result3);
				if ($resultNumRow3 > 0) {
					$rowCount3=0;
					$data3 = pg_fetch_object($result3,$rowCount3);
					$suryo=$data3->suryo;
					$kingaku=$data3->uriage_kingaku;
					$tanka=$data3->tanka;
					$tani=$data3->suryo_tani;
					$tanto=$data3->tanto;
					$shohin_code=$data3->shohin_code;
					$shohin_mei=$data3->shohin_mei;
					$torihikisaki_stok=$data3->torihikisaki;
					$hinshu=$data3->hinshu;  //2009.03追加
					$_SESSION['hinsha_ig']='g';

					print("<div style=\"position:absolute; left:800px; top:550px\">\n");
					print("</div>\n");
					$rot_no=$data3->rot_no;
					$_SESSION['rot_no']=$rot_no;

				}
				break;
			default:
		}

		$_SESSION['suryo']=$suryo;
		$_SESSION['juchu_suryo']=$suryo;
		$_SESSION['kingaku']=$kingaku;
		$_SESSION['tanka']=$tanka;
		$_SESSION['tani']=$tani;
		$_SESSION['tanto_mei']=$tanto;
		$_SESSION['shohin_code']=$shohin_code;
		$_SESSION['shohin_mei']=$shohin_mei;
		$_SESSION['torihikisaki_stok']=$torihikisaki_stok;
		$_SESSION['hinshu']=$hinshu;  //2009.03追加

		if (!empty($shohin_code)) {
			shohin($shohin_code);   //商品情報を取得
		}
		shain($tanto);  //社員情報を取得
		torihikisaki();  //取引先情報を取得 torihikisaki_mei,zipcode,jusho1,jusho2

	}  //stock-ifのend

	//数量チェック
	$iko_shori=$_SESSION['iko_shori'];
	if ($iko_shori != '2') {        //移行ボタンが押されてなかったら処理する
		$sql = "select * from azukari where (juchu_no = '$juchu_no') and (torihikisaki_no = '$torihikisaki_no') and (denpyo_kubun = '$denpyo_kubun')";
		$result = pg_exec($con,$sql);
		$resultNumRow = pg_numrows($result);
		if ($resultNumRow > 0) {
			$rowCount=0;
			$data = pg_fetch_object($result,$rowCount);
			$kagensan=$data->kagensan;
			$zaikosu=$data->zaikosu;
		}
		if (!empty($zaikosu)) {
			$suryo_s=$zaikosu;
			$_SESSION['suryo']=$suryo_s;
		} elseif (!empty($kagensan)) {
			$suryo_s=$zaikosu;
			$_SESSION['suryo']=$suryo_s;
		} else {
			$suryo_s=$suryo;
		}

		$_SESSION['suryo_s']=$suryo_s;
	} else {
		$suryo_s=$suryo;
		$_SESSION['suryo_s']=$suryo_s;
		$_SESSION['iko_shori']='1';  //移行処理条件をクリア
	}
	print("<div style=\"position:absolute; left:431px; top:190px\">\n");
	$sql = "select * from seikyu where juchu_no='$juchu_no'";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow > 0) {
		$rowCount=0;
		$suryo_count= 0;
		while ($rowCount < $resultNumRow) {
			$data = pg_fetch_object($result,$rowCount);
			$suryo = $data->suryo;
			$suryo_count = intval($suryo_count) + intval($suryo);
			$rowCount++;
		}
	}
	$suryo_juchu=$_SESSION['juchu_suryo'];
	$suryo_ima=intval($suryo_juchu) - intval($suryo_count);
	$suryo_ima = htmlspecialchars($suryo_ima, ENT_QUOTES, "UTF-8");
	print("<span style=\"font: 9pt/10pt 'MS PGothic'; color: #ff0000\">在庫残数</span> <span style=\"font: 10pt/10pt 'MS PGothic'; color: #000000\">$suryo_ima</span><br>\n");

//print("juchu_no=$juchu_no<br>\n");
//print("suryo_juchu=$suryo_juchu<br>\n");
//print("suryo_count=$suryo_count<br>\n");

	print("</div>\n");

	if (empty($kingaku)) {
		$kingaku=doubleval($suryo) * doubleval($tanka);
	}
	$_SESSION['kingaku']=$kingaku;

	if (!empty($juchu_no) and ($torihikisaki_no != $torihikisaki_stok)) {
		$gg=$juchu_no;
		$gg = htmlspecialchars($gg, ENT_QUOTES, "UTF-8");
		$torihikisaki_no = htmlspecialchars($torihikisaki_no, ENT_QUOTES, "UTF-8");
		print("<div style=\"position:absolute; left:385px; top:210px\">\n");
		         print("<span style=\"font: 9pt/10pt 'MS PGothic'; color: #ff8000\">受注番号と(</span>".
		               "<span style=\"font: 11pt/10pt 'MS PGothic'; color: #000000\"> $gg </span>".
		               "<span style=\"font: 9pt/10pt 'MS PGothic'; color: #ff8000\">) <br> 取引先番号(</span>".
		               "<span style=\"font: 11pt/10pt 'MS PGothic'; color: #000000\"> $torihikisaki_no </span>".
		               "<span style=\"font: 9pt/10pt 'MS PGothic'; color: #ff8000\"> )がアンマッチです</span><br>\n");
		print("</div>\n");
	}

}
/********************
* 検索表示処理
*********************/
function kensaku() {
	setuzoku();
	global $con;

	//基本情報を取得
	$torihikisaki_no=$_SESSION['torihikisaki_no'];
	$denpyo_kubun=$_SESSION['denpyo_kubun'];
	$denpyo_no=$_SESSION['kensaku_no'];
	$juchu_no=$_SESSION['juchu_no'];

	//ここで以下の3つの情報が変わる
	$aa=$denpyo_no;
	$denpyo_no=str_pad($aa, 8, "0",STR_PAD_LEFT);
	$_SESSION['denpyo_no']=$denpyo_no;
	$_SESSION['kensaku_no']=$denpyo_no;
	$kensaku_no=$_SESSION['kensaku_no'];

	$denpyo_kubun=$_SESSION['kensaku_kubun'];
	$denpyo_no=$_SESSION['kensaku_no'];

	$sql = "select * from seikyu where (denpyo_no='$denpyo_no') and (denpyo_kubun='$denpyo_kubun')";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow > 0) {
		$rowCount=0;
		$data = pg_fetch_object($result,$rowCount);
		$hakobi = $data->hakobi;
		$tanto_mei = $data->tanto_mei;
		$uriage_ymd = $data->uriage_ymd;
		$denpyo_kubun = $data->denpyo_kubun;
		$zipcode = $data->zipcode;
		$jusho1 = $data->jusho1;
		$jusho2 = $data->jusho2;
		$torihikisaki_mei = $data->torihikisaki_mei;
		$torihikisaki_no = $data->torihikisaki_no;
		$juchu_no = $data->juchu_no;
		$seikyu_sime = $data->seikyu_sime;
		$seikyu_ym = $data->seikyu_ym;

		$_SESSION['torihikisaki_no']=$torihikisaki_no;
		$_SESSION['torihikisaki_mei']=$torihikisaki_mei;
		$_SESSION['zipcode']=$zipcode;
		$_SESSION['jusho1']=$jusho1;
		$_SESSION['jusho2']=$jusho2;
		$_SESSION['hakobi']=$hakobi;
		$_SESSION['uriage_ymd']=$uriage_ymd;
		$_SESSION['tanto_mei']=$tanto_mei;
		$_SESSION['seikyu_sime']=$seikyu_sime;
		$_SESSION['seikyu_ym']=$seikyu_ym;
	} else {
    }
}

/********************
* 更新処理
*********************/
// function kosin() {
// 	setuzoku();
// 	global $con;

// 	$denpyo_no=$_SESSION['denpyo_no'];
// 	$denpyo_no2=$_SESSION['denpyo_no2'];
// 	$denpyo_kubun=$_SESSION['denpyo_kubun'];
// 	$hakobi=$_SESSION['hakobi'];
// 	$juchu_no=$_SESSION['juchu_no'];
// 	$torihikisaki_no=$_SESSION['torihikisaki_no'];
// 	$torihikisaki_mei=$_SESSION['torihikisaki_mei'];
// 	$zipcode=$_SESSION['zipcode'];
// 	$jusho1=$_SESSION['jusho1'];
// 	$jusho2=$_SESSION['jusho2'];
// 	$shohin_code=$_SESSION['shohin_code'];
// 	$shohin_mei=$_SESSION['shohin_mei'];
// 	$kagensan=$_SESSION['kagensan'];
// 	$suryo=$_SESSION['suryo'];
// 	$tani=$_SESSION['tani'];
// 	$tanka=$_SESSION['tanka'];
// 	$kingaku=$_SESSION['kingaku'];
// 	$tanto_mei=$_SESSION['tanto_mei'];
// 	$biko=$_SESSION['biko'];
// 	$kanmi=$_SESSION['kanmi'];
// 	$renban=$_SESSION['renban'];

// 	//一般の処理

// 	//金額の確定
// 	$kingaku_kosin=$_SESSION['kingaku_kosin'];  //更新情報の欄の金額
// 	$suryo=$_SESSION['suryo'];
// 	$tanka=$_SESSION['tanka'];
// 	$kingaku=$_SESSION['kingaku'];  //受注情報からの金額
// 	$tani=$_SESSION['tani'];
// 	if (!empty($suryo) and !empty($tanka)) { //数量、単価があれば再計算
// 		$kingaku=doubleval($suryo) * doubleval($tanka);
// 		$_SESSION['kingaku']=$kingaku;  //数量＊単価からの金額
// 	}
// 	if ($kingaku != $kingaku_kosin) {  //受注情報からの金額vs更新情報の欄の金額が等しくないなら
// 		if (empty($suryo) or empty($tanka)) {  //数量、単価のどちらかが空欄なら
// 			$kingaku = $kingaku_kosin;  //更新情報の欄の金額の金額を売上金額とする 
// 		}                               //さもなければ数量＊単価からの金額を売上金額とする
// 	}
// 	/*******************
// 	 seikyu-table 作成
// 	********************/

// 	switch ($denpyo_kubun) {
// 		case 2://預り売上
// 			azukari_zaiko();
// 			break;
// 		case 3://預り出荷
// 			$kingaku="";
// 			$tanka="";
// 			azukari_zaiko();
// 			break;
// 		case 4://仮売
// 			$tanka="";
// 			$kingaku="";
// 			$_SESSION['uriage_shori']='04';
// 			break;
// 		case 1://売上
// 			uriage_zaiko();
// 			break;
// 		case 5://赤伝
// 			$suryo=$_SESSION['suryo'];
// 			$tanka=$_SESSION['tanka'];
// 			$tani=$_SESSION['tani'];
// 			$kingaku=-doubleval($kingaku);  //金額はマイナス表示
// 			if ($kingaku == -0){
// 				$kingaku=0;
// 			}
// 			$suryo=-doubleval($suryo);  //数量もマイナス表示
// 			if ($suryo == -0){
// 				$suryo=0;
// 			}
// 		default:
// 		}

// 	sime();
// 	$seikyu_ym=$_SESSION['seikyu_ym'];
// 	$seikyu_sime=$_SESSION['seikyu_sime'];

// 	$y=date('Y');
// 	$m=date('m');
// 	$d=date('d');
// 	$a=".";
// 	$uriage_ymd=$y.$a.$m.$a.$d;

// 	print("<div style=\"position:absolute; left:1000px; top:800px\">\n");
// 	print("</div>\n");

// 	$aa=strrpos($kingaku, ".");
// 	if ($aa != false) {
// 		$kingaku = intval($kingaku);
// 	} else {
// 		$kingaku =$kingaku;
// 	}
// 	$sql = "select * from seikyu where (juchu_no='$juchu_no') and (denpyo_no='$denpyo_no') and (denpyo_kubun='$denpyo_kubun')";
// 	$result = pg_exec($con,$sql);
// 	$resultNumRow = pg_numrows($result);
// 	if (($resultNumRow == 0) or ($kanmi = '未')) {
// 		renban();
// 		$renban=$_SESSION['renban'];
// 		$sql2 = "insert into seikyu values('$denpyo_no','$renban','$juchu_no','$torihikisaki_no','$zipcode','$jusho1',".
// 		                            "'$jusho2','$shohin_code','$shohin_mei','$denpyo_kubun','$suryo','$tanka','$tani','$kingaku',".
// 		                            "'$hakobi','$tanto_mei','$biko','$seikyu_sime','$seikyu_ym','$tekiyo','$uriage_ymd','$tax_kubun','$kingaku_in','$torihikisaki_mei')";
// 		$result2 = pg_exec($con,$sql2);
// 		if ($result2 == FALSE  ) {
// 			print("新規処理失敗する。");
// 			exit;
// 		} else {
// 			keka();
// 			renban();
// 		}
// 	}

// 	/*******************
// 	 stock-table 更新
// 	********************/
// 	zaiko_kosin();
// }

/////////////////////// change //////////////////////////////////////////
/********************
* 登録処理
*********************/
function toroku() {

	if(isset($_COOKIE["savedData"])) {
		echo("<script>console.log('PHP: " . urldecode($_COOKIE["savedData"]) . "');</script>");
		$savedData = json_decode(urldecode($_COOKIE["savedData"]));
		unset($_COOKIE["savedData"]); 
		setcookie("savedData", FALSE, -1, '/', $_SERVER["HTTP_HOST"]); 
		// setcookie("savedData", "", time()-3600);
	} else {
		echo '<script> console.log("savedData is null"); </script>';
		$savedData = [];
	}
	echo("<script>console.log('PHP: " . gettype($savedData) . "');</script>");

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	setuzoku();
	global $con;

	$denpyo_no=$_SESSION['denpyo_no'];
	$denpyo_no2=$_SESSION['denpyo_no2'];
	$denpyo_kubun=$_SESSION['denpyo_kubun'];
	$hakobi=$_SESSION['hakobi'];
	$juchu_no=$_SESSION['juchu_no'];
	$torihikisaki_no=$_SESSION['torihikisaki_no'];
	$torihikisaki_mei=$_SESSION['torihikisaki_mei'];
	$zipcode=$_SESSION['zipcode'];
	$jusho1=$_SESSION['jusho1'];
	$jusho2=$_SESSION['jusho2'];
	$shohin_code=$_SESSION['shohin_code'];
	$shohin_mei=$_SESSION['shohin_mei'];
	$kagensan=$_SESSION['kagensan'];
	$suryo=$_SESSION['suryo'];
	$tani=$_SESSION['tani'];
	$tanka=$_SESSION['tanka'];
	$kingaku=$_SESSION['kingaku'];
	$tanto_mei=$_SESSION['tanto_mei'];
	$biko=$_SESSION['biko'];
	$kanmi=$_SESSION['kanmi'];
	$renban=$_SESSION['renban'];

	//一般の処理

	//金額の確定
	$kingaku_kosin=$_SESSION['kingaku_kosin'];  //更新情報の欄の金額
	$suryo=$_SESSION['suryo'];
	$tanka=$_SESSION['tanka'];
	$kingaku=$_SESSION['kingaku'];  //受注情報からの金額
	$tani=$_SESSION['tani'];
	if (!empty($suryo) and !empty($tanka)) { //数量、単価があれば再計算
		$kingaku=doubleval($suryo) * doubleval($tanka);
		$_SESSION['kingaku']=$kingaku;  //数量＊単価からの金額
	}
	if ($kingaku != $kingaku_kosin) {  //受注情報からの金額vs更新情報の欄の金額が等しくないなら
		if (empty($suryo) or empty($tanka)) {  //数量、単価のどちらかが空欄なら
			$kingaku = $kingaku_kosin;  //更新情報の欄の金額の金額を売上金額とする 
		}                               //さもなければ数量＊単価からの金額を売上金額とする
	}
	/*******************
	 seikyu-table 作成
	********************/

	switch ($denpyo_kubun) {
		case 2://預り売上
			azukari_zaiko();
			break;
		case 3://預り出荷
			azukari_zaiko();
			break;
		case 4://仮売
			$_SESSION['uriage_shori']='04';
			break;
		case 1://売上
			uriage_zaiko();
			break;
		case 5://赤伝
			break;
		default:
		}

	sime();
	$seikyu_ym=$_SESSION['seikyu_ym'];
	$seikyu_sime=$_SESSION['seikyu_sime'];

	$y=date('Y');
	$m=date('m');
	$d=date('d');
	$a=".";
	$uriage_ymd=$y.$a.$m.$a.$d;

	print("<div style=\"position:absolute; left:1000px; top:800px\">\n");
	print("</div>\n");

	$aa=strrpos($kingaku, ".");
	if ($aa != false) {
		$kingaku = intval($kingaku);
	} else {
		$kingaku =$kingaku;
	}

	$testSql = "delete from seikyu where (denpyo_no='$denpyo_no')";
	$testResult = pg_exec($con,$testSql);
	$resultTestNumRow = pg_numrows($testResult);
	foreach($savedData as $data) {
		$juchu_no = $data[0];
		$shohin_mei = $data[1];
		$suryo = $data[2];
		$tani = $data[3];
		$tanka = $data[4];
		$kingaku = $data[5];
		$biko = $data[6];

		$sql = "select * from seikyu where (juchu_no='$juchu_no') and (denpyo_no='$denpyo_no') and (denpyo_kubun='$denpyo_kubun')";
		$result = pg_exec($con,$sql);
		$resultNumRow = pg_numrows($result);
		if (($resultNumRow == 0) or ($kanmi = '未')) {
			renban();
			$renban=$_SESSION['renban'];
			$sql2 = "insert into seikyu values('$denpyo_no','$renban','$juchu_no','$torihikisaki_no','$zipcode','$jusho1',".
										"'$jusho2','$shohin_code','$shohin_mei','$denpyo_kubun','$suryo','$tanka','$tani','$kingaku',".
										"'$hakobi','$tanto_mei','$biko','$seikyu_sime','$seikyu_ym','$tekiyo','$uriage_ymd','$tax_kubun','$kingaku_in','$torihikisaki_mei')";
			$result2 = pg_exec($con,$sql2);
			if ($result2 == FALSE  ) {
				print("新規処理失敗する。");
				exit;
			} else {
				keka();
				renban();
			}
		}
	}

	/*******************
	 stock-table 更新
	********************/
	// zaiko_kosin();
}

/************************
* 在庫更新処理(更新処理)
*************************/
function zaiko_kosin() {
	setuzoku();
	global $con;
	global $juchu_no;
	global $suryo;
	global $haso;
	global $denpyo_no;
	$aa=$_SESSION['denpyo_no'];

	$sql = "select * from seikyu where denpyo_no ='$aa'";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow > 0) {
		$rowCount=0;
		while ($rowCount < $resultNumRow) {
			$data = pg_fetch_object($result,$rowCount);
			$suryo=$data->suryo;
			$denpyo_kubun=$data->denpyo_kubun;
			$juchu_no=$data->juchu_no;

			switch ($denpyo_kubun) {
				case 1:  //売上
					$sql_aa = "select * from stock where juchu_no ='$juchu_no'";
					$result_aa = pg_exec($con,$sql_aa);
					$resultNumRow_aa = pg_numrows($result_aa);
					if ($resultNumRow_aa > 0) {
						$rowCount_aa=0;
						$data_aa = pg_fetch_object($result_aa,$rowCount_aa);
						$haso=$data_aa->haso;
					}
					$haso = intval($haso) + intval($suryo);
					$keta=mb_strlen($haso);
					if ($keta > 8) {
						$haso = intval($haso) - intval($suryo);
					}
					$sql_a = "update stock set haso='$haso', shori='$denpyo_kubun' where juchu_no ='$juchu_no'";
					$result_a = pg_exec($con,$sql_a);
					if ($result_a == FALSE) {
						print("更新に失敗した。");
					}
					break;
				case 2:  //預り売上
					$sql_aa = "select * from stock where juchu_no ='$juchu_no'";
					$result_aa = pg_exec($con,$sql_aa);
					$resultNumRow_aa = pg_numrows($result_aa);
					if ($resultNumRow_aa > 0) {
						$rowCount_aa=0;
						$data_aa = pg_fetch_object($result_aa,$rowCount_aa);
						$azukari=$data_aa->azukari;
					}
					$azukari = intval($azukari) + intval($suryo);
					$sql_a = "update stock set azukari='$azukari', shori='$denpyo_kubun' where juchu_no ='$juchu_no'";
					$result_a = pg_exec($con,$sql_a);
					if ($result_a == FALSE) {
						print("更新に失敗した。");
					}
					break;
				case 3:  //預り出荷
					$sql_aa = "select * from stock where juchu_no ='$juchu_no'";
					$result_aa = pg_exec($con,$sql_aa);
					$resultNumRow_aa = pg_numrows($result_aa);
					if ($resultNumRow_aa > 0) {
						$rowCount_aa=0;
						$data_aa = pg_fetch_object($result_aa,$rowCount_aa);
						$azukari=$data_aa->azukari;
					}
					$azukari = intval($azukari) + intval($suryo);
					$sql_a = "update stock set azukari='$azukari', shori='$denpyo_kubun' where juchu_no ='$juchu_no'";
					$result_a = pg_exec($con,$sql_a);
					if ($result_a == FALSE) {
						print("更新に失敗した。");
					}
					break;
				case 4:  //仮伝
					$sql_aa = "select * from stock where juchu_no ='$juchu_no'";
					$result_aa = pg_exec($con,$sql_aa);
					$resultNumRow_aa = pg_numrows($result_aa);
					if ($resultNumRow_aa > 0) {
						$rowCount_aa=0;
						$data_aa = pg_fetch_object($result_aa,$rowCount_aa);
						$haso=$data_aa->haso;
					}
					$haso = intval($haso) + intval($suryo);
					$sql_a = "update stock set haso='$haso', shori='$denpyo_kubun' where juchu_no ='$juchu_no'";
					$result_a = pg_exec($con,$sql_a);
					if ($result_a == FALSE) {
						print("更新に失敗した。");
					}
					break;
				default:
			}
			$rowCount++;
		}
	}
}
/************************
* 在庫更新処理(クリア処理)
*************************/
function zaiko_clear() {
	setuzoku();
	global $con;
	global $juchu_no;
	global $suryo;
	global $haso;

	$sql = "select * from stock where juchu_no ='$juchu_no'";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow > 0) {
		$rowCount=0;
		$data = pg_fetch_object($result,$rowCount);
		$seihin=$data->seihin;
		$azukari=$data->azukari;
		$haso=$data->haso;
	}

	//売上時の数量 $suryo
	$aa=$_SESSION['azukari'];
	$hh=$_SESSION['haso'];
	$haso = intval($haso) - $hh; 
	$azukari = intval($azukari) + $hh; 
	
	$sql = "update stock set azukari='$azukari', haso='$haso', shori='$shori' where juchu_no ='$juchu_no'";
print("sql=$sql<br>\n");
	$result = pg_exec($con,$sql);
	if ($result == FALSE) {
		print("更新に失敗した。");
	} else {
		$_SESSION['azukari']='0';
		$_SESSION['haso']='0';
	}
}

/********************
* 伝票番号のカウンター
*********************/
function denpyo_max() {
	setuzoku();
	global $con;

	$sql="select max(denpyo_no) from seikyu";
	$result=pg_exec($con,$sql);
	if ($result == FALSE) {
		print("MAX検索に失敗した。$sql<br>");
	}   
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow >0 ) {
		$data = pg_fetch_object($result, 0);
		$maxdata = $data->max;
		$maxdata = intval($maxdata);
		$maxdata = $maxdata + 1;
		$denpyo_no=str_pad($maxdata, 8, "0",STR_PAD_LEFT);
	}  //初期値は00000001　になる
	$_SESSION['denpyo_no']=$denpyo_no;
	$_SESSION['kensaku_no']=$denpyo_no;
}

/********************
* juchu_topに売上処理
*********************/
function keka() {
	setuzoku();
	global $con;
	global $juchu_no;

	$shurui=$_SESSION['shurui'];
	//売上に伴い結果として　１をたてる
	$kanmi=$_SESSION['kanmi'];
	if ($kanmi == '完') {
		$keka='1';
	} else {
		$keka="";
	}

	switch ($shurui) {
		case 0://一般
			$sql = "update juchu_top set keka='$keka' where bango ='$juchu_no'";
			$result = pg_exec($con,$sql);
			if ($result == FALSE) {
				print("更新に失敗した。");
			}
			break;
		case 1://グラビヤ
			$sql = "update grabiya_top set keka='$keka' where bango ='$juchu_no'";
			$result = pg_exec($con,$sql);
			if ($result == FALSE) {
				print("更新に失敗した。");
			}
			break;
		default:
	}

	//SESSIONクリア
	$_SESSION['kanmi']="";
}

/********************
* juchu_topに売上処理
*********************/
function keka_clear() {
	setuzoku();
	global $con;
	global $juchu_no;

	//クリア処理に伴い結果としてスペースをたてる
	$keka="";
	$shurui=$_SESSION['shurui'];
	switch ($shurui) {
		case 0://一般
			$sql = "update juchu_top set keka='$keka' where bango ='$juchu_no'";
			$result = pg_exec($con,$sql);
			if ($result == FALSE) {
				print("更新に失敗した。");
			}
			break;
		case 1://グラビヤ
			$sql = "update grabiya_top set keka='$keka' where bango ='$juchu_no'";
			$result = pg_exec($con,$sql);
			if ($result == FALSE) {
				print("更新に失敗した。");
			}
			break;
		default:
	}
}

/********************
* 今日の年月日を算出
*********************/
function ymd() {
	$y=date('Y');
	$m=date('m');
	$d=date('d');
	$a=".";
	$s_ymd=$y.$a.$m.$a.$d;
	$_SESSION['s_ymd']=$s_ymd;
}

/********************
* クリア処理
*********************/
function clear() {
	setuzoku();
	global $con;

	$denpyo_kubun=$_SESSION['denpyo_kubun'];
	$denpyo_no=$_SESSION['denpyo_no'];
	$juchu_no=$_SESSION['juchu_no'];
	$suryo=$_SESSION['suryo'];
	$renban=$_SESSION['renban'];
	$renban=$renban - 1;
	print("<div style=\"position:absolute; left:100px; top:700px\">\n");
	//  print("denpyo_kubun=$denpyo_kubun<br>\n");
	//  print("denpyo_no=$denpyo_no<br>\n");
	//  print("suryo=$suryo<br>\n");
	//  print("renban=$renban<br>\n");
	print("</div>\n");

	$sql = "select * from seikyu where (denpyo_no = '$denpyo_no') and (denpyo_kubun = '$denpyo_kubun') and (renban = '$renban')";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow > 0) {
		$rowCount=0;
		while ($rowCount < $resultNumRow) {
			$data = pg_fetch_object($result,$rowCount);
			$suryo = $data->suryo;
			$shohin_code = $data->shohin_code;
			$denpyo_no = $data->denpyo_no;
			$renban = $data->renban;
			$denpyo_kubun = $data->denpyo_kubun;

			$sql2 = "select * from shohin where shohin_code='$shohin_code'";
			$result2 = pg_exec($con,$sql2);
			$resultNumRow2 = pg_numrows($result2);
			if ($resultNumRow2 > 0) {
				$rowCount2=0;
				$data2 = pg_fetch_object($result2,$rowCount2);
				$zaikosu=$data2->zaikosu;
			}

			$zaikosu_new=doubleval($zaikosu) + doubleval($suryo);
			$sql3 = "update shohin set zaikosu='$zaikosu_new' where shohin_code='$shohin_code'";
			$result3 = pg_exec($con,$sql3);
			if ($result3 == FALSE) {
				print("更新に失敗した。");
			}
			
			$sql4 = "delete from seikyu where (denpyo_no = '$denpyo_no') and (renban = '$renban')";
			$result4 = pg_exec($con,$sql4);
			if ($result4 == FALSE) {
				print("削除に失敗した。");
			}

			if ($denpyo_kubun == '3') {
				$sql2 = "select * from azukari where juchu_no='$juchu_no'";
				$result2 = pg_exec($con,$sql2);
				$resultNumRow2 = pg_numrows($result2);
				if ($resultNumRow2 > 0) {
					$rowCount2=0;
					$data2 = pg_fetch_object($result2,$rowCount2);
					$zaikosu=$data2->zaikosu;
				}

				$kagensan_new=doubleval($kagensan) + doubleval($suryo);
				$sql3 = "update azukari set kagensan='$kagensan_new' where juchu_no='$juchu_no'";
				$result3 = pg_exec($con,$sql3);
				if ($result3 == FALSE) {
					print("更新に失敗した。");
				}
				
				$sql4 = "delete from seikyu where (denpyo_no = '$denpyo_no') and (renban = '$renban')";
				$result4 = pg_exec($con,$sql4);
				if ($result4 == FALSE) {
					print("削除に失敗した。");
				}
			} elseif ($denpyo_kubun == '1') {

				$sql2 = "select * from azukari where juchu_no='$juchu_no'";
				$result2 = pg_exec($con,$sql2);
				$resultNumRow2 = pg_numrows($result2);
				if ($resultNumRow2 > 0) {
					$rowCount2=0;
					$data2 = pg_fetch_object($result2,$rowCount2);
					$zaikosu=$data2->zaikosu;
				}

				$zaikosu_new = intval($zaikosu) + intval($suryo);
				print("<div style=\"position:absolute; left:350px; top:700px\">\n");
				//  print("zaikosu_new=$zaikosu_new<br>\n");
				//  print("suryo=$suryo<br>\n");
				//  print("zaikosu=$zaikosu<br>\n");
				//  print("juchu_no=$juchu_no<br>\n");
				print("</div>\n");

				$sql3 = "update azukari set zaikosu='$zaikosu_new' where juchu_no='$juchu_no'";
				$result3 = pg_exec($con,$sql3);
				if ($result3 == FALSE) {
					print("更新に失敗した。");
				}

				$sql4 = "delete from seikyu where (denpyo_no = '$denpyo_no') and (renban = '$renban')";
				$result4 = pg_exec($con,$sql4);
				if ($result4 == FALSE) {
					print("削除に失敗した。");
				} else {
					keka_clear(); //kekaの情報をクリアする
				}
			}
			$rowCount++;
		}
		
		print("<div style=\"position:absolute; left:550px; top:700px\">\n");
		print("</div>\n");
	}

	$_SESSION['joho_juchuno']="";
	$_SESSION['joho_ymd']="";;
	$_SESSION['joho_kubun']="";
	$_SESSION['joho_torihikisaki']="";
	$_SESSION['joho_hakobi']="";
print("★zaiko_clear★<br>\n");
	//stockの数字を戻す
	zaiko_clear();
}

/********************
* 連番処理
*********************/
function renban() {
	setuzoku();
	global $con;

	$denpyo_no=$_SESSION['denpyo_no'];

	$sql="select max(renban) from seikyu where denpyo_no ='$denpyo_no'";
	$result=pg_exec($con,$sql);
	if ($result == FALSE) {
		print("MAX検索に失敗した。$sql<br>");
		exit;
	}

	$resultNumRow = pg_numrows($result);
	if ($resultNumRow > 0 ) {
		$data = pg_fetch_object($result, 0);
		$renban = $data->max;
		$renban=$renban + 1;
	} else {
		$renban='1';
	}
	$_SESSION['renban']=$renban;
}

/********************************
*売上数の確保処理(区分1,4）
*********************************/
function uriage_zaiko() {
	setuzoku();
	global $con;

	$_SESSION['shohin_code']=$shohin_code;
	$juchu_no=$_SESSION['juchu_no'];
	$torihikisaki_no=$_SESSION['torihikisaki_no'];
	$torihikisakimei=$_SESSION['torihikisakimei'];
	$zipcode=$_SESSION['zipcode'];
	$jusho1=$_SESSION['jusho1'];
	$jusho2=$_SESSION['jusho2'];
	$shohin_code=$_SESSION['shohin_code'];
	$shohin_mei=$_SESSION['shohin_mei'];
	$tani=$_SESSION['tani'];
	$tanka=$_SESSION['tanka'];
	$denpyo_kubun=$_SESSION['denpyo_kubun'];
	$suryo=$_SESSION['suryo'];
	$juchu_suryo=$_SESSION['juchu_suryo'];
	$zaikosu=$_SESSION['zaikosu'];
	//商品検索処理で得た取引先番号を受ける

	print("<div style=\"position:absolute; left:50px; top:700px\">\n");
	//  print("手動の入力情報表示<br>\n");
	//  print("torihikisaki_no=$torihikisaki_no<br>\n");
	//  print("suryo=$suryo<br>\n");
	//  print("denpyo_kubun=$denpyo_kubun<br>\n");
	//  print("juchu_no=$juchu_no<br>\n");
	print("</div>\n");

	//azukari-tableの作成（件数の考慮をしていない）
	$sql = "select * from azukari where (juchu_no = '$juchu_no') and (denpyo_kubun = '$denpyo_kubun')";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow == 0) {  
		$zaikosu=doubleval($suryo_zen) - doubleval($suryo);
		if ($zaikosu > 0 ) {  //azukari-tableがなく在庫が存在する場合にazukari-tableを作成する
			$sql2 = "insert into azukari values('$juchu_no','$torihikisaki_no','$torihikisaki_mei','$zipcode','$jusho1','$jusho2',".
			  "'$shohin_code','$shohin_mei','$kagensan','$tani','$tanka','$zaikosu','$denpyo_kubun','$rot_no')";
			$result2 = pg_exec($con,$sql2);
			if ($result2 == FALSE  ) {
				print("新規処理失敗する。");
			}
		}
	} else {
		$rowCount=0;
		$data = pg_fetch_object($result,$rowCount);
		$zaikosu=$data->zaikosu;
		$torihikisaki_get=$data->torihikisaki_no;

		$zaikosu=doubleval($zaikosu) - doubleval($suryo);
		$aa[1]=$data->torihiki_001;
		$aa[2]=$data->torihiki_002;
		$aa[3]=$data->torihiki_003;
		$aa[4]=$data->torihiki_004;
		$aa[5]=$data->torihiki_005;
		$aa[6]=$data->torihiki_006;
		$cc=0;
		for ($i = 1; $i < 6; $i++) {
			if (empty($aa[$i])) {
				$aa[$i]=$torihikisaki_no;
				print("<div style=\"position:absolute; left:650px; top:700px\">\n");
				print("</div>\n");

				$i=7;
			} else {
				if ($aa[$i] == $torihikisaki_no) {
					$i=7;
				}
			}
		}
		print("<div style=\"position:absolute; left:250px; top:700px\">\n");
		//    print("torihikisaki_get= $torihikisaki_get<br>\n");
		//    print("aa1= $aa[1]<br>\n");
		//    print("aa2= $aa[2]<br>\n");
		//    print("aa3= $aa[3]<br>\n");
		//    print("aa4= $aa[4]<br>\n");
		//    print("aa5= $aa[5]<br>\n");
		//    print("aa6= $aa[6]<br>\n");
		//    print("zaikosu= $zaikosu<br>\n");
		print("</div>\n");

		$sql3 = "update azukari set zaikosu='$zaikosu',torihiki_001='$aa[1]',torihiki_002='$aa[2]',torihiki_003='$aa[3]',".
		      "torihiki_004='$aa[4]',torihiki_005='$aa[5]',torihiki_006='$aa[6]'".
		      " where (juchu_no = '$juchu_no') and (denpyo_kubun = '$denpyo_kubun')";
		$result3 = pg_exec($con,$sql3);
		if ($result3 == FALSE) {
			print("更新に失敗した。");
		}
	}

	$sql = "select * from stock where juchu_no = '$juchu_no'";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);

	if ($resultNumRow > 0) {
		$rowCount=0;
		$data = pg_fetch_object($result,$rowCount);
		$shurui=$data->shurui;

		switch ($shurui) {
			case 0:  //一般
				$sql2 = "select * from juchu_top where bango = '$juchu_no'";
				$result2 = pg_exec($con,$sql2);
				$resultNumRow2 = pg_numrows($result2);
				if ($resultNumRow2 > 0) {
					$rowCount2=0;
					$data2 = pg_fetch_object($result2,$rowCount2);
					$suryo_zen=$data2->suryo;
					$kingaku=$data2->uriage_kin;
					$tanka=$data2->tanka;
					$tani=$data2->tani;
					$tanto2=$data2->tanto;
					$shohin_code=$data2->shohin_code;
					$shohin_mei=$data2->shohin_mei;
					$torihikisaki_stok=$data2->torihikisaki;
					$torihikisaki_mei=$data2->torihikisaki_mei;
					$_SESSION['rot_no']="";
				}
				break;
			case 1:  //グラビヤ
				$sql3 = "select * from grabiya_top where bango = '$juchu_no'";
				$result3 = pg_exec($con,$sql3);
				$resultNumRow3 = pg_numrows($result3);
				if ($resultNumRow3 > 0) {
					$rowCount3=0;
					$data3 = pg_fetch_object($result3,$rowCount3);
					$suryo_zen=$data3->suryo;
					$kingaku=$data3->uriage_kingaku;
					$tanka=$data3->tanka;
					$tani=$data3->suryo_tani;
					$tanto3=$data3->tanto;
					$shohin_code=$data3->shohin_code;
					$shohin_mei=$data3->shohin_mei;
					$torihikisaki_stok=$data3->torihikisaki;
					$torihikisaki_mei=$data3->torihikisaki_mei;
					$rot_no=$data3->rot_no;
					$_SESSION['rot_no']=$rot_no;
				}		
		}
	}

	print("<div style=\"position:absolute; left:550px; top:700px\">\n");
	//  print("shurui=$shurui<br>\n");
	//  print("suryo2=$suryo2<br>\n");
	//  print("suryo3=$suryo3<br>\n");
	//  print("tanto2=$tanto2<br>\n");
	//  print("tanto3=$tanto3<br>\n");
	print("</div>\n");

}
/*******************************
*預り売上数の確保処理(区分2,3）
********************************/
function azukari_zaiko() {
	setuzoku();
	global $con;

	$_SESSION['shohin_code']=$shohin_code;
	$juchu_no=$_SESSION['juchu_no'];
	$torihikisaki_no=$_SESSION['torihikisaki_no'];
	$torihikisakimei=$_SESSION['torihikisakimei'];
	$zipcode=$_SESSION['zipcode'];
	$jusho1=$_SESSION['jusho1'];
	$jusho2=$_SESSION['jusho2'];
	$shohin_code=$_SESSION['shohin_code'];
	$shohin_mei=$_SESSION['shohin_mei'];
	$kagensan=$_SESSION['kagensan'];
	$tani=$_SESSION['tani'];
	$tanka=$_SESSION['tanka'];
	$denpyo_kubun=$_SESSION['denpyo_kubun'];
	$suryo=$_SESSION['suryo'];
	$juchu_suryo=$_SESSION['juchu_suryo'];
	$zaikosu=$_SESSION['zaikosu'];

	$sql = "select * from azukari where juchu_no='$juchu_no'";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
	if (($resultNumRow == 0) and ($denpyo_kubun == '2')) {
		//新規は預売上
		$rot_no=$_SESSION['rot_no'];
		$sql2 = "insert into azukari values('$juchu_no','$torihikisaki_no','$torihikisakimei','$zipcode','$jusho1','$jusho2',".
		      "'$shohin_code','$shohin_mei','$suryo','$tani','$tanka','$juchu_suryo','$denpyo_kubun','$rot_no')";
		$result2 = pg_exec($con,$sql2);
		if ($result2 == FALSE  ) {
			print("新規処理失敗する。");
		}
	} else {
		if ($resultNumRow > 0) {
			$rowCount=0;
			$data = pg_fetch_object($result,$rowCount);
			$zaikosu_ima=$data->zaikosu;
			$kagensan_ima=$data->kagensan;
			$kagensan=doubleval($kagensan_ima) - doubleval($suryo);
			$zaikosu=doubleval($zaikosu_ima) - doubleval($suryo);
			$sql3 = "update azukari set torihikisaki_no='$torihikisaki_no', torihikisakimei='$torihikisakimei',".
			     "zipcode='$zipcode', jusho1='$jusho1', jusho2='$jusho2', shohin_code='$shohin_code', shohin_mei='$shohin_mei',".
			     "kagensan='$kagensan', tani='$tani', tanka='$tanka', zaikosu='$zaikosu', denpyo_kubun='$denpyo_kubun' where juchu_no='$juchu_no'";
			$result3 = pg_exec($con,$sql3);
			if ($result3 == FALSE) {
				print("更新に失敗した。");
			}
		}
	}
}

/********************
*預出荷処理
*********************/
function azukari_shuka() {
	setuzoku();
	global $con;

	$juchu_no=$_SESSION['juchu_no'];

	$sql = "select * from azukari where juchu_no = '$juchu_no'";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow > 0) {
		$rowCount=0;
		$data = pg_fetch_object($result,$rowCount);
		$juchu_no=$data->juchu_no;

		$shohin_code=$data->shohin_code;
		$shohin_mei=$data->shohin_mei;
		$kagensan=$data->kagensan;
		$tani=$data->tani;
		$tanka=$data->tanka;
		$zaikosu=$data->zaikosu;
	}

	$hakobi=$_SESSION['hakobi'];
	sime();
	$seikyu_ym=$_SESSION['seikyu_ym'];
	$seikyu_sime=$_SESSION['seikyu_sime'];
	$_SESSION['juchu_no']=$juchu_no;
	$_SESSION['shohin_code']=$shohin_code;
	$_SESSION['shohin_mei']=$shohin_mei;
	$_SESSION['kagensan']=$kagensan;
	$_SESSION['tani']=$tani;
	$_SESSION['tanka']=$tanka;
	$_SESSION['zaikosu']=$zaikosu;

	print("<div style=\"position:absolute; left:10px; top:700px\">\n");
	//    print("top_denpyo_kubun= $top_denpyo_kubun<br>\n");
	//    print("denpyo_kubun= $denpyo_kubun<br>\n");
	print("</div>\n");

	torihikisaki();
	$tanto=$_SESSION['tanto_shanai'];
	$torihikisaki_mei=$_SESSION['torihikisaki_mei'];
	$_SESSION['torihikisakimei']=$torihikisakimei;
	shain($tanto);
	$tanto_mei=$_SESSION['tanto_mei'];
	$_SESSION['tanto_mei']=$tanto_mei;
}

/********************
*取引先select処理
*********************/
function torihikisaki() {
	setuzoku();
	global $con;

	$torihikisaki_no=$_SESSION['torihikisaki_no'];
	$sql = "select * from torihikisaki where bango='$torihikisaki_no'";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow > 0) {
		$rowCount=0;
		$data = pg_fetch_object($result,$rowCount);
		$zipcode=$data->zipcode;
		$jusho1=$data->jusho1;
		$jusho2=$data->jusho2;
		$torihikisaki_mei=$data->namae_uchi;
		$sime=$data->sime;
		$tanto_shanai=$data->tanto_shanai;
	} //なければ諸口対応 社員テーブルと照合が必要かもしれない
	$_SESSION['zipcode']=$zipcode;
	$_SESSION['jusho1']=$jusho1;
	$_SESSION['jusho2']=$jusho2;
	$_SESSION['torihikisaki_mei']=$torihikisaki_mei;
	$_SESSION['sime']=$sime;
	$_SESSION['tanto_shanai']=$tanto_shanai;
}

/********************
*商品先select処理
*********************/
function shohin($shohin_code) {
	setuzoku();
	global $con;

	$sql = "select * from shohin where shohin_code='$shohin_code'";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow > 0) {
		$rowCount=0;
		$data = pg_fetch_object($result,$rowCount);
		$shohin_mei=$data->shohinmei;
		$tani=$data->tani;
	} //なければ商品テーブルにない商品で受注時の商品名をそのまま使う　基本的に商品コードはブランク
	$_SESSION['shohin_mei']=$shohin_mei;
}

/********************
*取引先select処理
*********************/
function shain($tanto) {
	setuzoku();
	global $con;

	$sql = "select * from shain where bango='$tanto'";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow > 0) {
		$rowCount=0;
		$data = pg_fetch_object($result,$rowCount);
		$tanto_mei=$data->namae;
	}
	$_SESSION['tanto_mei']=$tanto_mei;
}

/********************
*SESSION関数クリア処理
*********************/
function session_clear() {
	$_SESSION['juchu_no']="";			//受注番号
	$_SESSION['torihikisaki_no']="";	//取引先番号
	$_SESSION['torihikisaki_mei']="";	//取引先名
	$_SESSION['zipcode']="";			//郵便番号
	$_SESSION['jusho1']="";				//住所１
	$_SESSION['jusho2']="";				//住所２
	$_SESSION['shohin_code']="";		//商品コード
	$_SESSION['shohin_mei']="";			//商品名
	$_SESSION['kagensan']="";			//加減算
	$_SESSION['suryo']="";				//数量
	$_SESSION['zaikosu']="";			//在庫数
	$_SESSION['tani']="";				//単位
	$_SESSION['tanka']="";				//単価
	$_SESSION['biko']="";				//備考
	$_SESSION['tanto_mei']="";			//担当者名
	$_SESSION['seikyu_ym']="";			//請求月
	$_SESSION['seikyu_sime']="";		//締日
	$_SESSION['torihikisaki_stok']="";	//取引先Stock
	$_SESSION['check_item']="";			//処理モード
}

/********************
*SESSION→データ処理
*********************/
function kensaku_hyoji() {

	$kensaku_hyoji=$_SESSION['kensaku_hyoji'];

	switch ($kensaku_hyoji) {
		case 00:
			break;
		default:
	}
}

/******************
* 商品検索処理
*******************/
function shohin_kensaku() {
	setuzoku();
	global $con;
	global $kakkasu;

	$shohin_kensu=$_SESSION['shohin_kensu'];

	print("<div style=\"position:absolute; left:20px; top:533px\">\n");
	print("<table border=\"1\">\n");
	    print("<tr style=\"background-color: #FFF0E1\"><td style=\"text-align:center\"><span style=\"font: 9pt/10pt 'MS PGothic'\">受注番号</span></td>".
	          "<td style=\"text-align:center\"><span style=\"font: 9pt/10pt 'MS PGothic'\">商品番号</span></td>".
	          "<td style=\"text-align:center\"><span style=\"font: 9pt/10pt 'MS PGothic'\">商品名</span></td>".
	          "<td style=\"text-align:center\"><span style=\"font: 9pt/10pt 'MS PGothic'\">単位</span></td>".
	          "<td style=\"text-align:center\"><span style=\"font: 9pt/10pt 'MS PGothic'\">単価</span></td>".
	          "<td style=\"text-align:center\"><span style=\"font: 9pt/10pt 'MS PGothic'\">預在庫数</span></td>".
	          "<td style=\"text-align:center\"><span style=\"font: 9pt/10pt 'MS PGothic'\">在庫数</span></td>".
	          "<td style=\"text-align:center\"><span style=\"font: 9pt/10pt 'MS PGothic'\">処理</span></td>\n");

	$sql = "select * from azukari where shohin_mei like '$shohin_kensu%'";
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow > 0) {
		$rowCount=0;
		while ($resultNumRow > $rowCount) {
			$data = pg_fetch_object($result,$rowCount);
			$juchu_no=$data->juchu_no;
			$shohin_code=$data->shohin_code;
			$shohin_mei=$data->shohin_mei;
			$tani=$data->tani;
			$tanka=$data->tanka;
			$kagensan=$data->kagensan;
			$zaikosu=$data->zaikosu;
			$juchu_no = htmlspecialchars($juchu_no, ENT_QUOTES, "UTF-8");
			$shohin_code = htmlspecialchars($shohin_code, ENT_QUOTES, "UTF-8");
			$shohin_mei = htmlspecialchars($shohin_mei, ENT_QUOTES, "UTF-8");
			$tani = htmlspecialchars($tani, ENT_QUOTES, "UTF-8");
			$tanka = htmlspecialchars($tanka, ENT_QUOTES, "UTF-8");
			$kagensan = htmlspecialchars($kagensan, ENT_QUOTES, "UTF-8");
			$zaikosu = htmlspecialchars($zaikosu, ENT_QUOTES, "UTF-8");
			print("<form action=\"seikyu1.php\" method=\"POST\">\n");       
			print("<tr>\n");
			print("<td><input type=\"text\" name=\"juchu_no\" value=\"$juchu_no\" style=\"width:56px; height:18px; text-align: center; background-color: #ffffff; font-size: 10pt; border-color: #CCCCCC\"></td>\n");
			print("<td><input type=\"text\" name=\"shohin_code\" value=\"$shohin_code\" style=\"width:62px; height:18px; text-align: center; background-color: #ffffff; font-size: 10pt; border-color: #CCCCCC\"></td>\n");
			print("<td><input type=\"text\" name=\"shohin_mei\" value=\"$shohin_mei\" style=\"width:249px; height:18px; text-align: left; background-color: #ffffff; font-size: 10pt; border-color: #CCCCCC\"></td>\n");
			print("<td><input type=\"text\" name=\"tani\" value=\"$tani\" style=\"width:35px; height:18px; text-align: center; background-color: #ffffff; font-size: 10pt; border-color: #CCCCCC\"></td>\n");
			print("<td><input type=\"text\" name=\"tanka\" value=\"$tanka\" style=\"width:35px; height:18px; text-align: center; background-color: #ffffff; font-size: 10pt; border-color: #CCCCCC\"></td>\n");
			print("<td><input type=\"text\" name=\"kagensan\" value=\"$kagensan\" style=\"width:60px; height:18px; text-align: right; background-color: #ffffff; font-size: 10pt; border-color: #CCCCCC\"></td>\n");
			print("<td><input type=\"text\" name=\"zaikosu\" value=\"$zaikosu\" style=\"width:60px; height:18px; text-align: right; background-color: #ffffff; font-size: 10pt; border-color: #CCCCCC\"></td>\n");
			print("<td><input type=\"submit\" name=\"kensaku_hyoji\" value=\"表示\" style=\"width:50px; height:21px; font-size: 10pt\"></td>\n");
			print("<input type=\"hidden\" name=\"check_item\" value=\"検索表示\">\n");
			print("</form>\n");
			$rowCount++;
		}
	}
	print("</table>\n");
	print("</div>\n");
	$kakkasu=$resultNumRow;
}
/********************
* 仮伝→売上処理
*********************/
function chusi() {
	setuzoku();
	global $con;
	global $denpyo_no;
	global $torihikisaki_no;

	$kensaku_no=$_SESSION['kensaku_no'];
	$_SESSION['denpyo_no']=$kensaku_no;
	$_SESSION['kensaku']="abc";

	$sql = "delete from seikyu where denpyo_no = '$kensaku_no'";
	$result = pg_exec($con,$sql);
	if ($result == FALSE) {
		print("削除に失敗した。");
	}

	print("<div style=\"position:absolute; left:58px; top:700px\">\n");
	print("</div>\n");
}


function hinshu() {
	setuzoku();
	global $con;
	$abc_ig=$_SESSION['hinsha_ig'];
	$juchu_no=$_SESSION['juchu_no'];
	$hinshu_teisei=$_SESSION['hinshu_teisei'];

	print("<div style=\"position:absolute; left:1000px; top:750px\">\n");
	print("</div>\n");

	if ($abc_ig=='g') {
		$sql = "select * from grabiya_top where bango = '$juchu_no'";              
	} else {
		$sql = "select * from juchu_top where bango = '$juchu_no'";
	}
	
	$result = pg_exec($con,$sql);
	$resultNumRow = pg_numrows($result);
	if ($resultNumRow > 0) {
		if ($abc_ig=='g') {
			$sql2 = "update grabiya_top set hinshu='$hinshu_teisei' where bango ='$juchu_no'";           
		} else {
			$sql2 = "update juchu_top set hinshu='$hinshu_teisei' where bango ='$juchu_no'";
		}
		$result2 = pg_exec($con,$sql2);
		if ($result2 == FALSE) {
			print("更新に失敗した。");
		}
	}
}

/******************
* function終了
*******************/

print("<HTML lang=\"ja\">\n");
print("<HEAD>\n");
print("<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html; charset=UTF-8\">\n");
print("<META HTTP-EQUIV=\"content-language\" CONTENT=\"ja\">\n");
print("<TITLE>seikyu1.php</TITLE>\n");
print("<link rel=\"stylesheet\" href=\"./css/seikyu.css\" type=\"text/css\">\n"); 
?>
<script type="text/javascript">
function check(evt, obj, next) {
    //W3C DOMとIEの両方のイベントオブジェクトに対応
    evt = (evt) ? evt : ((event) ? event : null);
    //押されたキーのコードを取得
    var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
    if (charCode == 13 && next) { //改行コードの場合
        obj.elements[next].focus(); //フォーカスを当てる
        return false;
    }
}

let data = JSON.parse(localStorage.getItem("data")) ?? [];
window.addEventListener('load', function() {
    data.forEach(drawRowTable);
})

function saveData() {
    console.log("call save function");
    // $.ajax({
    //     url: "seikyu1.php",
    //     type: "POST",
    //     async: false,
    //     data: data
    // })
    createCookie("savedData", encodeURIComponent(JSON.stringify(data)));
}

function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

function add() {
    document.getElementById('remaining_stock').innerHTML = '';
    let addingData = document.getElementById("select").value == "4" ? [document.getElementById('juchu_no1').value,
        document.getElementById('shohin_mei').value, document
        .getElementById('suryo').value, document.getElementById('tani')
        .value, '', '', document
        .getElementById('biko').value
    ] : [document.getElementById('juchu_no1').value, document.getElementById('shohin_mei').value, document
        .getElementById('suryo').value, document.getElementById('tani')
        .value, document.getElementById('tanka').value, document.getElementById('kingaku').value, document
        .getElementById('biko').value
    ];
    if (document.getElementById('juchu_no1').value) data.push(addingData);
    if (data.length > 4) data.shift();
    localStorage.setItem("data", JSON.stringify(data));
    // createCookie("savedData", encodeURIComponent(JSON.stringify(data)));
    // console.log(localStorage.getItem("data"));
    data.forEach(drawRowTable);
    sumAll();
}

function drawRowTable(item, index) {
    let total = item[2] && item[4] ? item[2] * item[4] : '';
    var rows = document.getElementById("dataTable").getElementsByTagName("table")[0].rows;
    var row = rows[index + 1];
    row.cells[0].innerHTML = `<td><input type="text" name="juchu_no" value="` + item[0] +
        `" style="width: 50px; height: 19px"></td>`;
    row.cells[1].innerHTML = `<td><input type="text" name="shohin_mei" value="` + item[1] +
        `" style="width: 375px; height: 19px"></td>`;
    row.cells[2].innerHTML = `<td><input type="text" name="suryo" onchange="changeValue(` + index + `)" value="` + item[
        2] + `" style="text-align: center ;width: 53px; height: 19px"></td>`;
    row.cells[3].innerHTML = `<td><input type="text" name="tani" value="` + item[3] +
        `" style="text-align: center ;width: 55px; height: 19px"></td>`;
    row.cells[4].innerHTML = `<td><input type="text" name="tanka" onchange="changeValue(` + index + `)" value="` + item[
        4] + `" style="text-align: center ;width: 55px; height: 19px"></td>`;
    row.cells[5].innerHTML = `<td><input type="text" name="kingaku" value="` + total +
        `" style="text-align: right;width: 77px; height: 19px"></td>`;
    row.cells[6].innerHTML = `<td><input type="text" name="biko" value="` + item[6] +
        `" style="width: 160px; height: 19px"></td>`;

}

function up(index) {
    if (data[index]) {
        var f = data.splice(index, 1)[0];
        data.splice(index - 1, 0, f);
    }
    localStorage.setItem('data', JSON.stringify(data));
    data.forEach(drawRowTable);
}

function down(index) {
    if (data[index]) {
        var f = data.splice(index, 1)[0];
        data.splice(index + 1, 0, f);
    }
    localStorage.setItem('data', JSON.stringify(data));
    data.forEach(drawRowTable);
}

function deleteRow(index) {
    let reset = [
        ['', '', '', '', '', '', ''],
        ['', '', '', '', '', '', ''],
        ['', '', '', '', '', '', ''],
        ['', '', '', '', '', '', '']
    ];
    reset.forEach(drawRowTable);
    if (data[index]) {
        data.splice(index, 1);
    }
    localStorage.setItem('data', JSON.stringify(data));
    data.forEach(drawRowTable);
    sumAll();
}

function changeValue(index) {
    var rows = document.getElementById("dataTable").getElementsByTagName("table")[0].getElementsByTagName("tr")[index +
        1];
    var cell2 = rows.getElementsByTagName("input")[2].value;
    var cell4 = rows.getElementsByTagName("input")[4].value;
    var total = '';
    if (cell2 && cell4) total = cell2 * cell4;
    total = parseFloat(parseFloat(total).toFixed(2));
    total = isNaN(total) ? "" : total;
    rows.cells[5].innerHTML = `<td><input type="text" value="` + total +
        `" style="text-align: right;width: 77px; height: 19px"></td>`;
    data[index][2] = cell2;
    data[index][4] = cell4;
    sumAll();
}

function sumAll() {
    var sumAll = 0;
    for (var i = 0; i < 4; i++) {
        value = document.getElementById("dataTable").getElementsByTagName("table")[0].getElementsByTagName("tr")[i +
            1].getElementsByTagName("input")[5].value;
        value = parseFloat(parseFloat(value).toFixed(2));
        if (!isNaN(value)) sumAll = sumAll + value;
    }
    document.getElementById("gokei").value = sumAll;
}
</script>
<?php

  print("</HEAD>\n");
  print("<BODY onLoad=\"document.myFORM.hakobi.focus()\">\n");
/**************
* 開始処理
**************/
ukeru1($torihikisaki_no,$juchu_no,$shohin_mei,$tanto,$tanka,$session1,$kagensan,$zaikosu,$torihiki_item,$sentaku_item,$check_item);
ukeru2($denpyo_no,$denpyo_no2,$renban,$torihikisaki_mei,$zipcode,$jusho1,$jusho2,$namae_soto,$shohin_code,$denpyo_kubun,$suryo);
ukeru3($tani,$kingaku,$hakobi,$tanto,$tanto_mei,$biko,$seikyu_sime,$seikyu_ym,$tekiyo,$denpyo_new,$za_torihikisaki_no,$za_torihikisaki_mei);
ukeru4($joho_ymd,$joho_torihikisaki,$joho_kubun,$joho_juchuno,$joho_hakobi,$processing,$kensaku_no,$kensaku_kubun,$kari_zaiko1,$kari_zaiko2);
ukeru5($shohinmei,$tani,$uri_tanka,$kanmi,$ig_kubun,$shohin_kensu,$bango,$hinshu,$hinshu_teisei);

print("<div style=\"position:absolute; left:700px; top:550px\">\n");
print("check_item=$check_item<br>\n");
print("</div>\n");

switch ($check_item) {
	case '表示':
		echo("<script>console.log('torihikisaki_no: " . $torihikisaki_no . "');</script>");
		$torihikisaki_mae=$_SESSION['torihikisaki_no'];
		if ($torihikisaki_mae != $torihikisaki_no) {
		   $_SESSION['kawatta']='2';  //変わった
		} else {
		   $_SESSION['kawatta']='1';  //同じ
		}
		$_SESSION['hakobi']=$hakobi;
		$aa=$torihikisaki_no;
		$torihikisaki_no=str_pad($aa, 4, "0",STR_PAD_LEFT);
		$_SESSION['torihikisaki_no']=$torihikisaki_no;
		$_SESSION['denpyo_kubun']=$denpyo_kubun;
		$_SESSION['juchu_no']=$juchu_no;
		$_SESSION['hinshu']=$hinshu; //2009.03追加
		print("<div style=\"position:absolute; left:700px; top:500px\">\n");
		print("</div>\n");
		break;
	case '更新':
		$_SESSION['kawatta']='1';
		$_SESSION['juchu_no']=$juchu_no;
		$_SESSION['juchu_no2']=$juchu_no2;
		$_SESSION['suryo']=$suryo;
		$_SESSION['tani']=$tani;
		$_SESSION['tanka']=$tanka;
		$_SESSION['shohin_mei']=$shohin_mei;
		$_SESSION['biko']=$biko;
		$_SESSION['kanmi']=$kanmi;
		$_SESSION['kingaku_kosin']=$kingaku;
		break;
	case '預り出荷':
		$_SESSION['juchu_no']=$juchu_no;
		break;
	case '売上検索':
		$_SESSION['kensaku_no']=$kensaku_no;
		$_SESSION['kensaku_kubun']=$kensaku_kubun;
		break;
	case '商品検索':
		$_SESSION['kawatta']='2';
		$_SESSION['shohin_kensu']=$shohin_kensu;
		break;
	case '検索表示':
		$_SESSION['kawatta']='1';
		$_SESSION['juchu_no']=$juchu_no;
		$_SESSION['shohin_code']=$shohin_code;
		$_SESSION['shohin_mei']=$shohin_mei;
		$_SESSION['tani']=$tani;
		$_SESSION['tanka']=$tanka;
		$_SESSION['kagensan']=$kagensan;
		$_SESSION['zaikosu']=$zaikosu;
		break;
	case '中止':
		chusi();
		break;
	default:
		$_SESSION['kawatta']='1';
}

$juchu_no=$_SESSION['juchu_no'];
$hakobi=$_SESSION['hakobi'];
$seikyu_ym=$_SESSION['seikyu_ym'];
$seikyu_sime=$_SESSION['seikyu_sime'];
$torihikisaki_no=$_SESSION['torihikisaki_no'];
$torihikisaki_mei=$_SESSION['torihikisaki_mei'];
$za_torihikisaki_no=$_SESSION['za_torihikisaki_no'];
$torihikisaki_stok=$_SESSION['torihikisaki_stok'];
$suryo=$_SESSION['suryo'];
$denpyo_kubun=$_SESSION['denpyo_kubun'];
$zipcode=$_SESSION['zipcode'];
$jusho1=$_SESSION['jusho1'];
$jusho2=$_SESSION['jusho2'];
$tanto_mei=$_SESSION['tanto_mei'];
$kanmi=$_SESSION['kanmi'];

print("<div style=\"position:absolute; left:10px; top:5px\">\n");
	print("<img src=\"gazo/top.gif\">\n");
print("</div>\n");

print("<div style=\"position:absolute; left:215px; top:34px\">\n");
	sakusei_ymd();
print("</div>\n");

print("<div style=\"position:absolute; left:271px; top:15px\">\n");
	print("<a href=\"../index.php\"><img src=\"gazo/home.gif\" border=\"0\"></a>\n");
print("</div>\n");

print("<div style=\"position:absolute; left:925px; top:50px\">\n");
	print("<a href=\"shukei.php\"><img src=\"gazo/shukei.gif\" border=\"0\"></a>\n");
print("</div>\n");

/*******************
情報収集終了
*******************/

switch ($check_item) {
	case '表示':
		hyoji_shori();

		print("<div style=\"position:absolute; left:900px; top:500px\">\n");
		print("</div>\n");

		hyoji();
		hyoji_meisai001();
		hyoji_meisai002();
		$owari='25';
		$_SESSION['owari']=$owari;
		$hajime='0';
		$_SESSION['hajime']=$hajime;
		$_SESSION['kensaku_hyoji']='00';
		kensaku_hyoji();
		break;
	case '売上検索':
		kensaku();
		$_SESSION['kensaku']='有';
		hyoji();
		hyoji_meisai001();
		hyoji_meisai002();
		kensaku_hyoji();
		break;
	/////////////////// change /////////////////////
	//請求ファイルを作成する処理 1056
	// case '更新':
	// 	$_SESSION['kensaku']="";
	// 	kosin();
	// 	hyoji();
	// 	hyoji_meisai001();
	// 	hyoji_meisai002();
	// 	kensaku_hyoji();
	// 	break;

	// case 'クリア':
	// 	clear();
	// 	denpyo_max();
	// 	$renban= 1;
	// 	$_SESSION['renban']=$renban;
	// 	$_SESSION['kensaku']='無';
	// 	hyoji();
	// 	hyoji_meisai001();
	// 	hyoji_meisai002();
	// 	kensaku_hyoji();
	// 	break;
	case '登録':
		$_SESSION['kensaku']="";
		if(isset($_COOKIE["savedData"])) { 
			toroku();
			unset($_COOKIE["savedData"]); 
			setcookie("savedData", FALSE, -1, '/', $_SERVER["HTTP_HOST"]); 
			echo("<script>console.log('da co _COOKIE');</script>");
		} else {
			echo("<script>console.log('khon ton tai _COOKIE');</script>");
		}

		// 	$renban= 1;
	// 	$_SESSION['renban']=$renban;
	// 	$_SESSION['kensaku']='無';
		hyoji();
		hyoji_meisai001();
		hyoji_meisai002();
		kensaku_hyoji();
		break;
	/////////////////// change /////////////////////
	case '新規':
		denpyo_max();
		$renban= 1;
		$_SESSION['renban']=$renban;
		$_SESSION['kensaku']='無';
		hyoji();
		hyoji_meisai001();
		hyoji_meisai002();
		kensaku_hyoji();
		break;
	case '商品検索':
		denpyo_max();
		$renban= 1;
		$_SESSION['renban']=$renban;
		$_SESSION['kensaku']='無';
		shohin_kensaku();
		hyoji();
		hyoji_meisai001();
		hyoji_meisai002();
		kensaku_hyoji();
		break;
	case '検索表示':
		shohin_kensaku();
		azukari_shuka();
		hyoji();
		hyoji_meisai001();
		hyoji_meisai002();
		kensaku_hyoji();
		break;
	case '中止':
		chusi();
		hyoji();
		hyoji_meisai001();
		hyoji_meisai002();
		kensaku_hyoji();
		break;
	case '品種':
		$_SESSION['hinshu_teisei']=$hinshu_teisei; //2009.03追加
		hinshu();   
		hyoji_shori();  
		hyoji();
		hyoji_meisai001();
		hyoji_meisai002();
		$owari='25';
		$_SESSION['owari']=$owari;
		$hajime='0';
		$_SESSION['hajime']=$hajime;
		$_SESSION['kensaku_hyoji']='00';
		kensaku_hyoji();          
		break;
	default:
		session_clear();
		denpyo_max();  //伝票番号のカウンターで次の番号を取得
		$renban= 1;
		$_SESSION['renban']=$renban;
		$_SESSION['kensaku']='無';
		$_SESSION['uriage_shori']="";
		$_SESSION['go_back']="";
		hyoji();
		hyoji_meisai001();
		hyoji_meisai002();
		$_SESSION['kensaku_hyoji']='00';
		$_SESSION['torihikisaki_no']='6002';
		torihikisaki();
		kensaku_hyoji();
}

$ties='gazo/chusi_shori.gif';
$shohin_kensu = htmlspecialchars($shohin_kensu, ENT_QUOTES, "UTF-8");
$kakkasu = htmlspecialchars($kakkasu, ENT_QUOTES, "UTF-8");
print("<div style=\"position:absolute; left:882px; top:14px\">\n");
	print("<form action=\"chusi_shori.php\" target=_new method=\"POST\">\n");
	print("<input type=\"hidden\" name=\"check_item\" value=\"受注済み中止処理\">\n");
	print("<input type=\"image\" src=\"$ties\">\n");
	print("</form>\n");
print("</div>\n");

print("<div style=\"position:absolute; left:20px; top:475px\">\n");
	print("<img src=\"gazo/bar01.gif\"><br>\n");
print("</div>\n");
print("<div style=\"position:absolute; left:35px; top:480px\">\n");
	print("<form action=\"seikyu1.php\" method=\"POST\">\n");
	print("<table border=\"0\">\n");
	print("<tr><td><span style=\"font: 10pt/10pt 'MS PGothic'\">商品名</span></td>\n");
	print("<tr><td>\n");
	print("<input type=\"text\" name=\"shohin_kensu\" value=\"$shohin_kensu\" style=\"width:240px; height:20px; text-align: left\">\n");
	print("<input type=\"submit\" name=\"check_item\" value=\"商品検索\">\n");
	print("</td>\n");
	print("</table>\n");
	print("</form>\n");
print("</div>\n");
print("<div style=\"position:absolute; left:370px; top:480px\">\n");
	print("<form action=\"seikyu1.php\" method=\"POST\">\n");
	print("<table border=\"0\">\n");
	print("<tr><td><span style=\"font: 10pt/10pt 'MS PGothic'\">検索結果件数</span></td>\n");
	print("<tr><td>\n");
	print("<input type=\"text\" name=\"kakkasu\" value=\"$kakkasu\" style=\"width:75px; height:20px; background-color: #FFD9FF; text-align: center; font-size: 12pt; border-color: #CCCCCC\">\n");
	print("</td>\n");
	print("</table>\n");
	print("</form>\n");
print("</div>\n");

//ひな形
print("<div style=\"position:absolute; left:350px; top:750px\">\n");
print("</div>\n");

print("</BODY>\n");
print("</HTML>\n");
?>