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
								$ret .= 'In ' . $projet->collection() . ' collection, ' . $projet->titleInCollection();
							} else {
								$ret .= 'In ' . $projet->collection() . ' collection, ' . $projet->title();
							}
						} else if ($t == 'spaces' && !empty($types)) {
							$ret .= 'Spaces for ' . $projet->client() . ' in ' . $projet->lieu();
						} else if ($t == 'laboratory' && !empty($types)) {
							$ret .= 'From our Laboratory, watch ' . $projet->title();
						}
						if($i < count($types))
							$ret .= " and ";
						else
							$ret .= ".";
					endforeach;
				} else {
					if (in_array('collections', $types) && $feed == 'collections' && !empty($types)) {
						if ($projet->titleInCollection() != '') {
							$ret = 'In ' . $projet->collection() . ' collection, ' . $projet->titleInCollection();
						} else {
							$ret = 'In ' . $projet->collection() . ' collection, ' . $projet->title();
						}
					} else if (in_array('spaces', $types) && $feed == 'spaces' && !empty($types)) {
						$ret = 'Spaces for ' . $projet->client() . ' in ' . $projet->lieu();
					} else if (in_array('laboratory', $types) && $feed == 'laboratory' && !empty($types)) {
						$ret = 'From our Laboratory, watch ' . $projet->title();
					}
					$ret .= ".";
				}

			} else {
				$ret = $projet->legendeManuelle();
			}

      return $ret;
		}
	]
]);