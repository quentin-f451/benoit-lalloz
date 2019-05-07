<?php

function chunkArray($field, $randomized = 'true', $number) {
    if ($randomized) {
        $retVal = []; 
        while (!empty($field)) { 
            $retVal[] = array_splice($field, 0, rand(3,5)); 
        } 
        return $retVal;
    } else {
        array_chunk($field, $number);
    }
};

function tagslug($text) {
	$text = str_replace('&', '-and-', $text);
	$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	$text = trim($text, '-');
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	$text = strtolower($text);
	$text = preg_replace('~[^-\w]+~', '', $text);
	if (empty($text)){
		return 'n-a';
	}
	return $text;
};

function addToFeed($pageToAdd) {
    if (!$pageToAdd->isDraft() && $pageToAdd->template() == 'projet') {
        $pageId = $pageToAdd->id();
        $p = $pageToAdd->site();
        $content = $p->feeds();
        $current = $content->split('- ');
        $trimmedCurrent = array_map('trim', $current);
        if (!in_array($pageId, $trimmedCurrent)) {
            $newContent = $content . "\r\n- " . $pageId;
            $p->update([
                'feeds' => $newContent
            ]);
        }
    }
}

function captionCollection($projet, $ifTitleInCollection) {
    if ($ifTitleInCollection) {
        return 'In ' . $projet->collection() . ' collection, ' . $projet->titleInCollection();
    } else {
        return 'In ' . $projet->collection() . ' collection, ' . $projet->title();
    }
}

function captionSpaces($projet) {
    return 'Spaces for ' . $projet->client() . ' in ' . $projet->lieu();
}

function captionLab($projet) {
    return 'From our Laboratory, watch ' . $projet->title();
}