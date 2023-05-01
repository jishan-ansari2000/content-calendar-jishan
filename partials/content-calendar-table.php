<div class="wrap">
	<h3 class="cc-title">Upcoming Scheduled Content</h3>

	<?php
		global $wpdb;
		$table_name = $wpdb->prefix . 'contentCalender';

		$data = $wpdb->get_results("SELECT * FROM $table_name WHERE date >= DATE(NOW()) ORDER BY date");
	?>

	<table class="wp-list-table widefat fixed striped table-view-list">
		<thead>
            <tr>
                <th>ID</th>
        	    <th>Date</th>
                <th>Occasion</th>
                <th>Post Title</th>
                <th>Author</th>
                <th>Reviewer</th>
			</tr>
        </thead>
			
		<?php 
		
		foreach ($data as $row) { 

			echo '<tr>';
				echo '<td>' . $row->id . '</td>';
				echo '<td>' . $row->date . '</td>';
				echo '<td>' . $row->occasion . '</td>';
				echo '<td>' . $row->post_title . '</td>';
				echo '<td>' . get_userdata($row->author)->user_login . '</td>';
				echo '<td>' . get_userdata($row->reviewer)->user_login . '</td>';
			echo '</tr>';
		} 
		
		?>

	</table>

	<h3 class="cc-title">Deadline Closed Content</h3>

	<?php
		global $wpdb;
		$table_name = $wpdb->prefix . 'contentCalender';

		$data = $wpdb->get_results("SELECT * FROM $table_name WHERE date < DATE(NOW()) ORDER BY date DESC");
	?>

	<table class="wp-list-table widefat fixed striped table-view-list">
		<thead>
			<tr>
				<th>ID</th>
				<th>Date</th>
				<th>Occasion</th>
				<th>Post Title</th>
				<th>Author</th>
				<th>Reviewer</th>
			</tr>
		</thead>
				
		<?php 	
		foreach ($data as $row) { 
	
			echo '<tr>';
				echo '<td>' . $row->id . '</td>';
				echo '<td>' . $row->date . '</td>';
				echo '<td>' . $row->occasion . '</td>';
				echo '<td>' . $row->post_title . '</td>';
				echo '<td>' . get_userdata($row->author)->user_login . '</td>';
				echo '<td>' . get_userdata($row->reviewer)->user_login . '</td>';
			echo '</tr>';
		} 
			
		?>
	
	</table>
</div>';