<nav id="navbar">
  <div class="container">
    <ul>
      <li><a href="<?php echo URLROOT; ?>">Start</a></li>
      <li><a href="<?php echo URLROOT.'/pages/recipes'; ?>">Przepisy</a></li>
      <?php if(isset($data['cat_navbar'])): ?>
        <li><a href="<?php echo URLROOT.'/pages/other'; ?>" class="last">Pozostałe</a></li>
        <li><a href="<?php echo URLROOT.'/pages/desserts'; ?>">Desery</a></li>
        <li><a href="<?php echo URLROOT.'/pages/main_courses'; ?>">Dania główne</a></li>
        <li><a href="<?php echo URLROOT.'/pages/soups'; ?>">Zupy</a></li>
        <li><a href="<?php echo URLROOT.'/pages/apetisers'; ?>">Przystawki</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

