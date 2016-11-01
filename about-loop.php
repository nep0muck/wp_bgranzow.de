<?php

// check if the flexible content field has rows of data
if ( have_rows('flexible_content') ):

  // loop through the rows of data
  while ( have_rows('flexible_content') ) : the_row();

    if ( get_row_layout() == 'aboutme_heading' ):

      $profile_image = get_sub_field('profile_image');
?>
      <section class="cards-vertical-2 row clearfix">
        <div class="sitebrand-header blocks-about">
          <?php if( !empty($profile_image) ): ?>
            <img class="alignnone size-full wp-image-185 portrait" title="Benjamin Granzow" src="<?php echo $profile_image['url']; ?>" alt="<?php echo $profile_image['alt']; ?>" width="<?php echo $profile_image['width']; ?>" height="<?php echo $profile_image['height']; ?>">
          <?php endif; ?>
          <h2 class="sidebar-brand"><?php the_sub_field('profile_name'); ?></h2>
          <p class="sub-title"><?php the_sub_field('profile_subtitle'); ?></p>
            <?php if( have_rows('profile_links') ): ?>
              <div class="profile-header-links">
                <?php while ( have_rows('profile_links') ) : the_row(); ?>
                  <a class="<?php the_sub_field('profile_links_icon'); ?>" href="<?php the_sub_field('profile_links_link'); ?>">
                    <i class="fa fa-<?php the_sub_field('profile_links_icon'); ?> fa-2x" aria-hidden="true"></i>
                  </a>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>
        </div>
      </section>
<?php
    elseif( get_row_layout() == 'aboutme_description' ):
?>
      <section class="cards-vertical-2 row clearfix">
        <div class="col-md-12 blocks-about desc">
          <div class="col-md-2 blocks-about-icon">
            <div class="round">
              <i class="fa fa-<?php the_sub_field('icon'); ?>"></i>
            </div>
          </div>
          <div class="col-md-10">
            <?php the_sub_field('description'); ?>
          </div>
        </div>
      </section>
<?php
    elseif( get_row_layout() == 'aboutme_skills' ):
      if( have_rows('skills') ):
?>
        <section class="cards-vertical-2 row clearfix">
          <div class="col-md-12 blocks-about skills">

<?php
          while ( have_rows('skills') ) : the_row();
?>
            <div class="col-md-2 blocks-about-icon">
              <div class="round">
                <i class="fa fa-<?php the_sub_field('icon'); ?>"></i>
              </div>
            </div>
            <div class="col-md-10">
              <h2 class="blocks-about-heading"><?php the_sub_field('skillgroup'); ?></h2>
              <ul>
<?php
              if( have_rows('skilllist') ):
                while ( have_rows('skilllist') ) : the_row();

                  $field = get_sub_field_object('skillrating');
                  // $value gets number of skillrating
                  $value = get_sub_field('skillrating');
                  // $label gets name of skillrating
                  $label = $field['choices'][ $value ];

?>
                  <li>
                    <?php the_sub_field('skillname'); ?>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $value; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $value; ?>%;">
                        <span class="sr-only"><?php the_sub_field('skillname'); ?></span>
                        <span class="skill-level"><?php echo $label; ?></span>
                      </div>
                    </div>
                  </li>
<?php
                endwhile;
              endif;
?>
              </ul>
            </div>
<?php
          endwhile;
        endif;
?>
          </div>
        </section>
<?php

    elseif( get_row_layout() == 'aboutme_contact_form' ):
?>

      <section class="cards-vertical-2 row clearfix">
        <div class="col-md-12 blocks-about contact">
          <div class="col-md-2 blocks-about-icon">
            <div class="round">
              <i class="fa fa-<?php the_sub_field('icon'); ?>"></i>
            </div>
          </div>
          <div class="col-md-10">
            <form>
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="inputName" placeholder="<?php the_sub_field('name'); ?>">
              </div>
              <div class="form-group">
                <label for="inputEmail1">E-Mail Addresse</label>
                <input type="email" class="form-control" id="inputEmail1" placeholder="<?php the_sub_field('e-mail_adress'); ?>">
              </div>
              <div class="form-group">
                <label for="inputSubject">Betreff</label>
                <select type="text" class="form-control" id="inputSubject" placeholder="<?php the_sub_field('betreff'); ?>...">
  <?php
                  if( have_rows('betreff') ):
                    while ( have_rows('betreff') ) : the_row();
  ?>
                      <option><?php the_sub_field('option'); ?></option>
  <?php
                    endwhile;
                  endif;
?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputMessage"><?php the_sub_field('message'); ?></label>
                <textarea type="textarea" class="form-control" id="inputMessage" placeholder="<?php the_sub_field('message'); ?>" rows="10"></textarea>
              </div>
              <button type="submit" class="btn btn-default">Abschicken</button>
            </form>
          </div>
        </div>
      </section>
<?php
      endif;
    endwhile;

  else :

    // no layouts found

  endif;
?>