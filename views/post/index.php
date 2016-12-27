<?php if(!empty($posts)):

	foreach($posts as $post): ?>

	<div class="panel panel-default">
	  <div class="panel-heading">
		  <h3 class="panel-title"><a href="<?= yii\helpers\Url::to(['post/view','id'=>$post->id]) ?>"> <?=$post->title ?></a></h3>
	  </div>
	  <div class="panel-body">
		<?=$post->excerpt ?>
	  </div>
	</div>

<?php endforeach; endif; ?>
<?= \yii\widgets\LinkPager::widget(['pagination'=>$pages])?>