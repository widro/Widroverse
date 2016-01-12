				  <select id="tickform_tag_id" class="form-control">
				  		<option value=''>--- Tag ---</option>

						<?php
						include('classes/Tag.php');
						$tag = new Tag;
						$alltags = $tag->list_tags('');

						foreach($alltags as $thistag){
							$tag_id = $thistag['tag_id'];
							$tag_slug = $thistag['tag_slug'];
							echo'
								    <option value="'.$tag_id.'">'.$tag_slug.'</option>
								';
						}
						?>
				  </select>
