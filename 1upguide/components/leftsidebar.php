	<div class="col-lg-2" style="background:#cccccc;">
View style: <br>
<a href="index.php?setviewstyle=grid">Grid</a> | 
<a href="index.php?setviewstyle=basiclist">Basic List</a> | 
 <br> <br>

<?php
if($brandid == 1){
?>


<h3>Owned Physical</h3>
<ul>
<li><a href="index.php?brandid=<?php echo $brandid; ?>&status=OwnedPhysical">All</a></li>
<li><a href="index.php?brandid=<?php echo $brandid; ?>&status=OwnedPhysical&system=Playstation_Vita">Playstation_Vita</a></li>
<li><a href="index.php?brandid=<?php echo $brandid; ?>&status=OwnedPhysical&system=Playstation_3">Playstation_3</a></li>
<li><a href="index.php?brandid=<?php echo $brandid; ?>&status=OwnedPhysical&system=Playstation_4">Playstation_4</a></li>
<li><a href="index.php?brandid=<?php echo $brandid; ?>&status=OwnedPhysical&system=Nintendo_Wii_U">Nintendo_Wii_U</a></li>
<li><a href="index.php?brandid=<?php echo $brandid; ?>&status=OwnedPhysical&system=Nintendo_Wii">Nintendo_Wii</a></li>
<li><a href="index.php?brandid=<?php echo $brandid; ?>&status=OwnedPhysical&system=Nintendo_3DS">Nintendo_3DS</a></li>
<li><a href="index.php?brandid=<?php echo $brandid; ?>&status=OwnedPhysical&system=Nintendo_DS">Nintendo_DS</a></li>
<li><a href="index.php?brandid=<?php echo $brandid; ?>&status=OwnedPhysical&system=Xbox">Xbox</a></li>
</ul>



<h3>Key Franchises</h3>
<ul>
<li>
	<a href="index.php?brandid=<?php echo $brandid; ?>&franchise=Yoshi">Yoshi</a> |
	<a href="index.php?brandid=<?php echo $brandid; ?>&franchise=Yoshi&elite=yes">Elite</a>
</li>
<li>
	<a href="index.php?brandid=<?php echo $brandid; ?>&franchise=Kirby">Kirby</a> |
	<a href="index.php?brandid=<?php echo $brandid; ?>&franchise=Kirby&elite=yes">Elite</a>
</li>
<li>
	<a href="index.php?brandid=<?php echo $brandid; ?>&franchise=Mario_Kart">Mario_Kart</a> |
	<a href="index.php?brandid=<?php echo $brandid; ?>&franchise=Mario_Kart&elite=yes">Elite</a>
</li>
<li>
	<a href="index.php?brandid=<?php echo $brandid; ?>&franchise=Zelda">Zelda</a> |
	<a href="index.php?brandid=<?php echo $brandid; ?>&franchise=Zelda&elite=yes">Elite</a>
</li>

</ul>



<h3>Elite</h3>
<ul>
<li><a href="index.php?brandid=<?php echo $brandid; ?>&elite=yes">All</a></li>
<li><a href="index.php?brandid=<?php echo $brandid; ?>&eliterank=100">Ranked</a></li>


</ul>


<h3>Top Devs</h3>
<ul>
<li><a href="index.php?brandid=<?php echo $brandid; ?>&developer=Housemarque">Housemarque</a></li>
<li><a href="index.php?brandid=<?php echo $brandid; ?>&developer=Vanillaware">Vanillaware</a></li>
</ul>



<?php
}
elseif($brandid == 2){
?>



<?php
}
elseif($brandid == 3){
?>


<?php
}
elseif($brandid == 2){
?>



<?php
}
elseif($brandid == 3){
?>


<?php
}
elseif($brandid == 2){
?>



<?php
}
elseif($brandid == 3){
?>


<?php
}
elseif($brandid == 2){
?>



<?php
}
elseif($brandid == 3){
?>



<?php
}
else{
?>
<h3>Default</h3>
<ul>
<li><a href="index.php?status=OwnedPhysical">All</a></li>
</ul>
<?php
}
?>



</div>