				  <select id="tickform_category" class="form-control">
				  		<option value=''>--- Category ---</option>

						<?php
						include('classes/Category.php');
						$category = new Category;
						$allcategories = $category->list_categories('');

						foreach($allcategories as $thiscategory){
							$category_id = $thiscategory['category_id'];
							$category_slug = $thiscategory['category_slug'];
							echo'
								    <option value="'.$category_id.'">'.$category_slug.'</option>
								';
						}
						?>
				  </select>
