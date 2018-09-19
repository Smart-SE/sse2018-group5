<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8)">
<title>Sample</title>
</head>
<h1>IoT安否確認システム</h1>
<?php

//
// サイトＡ用（ラズパイＡ拠点用）
//

header('Content-Type: text/html; charset=UTF-8');

   //取得した値を変数に代入
   $tel   = $_POST['tel'];
   $name  = $_POST['name'];
   $msg   = $_POST['msg'];
   $anpi  = $_POST['anpi'];
   $basho = $_POST['basho'];

   if($tel == NULL || $name == NULL || $msg == NULL || $basho == NULL || $anpi == NULL){
       print '入力されていない項目があります。';
       echo '<a href="index.html">戻る</a>';

   }else{
   	   echo '<h2>以下のリンクからデータ登録が完了させてください。</h2>';
   	   echo '<a href="dengon00.csv">入力データの保管</a>';

       //CSVファイルに書き込むデータの準備
       $data = '電話番号,名前,メッセージ,安否,場所';  //列のタイトル
       $data .= "\n";
       $data .= $tel;
       $data .= ',';
       $data .= $name;
       $data .= ',';
       $data .= $msg;
       $data .= ',';
       $data .= $anpi;
       $data .= ',';
       $data .= $basho;
	   $data .= "\n";
   }

       $file = fopen('./dengon00.csv', 'w');
       fputs($file, $data);
       fclose($file);
?>

</form>

</body>
</html>