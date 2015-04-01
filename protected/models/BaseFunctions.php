<?php  

class BaseFunctions{
	/**
	 * Return Icon syntax
	 *
	 * @return void
	 * @author haezal musa
	 **/
	public static function icon($value="")
	{
		return "<span class='glyphicon glyphicon-".$value."'></span>";
	}

	/**
	 * Get total branchs by brand id
	 *
	 * @return integer
	 * @author haezal
	 **/
	public static function totalBranchs($id)
	{
		$branchs=Branchs::model()->findAllByAttributes(array('brand_id'=>$id));
		return count($branchs);
	}
}
?>