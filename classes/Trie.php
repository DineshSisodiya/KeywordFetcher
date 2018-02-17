<?php
/**
 * this class is node of trie data structure 
 * $isWord = bool
 * $child = []
 */
class TrieNode {
    public $isWord=false;
    public $child=array();
}
 
/**
 * this class contains the parent of trie tree
 * $root : Object
 * functions add($str), search($str)
 */
class Trie
{
	private $root=null;
	function __construct()
	{
		$this->root=new TrieNode;
	}
	/**
	 *
	 *@param $str : String
	 *@return true if added else false
	 */
	function add($str)
	{

		$str=strtolower($str);//avoid case sensitivity
		$ignore_chars=['.','&','!','@','-','_','`','~','#','$','*','(',')','+','-','/','\\','|','{','}','[',']','"','<','>','?'];
		
		$str_len=strlen($str);
		if($this->root!=null)
		{
			$temp=&$this->root;
			for($i=0;$i<$str_len;$i++) 
			{
				if (in_array($str[$i], $ignore_chars)) {
					continue;
				}
				if (array_key_exists($str[$i],$temp->child)) 
				{
					$temp=&$temp->child[$str[$i]];	
				}
				else 
				{
					$temp->child[$str[$i]]=new TrieNode;
					$temp=&$temp->child[$str[$i]];
				}
			}
			$temp->isWord=true;

			/* $str add status */
    		return true;
		} 
		else
		{
			/* $str add status */
			return false;
		}
	}

	/**
	 *
	 *@param $str : String
	 *@return true if found else false
	 */
	function search($str)
	{
		$status=array(0,false);
		$flag=false;
		$str=trim($str);
		$str_len=strlen($str);
		$count=0;
		$temp=&$this->root;
		for($i=0;$i<$str_len;$i++) 
		{
			if (array_key_exists($str[$i],$temp->child)) 
			{
				$temp=&$temp->child[$str[$i]];	
				++$count;
			}
			else
				break;
		}
		if ($i==$str_len&&$temp->isWord==true) 
		{
			$status[0]=$count;
			$status[1]=true;
			return $status;
		} 
		else 
		{
			$status[0]=$count;
			return $status;
		}
	}
}

// $ob=new Trie;
// $ob->add('indian institute of management, ahmedabad');
// $ob->add('iima');
// $ob->add('faculty of management studies, university of delhi, delhi');
// $ob->add('faculty of management studies');
//$status=$ob->search('faculty of management studies');


// $post="faculty of management studies , delhi fms iimb sir i want to get iima iim admition in but i have a poor academic score in 2 i have 46% marks only and in graduation i have 51 % and in 10th i have 78 % so sir how can i now strengthen this weakness on mine while in pi i shouldn&#39t face much difficulty plz give some useful tips #gdpi18";
// $kwArray=array();
// $len=strlen($post);
// $temp_str='';
// $k=0;

// for ($i=0; $i<$len; $i++) { 
// 			if($post[$i]==' ') {
// 				$status=$ob->search($temp_str);
// 				if ($status[1]) {
// 					$kwArray[$k++]=$temp_str;
// 					$temp_str='';
// 					print_r($kwArray);
// 				} 
// 				else if($status[0]==strlen($temp_str)) {
// 					//echo '<br>'.$temp_str.'<br>';
// 					$temp_str .= $post[$i];
// 				}
// 				else {
// 					$temp_str='';
// 				}
// 			} 
// 			else {
// 				$temp_str .= $post[$i];
// 			}
// 		}



//for checking execution time of the script
// $time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
// echo "Process Time: {$time}";
?>