<?php

class Form {
	public static function champ($cfg) {
		$str =  '<p>';
		if(getType($cfg["label"])=='string')
			$str.='<label for="'.$cfg["name"].'">'.$cfg["label"].'</label>';
		$str.=$cfg["content"];
		$str.='</p>';
		return $str;
	}

	public static function input($cfg) {
		$cfg["content"] = '<input';
		foreach ($cfg as $key => $value) {
			if($key=='label')
				continue;
			$cfg["content"].=' '.$key.'="'.$value.'"';
		}
		$cfg["content"].='>';
		return Form::champ($cfg);
	}

	public static function select($cfg) {
		$cfg["content"] = '<select name="'.$cfg["name"].'">';
		foreach ($cfg["option"] as $v) {
			$cfg["content"].='<option value="'.$v["value"].'">'.$v["content"].'</option>';
		}
		$cfg["content"].='</select>';
		return Form::champ($cfg);
	}

	public static function text($cfg) {
		$cfg["type"] = "text";
		return Form::input($cfg);
	}

	public static function submit($cfg) {
		$cfg["label"] = FALSE;
		$cfg["type"] = "submit";
		return Form::input($cfg);
	}
}