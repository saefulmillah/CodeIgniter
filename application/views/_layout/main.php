<?php require('header.php'); ?>

<main role="main">
<!-- <div class="album py-5 bg0light">
  <div class="container-lg">
    <?php // $this->load->view($content); ?>
  </div>
</div> -->
  <div class="album py-5 bg0light">
    <div class="container mw-100">
      <?php $this->load->view($content); ?>
    </div>
  </div>
</main>

<?php require('footer.php'); ?>