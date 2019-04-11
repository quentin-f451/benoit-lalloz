<?php 

Kirby::plugin('quentin-f451/methods', [
    'fieldMethods' => [
        'toCategory' => function($field) {
          $value = $field->value;
          $splittedValues = explode(", ", $value);
					$allValues = "";
					
					foreach ($splittedValues as $val) :
						$allValues .= '<span class="category-label" data-category="'. $val .'">' . $val . '</span>';
					endforeach;
					
					return $allValues;
				},
				
				'toCaption' => function ($field, $feed) {
					$value = $field->value;
					$projet = $field->model();
					$ret = "";

					if ($value == true) {
						$types = explode(", ", $projet->categorie());

						if ($feed == 'home') {
							$i = 0;
							foreach ($types as $t):
								$i++;
								if ($t == 'collections' && !empty($types)) {
									if ($projet->titleInCollection() != '') {
										$ret .= captionCollection($projet, true);
									} else {
										$ret .= captionCollection($projet, false);
									}
								} else if ($t == 'spaces' && !empty($types)) {
									$ret .= captionSpaces($projet);
								} else if ($t == 'laboratory' && !empty($types)) {
									$ret .= captionLab($projet);
								}
								if($i < count($types))
									$ret .= " and ";
								else
									$ret .= ".";
							endforeach;
						} else {
							if (in_array('collections', $types) && $feed == 'collections' && !empty($types)) {
								if ($projet->titleInCollection() != '') {
									$ret = captionCollection($projet, true);
								} else {
									$ret = captionCollection($projet, false);
								}
							} else if (in_array('spaces', $types) && $feed == 'spaces' && !empty($types)) {
								$ret = captionSpaces($projet);
							} else if (in_array('laboratory', $types) && $feed == 'laboratory' && !empty($types)) {
								$ret = captionLab($projet);
							}
							$ret .= ".";
						}

					} else {
						$ret = $projet->legendeManuelle();
					}

					return $ret;
				}
			],

			'hooks' => [
				'file.create:after' => function ($file) {
					$file->changeName('benoit-lalloz-' . F::name($file->filename()));
				},
				'page.update:after' => function ($newPage, $oldPage) {
					addToFeed($newPage);
				},
				'page.changeStatus:after' => function ($newPage, $oldPage) {
					addToFeed($newPage);
				}
			]
]);