<?php
echo '投票程序';
echo "<br />";

// 链接数据库  地址  用户  密码  数据库名
// vote表 三个字段  id, text 文字, vote 票数
$conn = new mysqli('localhost', 'root', '', 'test');
$conn->set_charset('utf8');


// 表单POST数据
if (!empty($_POST)) {
	echo "POST的数据为";
	print_r($_POST);

	$id = $_POST['vote'];
	// 票数加一
	$conn->query('update vote set vote = vote + 1 where id = ' . $id);

	echo "<br />投票成功";
}

//  显示表单
echo
<<<EOF
	<form method="post">
		<div>
		<label for="op1">选择一</label>
		<input type="radio" name="vote" id="op1" value="1">
		</div>
		<div>
		<label for="op2">选择二</label>
		<input type="radio" name="vote" id="op2" value="2">
		</div>
		<div>
		<label for="op3">选择三</label>
		<input type="radio" name="vote" id="op3" value="3">
		</div>
		<div>
		<label for="op4">选择四</label>
		<input type="radio" name="vote" id="op4" value="4">
		</div>
		<div>

		<input type="submit" value="提交">

		</div>

	</form>
EOF;

// 显示数据

$result = $conn->query('select * from vote');
$datas = $result->fetch_all(MYSQLI_ASSOC);

foreach ($datas as $data) {
	echo $data['text'] . "\t" . $data['vote'] . "<br />";
}

$conn->close();

