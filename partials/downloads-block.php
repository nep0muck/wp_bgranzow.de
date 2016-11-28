<?php

/*------------------------------------*\
    Partial for ACF get_row_layout() == 'downloads_block'
\*------------------------------------*/

  $heading = get_sub_field('downloads_heading');
  $description = get_sub_field('downloads_description');
  $rows = get_sub_field('downloads');

  // count columns of repeaterfield 'table' for colspan
  $count = count($rows[0]);

  if($rows)
  {
    echo '<table class="table table-hover downloads-table">';
    echo '<thead>';
    echo '<th>' . $heading . '</th><th>' . $description . '</th>';
    echo '</thead>';
    echo '<tbody>';
    foreach($rows as $row)
    {
      echo '
        <tr>
          <td class="col-md-6"><a href="' . $row['downloads_link']['url'] . '" class="btn btn-primary">Download</a><a href="' . $row['downloads_link']['url'] . '">' . $row['downloads_link']['filename'] . '</a></td>
          <td class="col-md-6">' . $row['downloads_link_text'] . '</td>
        </tr>';
    }
    echo '</table>';
    echo '</tbody>';
  }

?>