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

function addToFeed($pageToAdd) {
    if (!$pageToAdd->isDraft() && $pageToAdd->template() == 'projet') {
        $pageId = $pageToAdd->id();
        $feeds = ['feedhome', 'feedspaces', 'feedcollections', 'feedlaboratory'];
        $feedsTrue = [];

        foreach ($feeds as $feed) {
            if (strpos($pageToAdd->$feed(), 'true') !== false) {
                $feed_a = str_replace('feed', '', $feed);
                $feed_b = str_replace('home', 'all', $feed_a);
                array_push($feedsTrue, $feed_b);
            }
        }

        foreach ($feedsTrue as $f) {
            $p = $pageToAdd->site()->find($f);
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