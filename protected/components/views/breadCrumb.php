<ul class="breadcrumb">   
    <?php 
    foreach($this->crumbs as $crumb) {
        if(isset($crumb['url'])) { ?>
            <li> <?php echo CHtml::link($crumb['name'], $crumb['url']); ?> </li>
        <?php } else { ?>
            <li> <?php echo $crumb['name']; ?> </li>
       <?php }
    }
    ?>
</ul>