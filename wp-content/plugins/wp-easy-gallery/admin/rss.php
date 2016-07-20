<?php
$url = "http://labs.hahncreativegroup.com/feed/";
$default = '<h3>Visit <a href="http://labs.hahncreativegroup.com" target="_blank">http://labs.hahncreativegroup.com</a> for news and info</h3>';

try {
	$rss = simplexml_load_file($url);
	if($rss)
	{
		echo '<h3>'.$rss->channel->title.'</h3>';
		$items = $rss->channel->item;
		$count = 0;
		foreach($items as $item)
		{
			$count++;	
			$title = $item->title;
			$link = $item->link;
			$published_on = $item->pubDate;
			$description = $item->description;
			echo '<h4><a href="'.$link.'">'.$title.'</a></h4>';
			echo '<p>'.$description.'</p>';
			if ($count >= 3) {
				break;	
			}
		}
	} else {
		echo $default;
	}
}
catch(Exception $e) {
	echo $default;
}
?>