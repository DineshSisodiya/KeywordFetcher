<?php
// error_reporting(0);


/**
  *@function fetchKeywords($file1,$file2,$file3)
  */
class KeywordFetcher
{
	/**
	  *@param $post - String, $trieObj - Object
	  *@return $kwArray - String (contains keywords matched)
	  */
	private function extractKW($post,$trieObj) {
		$ignore_chars=['.','&','!','@','-','_','`','~','#','$','*','(',')','+','-','/','\\','|','{','}','[',']','"','<','>','?'];
		$ignore_chars_pos=array();
		$post=strtolower($post.' ');//avoid case sensitivity
		$kwArray=array();
		$len=strlen($post);
		$temp_str='';
		$temp_pre='';
		$orig_kw='';
		$k=0;
		$p=0;
		for ($i=0; $i<$len; $i++) {
			$status=null; 
			if($post[$i]==' '||$post[$i]=='\n') {
				$temp_pre_status=false;
				if (strlen($temp_pre)>0) {
					$status=$trieObj->search($temp_pre.' '.$temp_str);
					if ($status[1]) {
						$temp_pre_status=true;
					}
					else if ($status[0]==strlen($temp_pre.' '.$temp_str)) {
						$temp_pre.= ' '.$temp_str;
						$temp_pre_status=true;
					}
					else {
						$temp_pre_status=false;
						$temp_pre='';
					}
				} 
				if (!$temp_pre_status) {
					$status=$trieObj->search($temp_str);
				}
				if ($status[1]) {
					$kwArray[$k++]=$temp_pre.' '.$temp_str;
					$temp_pre=$temp_pre.' '.$temp_str;
				} 
				else if ($status[0]==strlen($temp_str)) {	
					$temp_pre=$temp_str;//last matched keyword
				}
				$temp_str='';
			} 
			else {
				if (!in_array($post[$i], $ignore_chars)) {
					$temp_str.=$post[$i];
				} 
				else {
					$ignore_chars_pos[$p++]=$i;
				}
			}
		}
		return array_unique($kwArray);
	}
	/**
	* @param $kwfiles - array,$multiPost - bool,$postCont - string 
	* @return $keywords - array
	*/
	public function fetchKeywords($postCont,$kwfiles=null)
	{
		try{
			if(empty($kwfiles)) {
				$kwfiles=['subjectFile'=>__DIR__."/keywords files/subject.txt",'categoryFile'=>__DIR__."/keywords files/category.txt",'level1File'=>__DIR__."/keywords files/key1.txt",'level2File'=>__DIR__."/keywords files/key2.txt",'level3File'=>__DIR__."/keywords files/key3.txt"];
			}

			$level3_kw=file($kwfiles['level3File'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			if(!$level3_kw)
				throw new Exception("Keyword file for level-3 may be missing or not readable");
			
			$trieObj=new Trie;
			$keywords=['subject'=>array(),'category'=>array(),'level1'=>array(),'level2'=>array(),'level3'=>array()];
			$total_kw=count($level3_kw);
			for ($i=0; $i < $total_kw; $i++) { 
				$level3_kw[$i]=strtolower(trim($level3_kw[$i])); //avoid case sensitivity
				$trieObj->add(trim($level3_kw[$i]));
			}

			$keywords['level3']=array_values($this->extractKW($postCont,$trieObj));

			//finding the column of keyword 
			$col_kw=array();
			$col_no=0;
			foreach ($keywords['level3'] as $key=>$val) {
				$found=array_search(trim($val), $level3_kw);
				if($found) {
					$col_kw[$col_no++]=$found;
				}
			}

			$level2_kw=file($kwfiles['level2File'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			if(!$level2_kw)
				throw new Exception("Keyword file for level-2 may be missing or not readable");
			foreach($col_kw as $key=>$val)
			{
				array_push($keywords['level2'],$level2_kw[$val]);
			}

			$level1_kw=file($kwfiles['level1File'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			if(!$level1_kw)
				throw new Exception("Keyword file for level-1 may be missing or not readable");
			foreach($col_kw as $key=>$val)
			{
				array_push($keywords['level1'],$level1_kw[$val]);
			}

			$category_kw=file($kwfiles['categoryFile'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			if(!$category_kw)
				throw new Exception("Keyword file for category may be missing or not readable");
			foreach($col_kw as $key=>$val)
			{
				array_push($keywords['category'],$category_kw[$val]);
			}

			$subject_kw=file($kwfiles['subjectFile'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			if(!$subject_kw)
				throw new Exception("Keyword file for subject may be missing or not readable");
			foreach($col_kw as $key=>$val)
			{
				array_push($keywords['subject'],$subject_kw[$val]);
			}
			return $keywords;

		} catch (Exception $fileExp) {
			echo "Error: ".$fileExp->getMessage();
		}
	}
	public function multiFetchKeywords($kwfiles=null) 
	{
		try{
			ini_set('max_execution_time', 120);
			$DB=new DBconfig();
			$con=$DB->connect();

			$query="SELECT `id`,`query` FROM `admito_posts`";
			$result=$con->query($query);
			
			if (!$result) {
				throw new Exception("Server is busy", 1);
			}

			$update_failed=array();
			while ($post=mysqli_fetch_assoc($result)) {
				$keywords=$this->fetchKeywords($post['query'],$kwfiles);
				$total_kw=count($keywords['level3']);
				// update keywords in table
				for($i=0;$i<$total_kw;$i++) 
				{
					$query='INSERT INTO `keywords` (`pid`, `subject`, `category`, `level1`, `level2`, `level3`) values('.$post["id"].',"'.$keywords['subject'][$i].'","'.$keywords['category'][$i].'","'.$keywords['level1'][$i].'","'.$keywords['level2'][$i].'","'.$keywords['level3'][$i].'")';
					
					if(!$con->query($query))
					{
						array_push($update_failed,$post["id"]);
					}
				}
			}
			$DB->close(); // close connection
		} catch (Exception $Exp) {
			echo "Error: ".$Exp->getMessage();
		}
		if(empty($update_failed))
		{
			return true;
		}
		else
		{
			return $update_failed;
		}
	}
	
}

?>