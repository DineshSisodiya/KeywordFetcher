<?php

function __autoload($class)
{
	include_once './classes/'.$class.'.php';
}

/*optional parameter*/
$keywordFiles=['subjectFile'=>__DIR__."/keywords files/subject.txt",'categoryFile'=>__DIR__."/keywords files/category.txt",'level1File'=>__DIR__."/keywords files/key1.txt",'level2File'=>__DIR__."/keywords files/key2.txt",'level3File'=>__DIR__."/keywords files/key3.txt"];

/*required parameter*/
$post="If any one has filed for a retake in nmat, can you please please check if there indian institute of management, indore are dates available in chandigarh from 11 to girls hostels 16 faculty of management studies, university of delhi, delhi or in Lucknow? Please. Ex department of management studies, indian institute of technology delhi,";

$ob=new KeywordFetcher;
/*
 *for single post 
 *all levels keywords will be returned
 *output :: array('subject'=>array(),'category'=>array(),level1'=>array(),'level2'=>array()',level3'=>array())
 */
$keywords=$ob->fetchKeywords($post); 
/*
*  alternate way
*  $keywords=$ob->fetchKeywords($post,$keywordFiles); 
*/
print_r($keywords);


// // fetching by post id's
// // $keywordFiles is optional
// $postId=3000089;
// $ob->FetchKeywordsById($postId,$keywordFiles);
/*
* to get keywords 
* $keywords = $ob->FetchKeywordsById($postId,true,$keywordFiles);
*/ 
// //print_r($ob->FetchKeywordsById(array(3000004,3000089),true,$keywordFiles));
// // or
// $postIdArray[3330,34351,3252352];
// $ob->FetchKeywordsById($postIdArray,$keywordFiles);


//for multi post or on table
// $ob->multiFetchKeywords($keywordFiles);

?>