<?php $title = 'Blog de Jean Forteroche : Accueil'; ?>

<?php ob_start(); ?>

<header class="masthead" style="background-image: url('img/home-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Billet Simple pour l'Alaska</h1>
                    <span class="subheading">Le récit de mes aventures en Alaska<span>
                </div>
                </div>
            </div>
            </div>
</header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          
          <?php
            foreach ($articles as $value) {
          ?>

          <a href="index.php?action=getArticle&amp;article_id=<?php echo $value->art_id(); ?>">
            <h2 class="post-title">
              <?php echo $value->art_title(); ?>
            </h2>
            <p class="post-content">
              <?php echo $value->art_content(); ?>
            </p>
          </a>
            <p class="post-meta">
              Publié le : <?php echo $value->date_fr(); ?>  
            </p>
          
          <?php
            }
          ?>
        </div>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="index.php?action=listArticles">Anciens chapitres &rarr;</a>
        </div>
      </div>
    </div>
  </div>

<?php $content = ob_get_clean(); ?>
<?php require('views/layout.php'); ?>

<!--<?php 
  if (file_exists('../layout.php')) {
    require('../layout.php');
  }
?>-->
