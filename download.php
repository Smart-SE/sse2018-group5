<?php

downloadCsv();

function downloadCsv() {

	try {

		//取得した値を変数に代入
		$tel   = $_POST['tel'];
		$name  = $_POST['name'];
		$msg   = $_POST['msg'];
		$anpi  = $_POST['anpi'];
		$basho = $_POST['basho'];

		//CSVファイルに書き込むデータの準備
		//$data = 'コード,No,登録日時,電話番号,名前,メッセージ,安否,場所';  //列のタイトル
		//$data .= "\n";
		$data .= '2';
		$data .= ',';
		$data .= '1';
		$data .= ',';
		$data .= '20180924090000';
		$data .= ',';
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

		//CSV形式で情報をファイルに出力のための準備
		$csvFileName = './dengon00.csv';
		$res = fopen($csvFileName, 'a');
		if ($res === FALSE) {
			throw new Exception('ファイルの書き込みに失敗しました。');
		}
		fputs($res, $data);
		fclose($res);
		// ダウンロード開始
		header('Content-Type: application/octet-stream');
		// ここで渡されるファイルがダウンロード時のファイル名になる
		header('Content-Disposition: attachment; filename=dengon00.csv');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize($csvFileName));
		readfile($csvFileName);

	} catch(Exception $e) {

		// 例外処理をここに書きます
		echo $e->getMessage();

	}
}