
function __autoload($class)
{
	include_once './classes/'.$class.'.php';
}

/*optional parameter*/
$keywordFiles=['subjectFile'=>__DIR__."/keywords files/subject.txt",'categoryFile'=>__DIR__."/keywords files/category.txt",'level1File'=>__DIR__."/keywords files/key1.txt",'level2File'=>__DIR__."/keywords files/key2.txt",'level3File'=>__DIR__."/keywords files/key3.txt"];

/*required parameter*/
$post="If any one has filed for a retake in nmat, can you please please check if there are dates available in chandigarh from 11 to 16 or in Lucknow? Please. Ex";

//create obj
$ob=new KeywordFetcher;

/*
 *for single post 
 *all levels keywords will be returned
 *output :: array('subject'=>array(),'category'=>array(),level1'=>array(),'level2'=>array()',level3'=>array())
 */

$keywords=$ob->fetchKeywords($post,$keywordFiles); 
/*
- alternate way to do this
  $keywords=$ob->fetchKeywords($post); 
*/

print_r($keywords);


//for multi post or on table
$ob->multiFetchKeywords($keywordFiles);
/*
- alternate way to do this
  $keywords=$ob->fetchKeywords(); 
*/
