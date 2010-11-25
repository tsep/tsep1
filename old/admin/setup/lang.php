<?php 
	require_once __DIR__.'/../../include/global.php'; 
	Security::protect(); 
	
	if(ae_detect_ie())
	header("Location:index.php?Step=next");
?>

<style type="text/css">
	td {
		text-align:center;
	}
</style>

<body>
<table cellpadding="10px" width="100%" height="100%" border="0">
  <tr>
    <td>&nbsp;   </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="en" colspan="3">Click To Begin</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3" class="es">Chasque para comenzar</td>
    <td class="fa" colspan="3">برای شنيدن آغاز به </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="de" colspan="5">Klicken Sie, um anzufangen</td>
    <td>&nbsp;</td>
    <td class="fi" colspan="3">Valitkaa se aloittaa </td>
  </tr>
  <tr>
    <td class="it" colspan="3">Scatti per cominciare </td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;   </td>
    <td class="nl" colspan="2">Klik om te beginnen </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="ar">طقطقت أن يبدأ </td>
    <td>&nbsp;</td>
    <td colspan="3" rowspan="2"><h1>TSEP</h1></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="sv">Klicka för att börja </td>
  </tr>
  <tr>
    <td class="fr" colspan="3">Cliquez pour commencer</td>
    <td>&nbsp;</td>
    <td class="tr">Için Tıklayın Başladı </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="ja">始まるためにかちりと鳴らしなさい </td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td class="no" colspan="2">Klikk for å begynne</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="hu" colspan="4">Kattintson ide kezdődik</td>
    <td colspan="2">&nbsp;</td>
    <td class="pt">Estale para começar </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="ru" colspan="3">Щелкните для того чтобы начать </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td class="zh">点击开始 </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

