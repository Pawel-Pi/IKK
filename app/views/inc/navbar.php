<nav id="navbar">
  <div class="container">
    <ul>
      <li><a href="<?php echo URLROOT; ?>">Start</a></li>
      <li><a href="<?php echo URLROOT.'/recipes'; ?>">Przepisy</a></li>
      <?php if(isset($data['cat_navbar'])): ?>
        <li><a href="<?php echo URLROOT.'/recipes/other'; ?>" class="last">Pozostałe</a></li>
        <li><a href="<?php echo URLROOT.'/recipes/desserts'; ?>">Desery</a></li>
        <li><a href="<?php echo URLROOT.'/recipes/main_courses'; ?>">Dania główne</a></li>
        <li><a href="<?php echo URLROOT.'/recipes/soups'; ?>">Zupy</a></li>
        <li><a href="<?php echo URLROOT.'/recipes/apetisers'; ?>">Przystawki</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

