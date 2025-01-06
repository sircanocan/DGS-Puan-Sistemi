<form action="" method="post">
<table border ="2" width = "1250" align = "center"> 

<tr>
<td align="center" colspan="3" width = "2000"><b>DGS Puanmatik</b></td>
</tr>

<tr>
<td height = "100"></td>
<td width = "425">Doğru</td>
<td width = "425">Yanlış</td>
</tr>

<tr>
<td height = "100" valign ="top">Sayısal Testi</td>
<td width = "425">
   <input type ="text" style="height:60px;" name ="saydogru" valign="center">
</td>
<td width="425">
   <input type="text" style="height:60px;" name ="sayyanlis" valign="center">
</td>
</tr>

<tr>
<td height = "100" valign ="top">Sözel Testi</td>
<td width = "425">
   <input type="text" style="height:60px;" name ="sozdogru" valign="center">
</td>
<td width="425">
   <input type="text" style="height:60px;" name ="sozyanlis" valign="center">
</td>
</tr>

<tr>
<td height = "100" valign ="top">Önlisans Başarı Puanı(Zorunlu Alan)</td>
<td width = "425">
   <input type="text" style="height:60px;" name ="onlis" valign="center">
</td>
<td></td>
</tr>

<tr>
<td height="100" valign="top">Alanınız</td>
<td width ="425">
   <input type="radio" name="alan" value="Sayısal"/>Sayısal   
   <input type="radio" name="alan" value="Sözel"/>Sözel
   <input type="radio" name="alan" value="Eşit-Ağırlık"/>Eşit Ağırlık
</td>
</tr>   

<tr>
<td height="100" valign="top">2019 öncesinde DGS ile bir programa yerleştirildiniz mi?
<td width="425">
   <input type="radio" name="cevap" value="e"/>Evet
</td>
<td width="425">
   <input type="radio" name="cevap" value="n"/>Hayır
</td>
</tr>   
   
<tr>
<td height ="100" width="425" colspan="3">
   <style>
     .centered {
      margin:0 auto 0 auto;
      text-align:center;
               }
   </style>

       <div class="centered">
           <input type="submit" name="Hesapla" value="Hesapla">
           <input type="reset" name="Temizle" value="Temizle">
       </div>
</td>
</tr>
   
</table>
</form>



<?php

if(isset($_POST['Hesapla']))
{
$saydogru = $_POST['saydogru'];
$sayyanlis = $_POST['sayyanlis'];
$sozdogru = $_POST['sozdogru'];
$sozyanlis = $_POST['sozyanlis'];
@$onlis = $_POST['onlis'];
@$alan = $_POST['alan'];
 switch($alan)
 {
	case "Sayısal":
     echo "Sayısal";
    break;
    case "Sözel":
     echo "Sözel";
    break;
    case "Eşit-Ağırlık":
     echo "Eşit-Ağırlık";
    break;
    default:
     
    break;	
  }

@$cevap = $_POST['cevap'];


if($onlis == "")
{
  echo " 
<script type='text/javascript'>  
alert('ÖBP alanını boş bıraktığınızdan puanınız hesaplanamamıştır.'); 
</script> 
"; 
}
else
{
	
}

$onlis = intval($onlis); 
 
  if($cevap =="e")
  {
	$onlis = $onlis * 45/100;
  } 
    else
  { 
    $onlis = $onlis * 60/100;	
  }



@$saykatsayi = 3;
@$sozkatsayi = 0.6;
@$eakatsayi = 1.8;
@$obpkatsayi =0.6;

if($cevap == "e")
{
   @$obpkatsayi = 0.30;	
}
else
{
   @$obpkatsayi = 0.6;	
}


@$saydogru = intval($saydogru);
@$sayyanlis = intval($sayyanlis);
@$sozdogru = intval($sozdogru);
@$sozyanlis = intval($sozyanlis);

$saynet = $saydogru -($sayyanlis/4);
$soznet = $sozdogru -($sozyanlis/4);

@$sayek = intval($sayek);
@$sozek = intval($sozek);
@$eaek = intval($eaek);

$sayek = 250;
$sozek = 120;
$eaek = 222;

@$dgspuan = intval($dgspuan);
if($alan = "Sayısal")
{
  $dgspuan = ($saynet + $saykatsayi)+($soznet + $sozkatsayi)+($onlis + $obpkatsayi)+$sayek;
}
elseif($alan = "Sözel")
{
  $dgspuan = ($saynet + $saykatsayi)+($soznet + $sozkatsayi)+($onlis + $obpkatsayi)+$sozek; 
}
elseif($alan = "Eşit-Ağırlık")
{
  $dgspuan = ($saynet + $saykatsayi)+($soznet + $sozkatsayi)+($onlis + $obpkatsayi)+$eaek;
}

echo "Sayısal Testi Neti : $saynet<br>";
echo "Sözel Testi Neti : $soznet<br>";
echo "DGS Puanınız : $dgspuan";

}

if(isset($_POST['Temizle']))
{
	echo strip_tags($saynet);
	echo strip_tags($soznet);
	echo strip_tags($dgspuan);
}	



?>
