 <aside id="sidebar-one" class="sidebar">
 <?php if ( is_active_sidebar( 'one' ) ) : ?>
 <?php dynamic_sidebar( 'one' ); ?>
 <?php else : ?>
 <?php endif; ?>
 </aside>
 
<aside id="sidebar-two" class="sidebar">
 <?php if ( is_active_sidebar( 'two' ) ) : ?>
 <?php dynamic_sidebar( 'two' ); ?>
 <?php else : ?>
 <?php endif; ?>
</aside>