
<?php 
        $this->widget('bootstrap.widgets.TbThumbnails', array(
            'id'=>'blog-recommend-items-view', // same as grid view
            'dataProvider'=>$dataProvider,
            'pager'=> array('class'=>'my.widgets.TbMixPager'),
            'template'=>"\n{pager}\n{items}\n{pager}",
            'itemView'=>'viewType_thumb',
        ));

?>