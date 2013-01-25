<div class="projectindex2">

<?php
//Falta terminar
			
			$i = 0;
			foreach ($projects as $project) 
			{
				#$class = null;
				
				if($i++ % 2 == 0)
				{
					?><li><span><?php $project['Project']['name']; ?></span>
						<ul><?php
					#$class = 'class="altrow"';
					$j = 0;
					foreach ($activities as $activity){
						#$classAc = null;
						if ($j++ %2 == 0 and $project['Project']['id'] == $activity['Activity']['project_id']){
							#$classAc = 'classAc="altrow"';
							?><li><span><?php $activity['Activity']['description']; ?></span>
								<ul><?php
							$k = 0;
							foreach ($entries as $entry){
								#$classEn = null;
								if ($k++ %2 == 0 and $activity['Activity']['id'] == $entry['Entry']['activity_id']){
									#$classEn = 'classEn="altrow"';
									?><li><span><?php $entry['Entry']['date'];?></span></li>
									<?php						
								}								
							
							}?></ul><?php
						}
					}?></ul></li><?php
				}
			}?></ul></li>					
		


	
<h4>Sample 3 - fast animations, all branches collapsed at first, red theme, cookie-based persistance</h4>
	<ul id="red" class="treeview-red">
	<li><span>Item 1</span>
		<ul>
			<li><span>Item 1.0</span>
				<ul>
					<li><span>Item 1.0.0</span></li>
				</ul>
			</li>
			<li><span>Item 1.1</span></li>
			<li><span>Item 1.2</span>
				<ul>
					<li><span>Item 1.2.0</span>
					<ul>
						<li><span>Item 1.2.0.0</span></li>
						<li><span>Item 1.2.0.1</span></li>
						<li><span>Item 1.2.0.2</span></li>
					</ul>
				</li>
					<li><span>Item 1.2.1</span>
					<ul>
						<li><span>Item 1.2.1.0</span></li>
					</ul>
				</li>
					<li><span>Item 1.2.2</span>
					<ul>
						<li><span>Item 1.2.2.0</span></li>
						<li><span>Item 1.2.2.1</span></li>
						<li><span>Item 1.2.2.2</span></li>
					</ul>
				</li>
				</ul>
			</li>
		</ul>
	</li>
	<li><span>Item 2</span>
		<ul>
			<li><span>Item 2.0</span>
				<ul>
					<li><span>Item 2.0.0</span>
					<ul>
						<li><span>Item 2.0.0.0</span></li>
						<li><span>Item 2.0.0.1</span></li>
					</ul>
				</li>
				</ul>
			</li>
			<li><span>Item 2.1</span>
				<ul>
					<li><span>Item 2.1.0</span>
					<ul>
						<li><span>Item 2.1.0.0</span></li>
					</ul>
				</li>
					<li><span>Item 2.1.1</span>
					<ul>
						<li><span>Item 2.1.1.0</span></li>
						<li><span>Item 2.1.1.1</span></li>
						<li><span>Item 2.1.1.2</span></li>
					</ul>
				</li>
					<li><span>Item 2.1.2</span>
					<ul>
						<li><span>Item 2.1.2.0</span></li>
						<li><span>Item 2.1.2.1</span></li>
						<li><span>Item 2.1.2.2</span></li>
					</ul>
				</li>
				</ul>
			</li>
		</ul>
	</li>
	<li class="open"><span>Item 3</span>
		<ul>
			<li class="open"><span>Item 3.0</span>
				<ul>
					<li><span>Item 3.0.0</span></li>
					<li><span>Item 3.0.1</span>
					<ul>
						<li><span>Item 3.0.1.0</span></li>
						<li><span>Item 3.0.1.1</span></li>
					</ul>
					
				</li>
					<li><span>Item 3.0.2</span>
					<ul>
						<li><span>Item 3.0.2.0</span></li>
						<li><span>Item 3.0.2.1</span></li>
						<li><span>Item 3.0.2.2</span></li>
					</ul>
				</li>
				</ul>
			</li>
		</ul>
	</li>
	</ul>