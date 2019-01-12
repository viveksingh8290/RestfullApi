<?php

function get_record($name)
{
	$student_record = array(
        "101" => array(
            "Id" => "101",
			"Name" => "Vivek",
			"Age" => "21",
			"Class" => "12th",
			"Roll_No" => "1",
			"DOB" => "24-01-1997",
			"Picture" => "img/one.jpg"
        ),
        "102" => array(
            "Id" => "102",
			"Name" => "Abhishek",
			"Age" => "18",
			"Class" => "10th",
			"Roll_No" => "2",
			"DOB" => "21-09-2000",
			"Picture" => "img/two.jpg"
        ),
        "103" => array(
            "Id" => "103",
			"Name" => "Rajesh",
			"Age" => "20",
			"Class" => "12th",
			"Roll_No" => "3",
			"DOB" => "06-04-1998",
			"Picture" => "img/three.jpg"
        ),
        "104" => array(
            "Id" => "104",
			"Name" => "Ayush",
			"Age" => "22",
			"Class" => "11th",
			"Roll_No" => "4",
			"DOB" => "14-11-1996",
			"Picture" => "img/four.jpg"
        )
	);

	if($name == 'all'){
		return $student_record;
	}else{
		return $student_record[$name];
	}
}

?>