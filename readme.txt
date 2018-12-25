

	
	
	WORKING DEMO AVAILABLE AT :  https://bit.ly/2Sjy9Lf





---------------------------------------------------------------------------------------------------------------------------------------
=========================
  Project description
=========================

the project titled "KeywordFetcher" works as an backend application developed with PHP & Mysql. It was developed to identify the useful keyword of information from the queries posted by the user on admito website. the useful information here means the info. like college names, cuttoff marks, reviews of colleges etc. the queries are analysed by the application in the backend and the identified output is update on the database. 
this information is a the features of the project are as follows :- 
1. identify keywords in post (string)
2. identify keywords with post id in table
3. identify keywords in whole table and save the result to db

to perform search on query it uses TRIE data structure. there are 6 text files that are used for different purposes like level3 is used to build trie & trie is saved into trie.txt to save time of rebuilding it if other files have not been changed, and other 4 used to find the exact keyword in normal form and trie_mt.txt file is used to store the last modified time of the trie.txt everytime it is checked and if it changes than new trie is computed otherwise old trie is read from trie.txt file.
 
working demo is available here :  https://bit.ly/2Sjy9Lf







===============================
     Code Discription
===============================


function __autoload($class)
{
	include_once './classes/'.$class.'.php';
}

/*optional parameter*/
$keywordFiles=['subjectFile'=>__DIR__."/keywords files/subject.txt",'categoryFile'=>__DIR__."/keywords files/category.txt",'level1File'=>__DIR__."/keywords files/key1.txt",'level2File'=>__DIR__."/keywords files/key2.txt",'level3File'=>__DIR__."/keywords files/key3.txt"];

/*required parameter*/
$post="If any one has filed for a retake in nmat, can you please please check if there indian institute of management, indore are dates available in chandigarh from 11 to girls hostels 16 faculty of management studies, university of delhi, delhi or in Lucknow? Please. Ex department of management studies, indian institute of technology delhi";

$ob=new KeywordFetcher;
/*
 *for single post 
 *all levels keywords will be returned
 *output :: array('subject'=>array(),'category'=>array(),level1'=>array(),'level2'=>array()',level3'=>array())
 */
// $keywords=$ob->fetchKeywords($post,$keywordFiles); 
/*
- alternate way
  $keywords=$ob->fetchKeywords($keywordFiles,$post); 
*/
// print_r($keywords);


// fetching by post id's
// $keywordFiles is optional
$postId=3000089;
// $ob->FetchKeywordsById($postId,$keywordFiles);
/*
* to get keywords 
* $keywords = $ob->FetchKeywordsById($postId,true,$keywordFiles);
*/ 
print_r($ob->FetchKeywordsById(array(3000004,3000089),true,$keywordFiles));

// // or
// $postIdArray[3330,34351,3252352];
// $ob->FetchKeywordsById($postIdArray,$keywordFiles);


//for multi post or on table
// $ob->multiFetchKeywords($keywordFiles);
