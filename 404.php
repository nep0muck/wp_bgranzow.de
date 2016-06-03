<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-404" class="cards-vertical-2 clearfix row">
				<div class="col-md-12">
					<h1><?php _e( 'Page not found', 'html5blank' ); ?></h1>

					<p>Gründe dafür könnten sein, dass Sie eine falsche oder veraltete URL aufgerufen haben - bitte überprüfen Sie diese noch einmal. Oder aber, wir haben die betreffende Seite archiviert, verschoben oder umbenannt.</p>

					<p>Vielleicht können Sie den von Ihnen gewünschten Inhalt über unsere Startseite finden.</p>

					<p><a href="<?php echo home_url(); ?>" class="btn btn-success btn-lg"><?php _e( 'Return home?', 'html5blank' ); ?></a></p>

					<p>Oder darf ich Ihnen direkt behilflich sein? Schreiben Sie mir eine E-Mail.</p>

					<p><a href="" class="btn btn-default btn-sm">Kontakt zu Benjamin Granzow aufnehmen</a></p>
				</div>
			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php /* get_sidebar(); */ ?>

<?php get_footer(); ?>
