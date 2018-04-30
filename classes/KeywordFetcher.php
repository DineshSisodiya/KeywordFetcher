<?php
// error_reporting(0);


class KeywordFetcher
{
	/**
	  *@param $post - String, $trieObj - Object
	  *@return $kwArray - int (contains column num. of matched keywords)
	  */
	private function extractKW($post,$trieObj) {
		$ignore_chars=[',','.','&','!','@','-','_','`','~','#','$','*','(',')','+','-','/','\\','|','{','}','[',']','"','<','>','?'];
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
					$kwArray[$k++]=trim($status[2]);
					//$kwArray[$k++]=trim($temp_pre.' '.$temp_str);
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
				$kwfiles=['clgIdFile'=>"./keywords files/clgId.txt",'subjectFile'=>"./keywords files/subject.txt",'categoryFile'=>"./keywords files/category.txt",'level1File'=>"./keywords files/key1.txt",'level2File'=>"./keywords files/key2.txt",'level3File'=>"./keywords files/key3.txt"];
			}
			 
			$level3_kw=file($kwfiles['level3File'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			if(!$level3_kw)
				throw new Exception("Keyword file for level-3 may be missing or not readable");

			// check if trie file is modified
			$trie_mtime_file=fopen("./keywords files/trie_mt.txt",'r');
			$trie_mtime=null;
			if (!$trie_mtime_file) {
				$trie_mtime_file=fopen('./keywords files/trie_mt.txt','w');
			}
			else {
				$trie_mtime=fgets($trie_mtime_file);
			}
			fclose($trie_mtime_file);

			$trieObj=null;
			$trie_mtime_new=filemtime($kwfiles['level3File']);
			if ($trie_mtime_new==$trie_mtime) {
				// no need to compute trie again
				$trieCont=file_get_contents('./keywords files/trie.txt');
				$trieObj=unserialize($trieCont);
				unset($trieCont);
				unset($trie_mtime);
				unset($trie_mtime_new);
			}
			else {
				// compute trie again
				$trieObj=new Trie;
				$total_kw=count($level3_kw);
				for ($i=0; $i < $total_kw; $i++) { 
					$level3_kw[$i]=strtolower(trim($level3_kw[$i])); //avoid case sensitivity
					$trieObj->add(trim($level3_kw[$i]),$i);
				}
				unset($total_kw);

				// write trie to trie.txt again
				$trieFile=fopen("./keywords files/trie.txt", 'w');
				$trieFileCont=serialize($trieObj);
				fwrite($trieFile, $trieFileCont);
				fclose($trieFile);
				unset($trieFileCont);
				// write new modified time
				file_put_contents('./keywords files/trie_mt.txt', $trie_mtime_new);
				unset($trie_mtime_new);
			}

			$keywords=['isClg'=>array(),'clgId'=>array(),'subject'=>array(),'category'=>array(),'level1'=>array(),'level2'=>array(),'level3'=>array()];

			$level2_kw=file($kwfiles['level2File'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			if(!$level2_kw)
				throw new Exception("Keyword file for level-2 may be missing or not readable");
			$level1_kw=file($kwfiles['level1File'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			if(!$level1_kw)
				throw new Exception("Keyword file for level-1 may be missing or not readable");
			$category_kw=file($kwfiles['categoryFile'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			if(!$category_kw)
				throw new Exception("Keyword file for category may be missing or not readable");
			$subject_kw=file($kwfiles['subjectFile'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			if(!$subject_kw)
				throw new Exception("Keyword file for subject may be missing or not readable");
			$clgId_file=file($kwfiles['clgIdFile'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			if(!$clgId_file)
				throw new Exception("clgId file may be missing or not readable");

			$level3_kw_col=array_values($this->extractKW($postCont,$trieObj));

			foreach ($level3_kw_col as $key=>$val) {
				array_push($keywords['level3'],$level3_kw[$val]);
				array_push($keywords['level2'],$level2_kw[$val]);
				array_push($keywords['level1'],$level1_kw[$val]);
				array_push($keywords['category'],$category_kw[$val]);
			 	array_push($keywords['subject'],$subject_kw[$val]);
			 	if($category_kw[$val]=='collegen') {
			 		array_push($keywords['isClg'],1);
				 	array_push($keywords['clgId'],$clgId_file[$val]);
			 	} else {
			 		array_push($keywords['isClg'],0);
			 		array_push($keywords['clgId'],'NA');
			 	}
			}
			
			return $keywords;

		} catch (Exception $fileExp) {
			echo "Error: ".$fileExp->getMessage();
		}
	}

	/**
	* @param $kwfiles - array (optional)
	* @return nothing, directly updates in DB
	*/
	public function multiFetchKeywords($kwfiles=null) 
	{
		try{
			ini_set('max_execution_time', 300);
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
					$query='INSERT INTO `keywords` (`isClg`,`clgId`,`pid`, `subject`, `category`, `level1`, `level2`, `level3`) values("'.$keywords['isClg'][$i].'","'.$keywords['clgId'][$i].'",'.$post["id"].',"'.$keywords['subject'][$i].'","'.$keywords['category'][$i].'","'.$keywords['level1'][$i].'","'.$keywords['level2'][$i].'","'.$keywords['level3'][$i].'")';
					
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

	/**
	* @param $id - integer 
	* @return $post - string
	*/
	private function getPost($id) {
			$DB=new DBconfig();
			$con=$DB->connect();

			$query="SELECT `query` FROM `admito_posts` WHERE `id`=$id";
			$result=$con->query($query);
			
			if (!$result) {
				throw new Exception("Server is busy", 1);
			}
			else {
				$post=mysqli_fetch_assoc($result);
				return $post;
			}
	}
	/**
	* @param $id - integer, $keywords - array
	* @return bool, true on success
	*/
	private function updateKeywords($id,$keywords) {
			$DB=new DBconfig();
			$con=$DB->connect();
			$update_failed=array();
			$fail=0;
			$total_kw=count($keywords['level3']);
			for($i=0;$i<$total_kw;$i++) 
			{
					$query='INSERT INTO `keywords` (`pid`, `subject`, `category`, `level1`, `level2`, `level3`) values('.$id.',"'.$keywords['subject'][$i].'","'.$keywords['category'][$i].'","'.$keywords['level1'][$i].'","'.$keywords['level2'][$i].'","'.$keywords['level3'][$i].'")';
					if(!$con->query($query))
					{
						$fail=1;
					}
			}
			
			if ($fail) {
				return false;
			}
			else 
				return true;
	}
	/**
	* @param $pid - can be array or integer(required), 
	*		 $kwfiles - array (optional)
	*		 $get_kw - bool (optional)
	* @return bool - false on failure 
	*			   - true, if $get_kw=false on success
	*			   - $keywords, if $get_kw=true on success
	*/
	public function FetchKeywordsById($pid,$get_kw=false,$kwfiles=null)
	{
		if (!is_array($pid)) {
			$post = $this->getPost($pid);
			$keywords = $this->fetchKeywords($post['query'],$kwfiles);
			
			// print_r($keywords);
			$upd_status=$this->updateKeywords($pid,$keywords);
			if($upd_status==true&&$get_kw==true) {
				return $keywords;
			}
			else if($upd_status==true&&$get_kw==false) {
				return true;
			}
			else {
				return false;
			}
		}
		else
		{
			$upd_status=true;
			$kw_array=array();
			foreach ($pid as $key => $id) {
				$post = $this->getPost($id);
				$keywords = $this->fetchKeywords($post['query'],$kwfiles);
				array_push($kw_array,$keywords);
				if(!$this->updateKeywords($id,$keywords)) {
					$upd_status=false;
				}
			}
			if($upd_status==true&&$get_kw==true) {
					return $kw_array;
			}
			else if($upd_status==true&&$get_kw==false) {
				return true;
			}
			else {
				return false;
			}
		}
	}
	
}

?>