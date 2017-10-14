<?php
header ( 'Content-Type:text/json;charset=utf-8' );
if (isset($_POST['province'])) {
	$data = array('广东'=>['area'=>17.97,
				         'people'=>10724,
				         'cities'=>['广州','深圳','东莞','揭阳']
				         ],
				   '广西'=>['area'=>23.67,
				         'people'=>5579,
				         'cities'=>["桂林","柳州","南通","常州"]
				         ],
				   '湖南'=>['area'=>21.18,
				         'people'=>6697,
				         'cities'=>["长沙","衡阳","邵阳","湘潭"]
				         ],
				   '河北'=>['area'=>18.88,
				         'people'=>7185,
				         'cities'=>["贵阳","遵义","安顺","同仁"]
				         ],
		);
	$province = $_POST['province'];
	if (array_key_exists($province, $data)) {
		$val = $data[$province];
		echo json_encode($val);
	}
}else {
	echo "error";
}
?>