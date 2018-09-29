<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SmartSE G5 IoT安否確認システム Result</title>
</head>
<link rel="stylesheet" type="text/css" href="dengon.css">
<body>
<h1>IoT安否確認システム</h1>
<h2>伝言検索</h2>
<h3>検索結果</h3>
<form name="form1" method="post" action="search.html">
<?php
    #日本語が読み込まれない場合に記述
    setlocale(LC_ALL,'ja_JP.UTF-8');

    $fname = isset($_POST['msn']) ? $_POST['msn'] : null;
    $name ='dengon100.csv';
    if ($fname == '08088'){
		$name='/home/pi/FTP/dengon.csv';
		#$name='dengon.csv';
	}else if($fname == '09099'){
		$name='dengon00.csv';
	}
    #csvファイルをオープン
    $fp = fopen($name,"r");
    ?>
    <table align="left">
    <tr>
    <td>電話</td>
    <td>名前</td>
    <td>メッセージ</td>
    <td>安否</td>
    <td>場所</td>
	<?php
    #fgetcsv関数がfalseを返却するまで実行
    while($data = fgetcsv($fp)){
    	?>
		</tr>
        <tr>
        <td><?php echo $data[3]; ?></td>
        <td><?php echo $data[4]; ?></td>
        <td><?php echo $data[5]; ?></td>
        <?php
        #安否情報
        $anpi='';
        if ($data[6] == '0'){
			$anpi='無事';
		}elseif ($data[6] == '1'){
			$anpi='軽傷';
		}elseif ($data[6] == '2'){
			$anpi='重症';
		}
		#避難場所
		$hinan='';
		if ($data[6] == '0'){
			$hinan='自宅';
		}elseif ($data[6] == '1'){
			$hinan='避難所';
		}elseif ($data[6] == '2'){
			$hinan='その他';
		}
		?>
        <td><?php echo $anpi; ?></td>
        <td><?php echo $hinan; ?></td>
        </tr>
	<?php
    }
    print "</table>";
    fclose($fp);
    ?>

</form>
<br>
<br>
<!--
<a href="javascript:document.form1.submit()" class="square_btn">戻る</a>
 -->
</BODY>
</HTML>