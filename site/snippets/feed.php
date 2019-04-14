<?php
	$rowCount = 0;
    $allProjects = array(); 
    $pageId = $page->id();
    if ($pageId == 'all') $pageId = 'home';
    $feedId = 'feed' . $pageId;	
    $projects = $page->feeds()->toPages(); // Path to medias

	// Loop through medias
    foreach ($projects as $project):
        $coverType = $feedId . 'type';
        $coverVimeo = $feedId . 'vimeo';
        $coverImage = $feedId . 'image';
		$cover = $project->$coverType() == 'false' ? 'image' : 'video';
		
		$pageLink = $project->url();
		$pageLegende = $project->legendeAuto()->toCaption($pageId);
		$pageNum = $projects->indexOf($project);
		$pageStatus = $project->status();

        if ($cover == 'image') {
            $media = $project->$coverImage()->toFile();

            // Set variables
            $mediaSrcXSmall = $media->thumb('xsmall')->url();
            $mediaSrcSmall = $media->thumb('small')->url();
            $mediaSrcMedium = $media->thumb('medium')->url();
            $mediaSrcLarge = $media->thumb('large')->url();
            $mediaSrcXLarge = $media->thumb('xlarge')->url();

            $mediaOrientation = $media->dimensions()->orientation();
            $mediaRatio = $media->dimensions()->ratio();

            // Assign variables to array
            if( !array_key_exists($pageNum, $allProjects)):
                $allProjects[$pageNum] = array(
					'type'			=> (string) $cover,
                    'srcXSmall'		=> (string) $mediaSrcXSmall,
                    'srcSmall'		=> (string) $mediaSrcSmall,
                    'srcMedium'		=> (string) $mediaSrcMedium,
                    'srcLarge'		=> (string) $mediaSrcLarge,
                    'srcXLarge'		=> (string) $mediaSrcXLarge,
                    'ratio'			=> (string) $mediaRatio,
                    'orientation'	=> (string) $mediaOrientation,
                    'caption'		=> (string) $pageLegende,
                    'id'			=> (string) $pageNum,
					'url'			=> (string) $pageLink,
					'status'		=> (string) $pageStatus
                );
            endif;
        } else {
			$media = $project->$coverVimeo();
			$mediaOrientation = 'landscape';
			$mediaRatio = 1.77777;
			$medias = array();
			$gallery = $project->files()->template('galerie');

			foreach ($gallery as $m) {
				$mediaSrcXSmall = $m->thumb('xsmall')->url();
				$mediaSrcSmall = $m->thumb('small')->url();
				$mediaSrcMedium = $m->thumb('medium')->url();
				$mediaSrcLarge = $m->thumb('large')->url();
				$mediaSrcXLarge = $m->thumb('xlarge')->url();
				$mediaNum = $gallery->indexOf($m);
				if( !array_key_exists($mediaNum, $medias)):
					$medias[$mediaNum] = array(
						'srcXSmall'		=> (string) $mediaSrcXSmall,
						'srcSmall'		=> (string) $mediaSrcSmall,
						'srcMedium'		=> (string) $mediaSrcMedium,
						'srcLarge'		=> (string) $mediaSrcLarge,
						'srcXLarge'		=> (string) $mediaSrcXLarge
					);
				endif;
			}

			// Assign variables to array
            if( !array_key_exists($pageNum, $allProjects)):
                $allProjects[$pageNum] = array(
					'type'			=> (string) $cover,
                    'ratio'			=> (string) $mediaRatio,
					'orientation'	=> (string) $mediaOrientation,
                    'caption'		=> (string) $pageLegende,
                    'id'			=> (string) $pageNum,
					'url'			=> (string) $pageLink,
					'vimeo'			=> (string) $media,
					'medias'		=> (array) $medias,
					'status'		=> (string) $pageStatus
                );
            endif;
		}
    endforeach;	
    
    if ($pageId == 'home') 
        $rows = chunkArray($allProjects, true, null);
    else if ($pageId == 'spaces') 
		$rows = chunkArray($allProjects, false, 3);
	else if ($pageId == 'collections') 
		$rows = chunkArray($allProjects, false, 4);
    else if ($pageId == 'laboratory')  
        $rows = chunkArray($allProjects, false, 2);
        
    if (count($rows) < 1)
        $rows = array($allProjects);

?>

<section class="grid grid--home">

    <?php 
	foreach ($rows as $row): 

		// Create randomized columnization
		$totalNumberofColumns = 120;
		$difference = 3;
		$widthsOfImages = array();
		$randomizedWidths = array();
		$u = 0;

		foreach ($row as $projetSlug => $projetArray):
			array_push($widthsOfImages, $projetArray['ratio']);
		endforeach;

		$sumOfWidths = array_sum($widthsOfImages);
		$categorieColumns = 3;

		foreach ($row as $projetSlug => $projetArray):
			$ratioInRow = $projetArray['ratio'] / $sumOfWidths;
			$columnInRow = $totalNumberofColumns * $ratioInRow;
			if ($columnInRow == $totalNumberofColumns) {
				$randomizedColumnInRow = rand($columnInRow / $categorieColumns - $difference, $columnInRow / $categorieColumns + $difference);
			} else {
				$randomizedColumnInRow = rand($columnInRow - $difference, $columnInRow + $difference);
				while (in_array($randomizedColumnInRow, $randomizedWidths)){
					$randomizedColumnInRow = rand($columnInRow - $difference, $columnInRow + $difference);
				}
			}
			array_push($randomizedWidths, $randomizedColumnInRow);
		endforeach;

		$sumOfRandomizedWidths = array_sum($randomizedWidths);
		$u = $sumOfRandomizedWidths;
		$rowLength = count($randomizedWidths) - 1;

		if ($rowLength > 0) {
			if ($u > $totalNumberofColumns) {
				$i = 0;
				while ($u > $totalNumberofColumns) {
					$randomizedWidths[$i]--;
					$u--;
					if ($i < $rowLength) { $i++; } else { $i = 0; }
				}
			} else if ($u < $totalNumberofColumns) {
				$i = 0;
				while ($u < $totalNumberofColumns) {
					$randomizedWidths[$i]++;
					$u++;
					if ($i < $rowLength) { $i++; } else { $i = 0; }
				}
			}
		}
		
		foreach ($row as $projetSlug => $projetArray):
			$projetArray['columns'] = $randomizedWidths[$projetSlug];
			$row[$projetSlug] = $projetArray;
		endforeach;
    ?>
    
        <div class="grid__row grid__row--image">
			<?php foreach($row as $mediaSlug => $mediaArray): ?>
				<article class="grid__item grid__item--image col-<?= $mediaArray['columns'] ?> js-item">
					<?php 
					if($mediaArray['type'] == "image"):
						snippet('image', ['mediaArray' => $mediaArray]);
					else:
						snippet('video', ['mediaArray' => $mediaArray]);
					endif;
					?>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="grid__row grid__row--text">
			<?php foreach($row as $mediaSlug => $mediaArray): ?>
				<article class="grid__item grid__item--text js-item">
					<div class="grid__text">
						<?php if($mediaArray['status'] == 'listed') echo '<a href="' . $mediaArray["url"] . '">'; ?>
							<?= $mediaArray['caption'] ?>
						<?php if($mediaArray['status'] == 'listed') echo '</a>'; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

    <?php endforeach; ?>

</section>