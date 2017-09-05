	<div class="col-lg-2" style="background:#cccccc;">
View style: <br>
<a href="index.php?brands_id=<?php echo $brands_id; ?>&setviewstyle=grid">Grid</a> | 
<a href="index.php?brands_id=<?php echo $brands_id; ?>&setviewstyle=basiclist">Basic List</a> | 
 <br> <br>

<?php
if($brands_id == 1){
?>


<h3>Owned Physical</h3>
<ul>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&status=OwnedPhysical">All</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&status=OwnedPhysical&system=Playstation_Vita">Playstation_Vita</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&status=OwnedPhysical&system=Playstation_3">Playstation_3</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&status=OwnedPhysical&system=Playstation_4">Playstation_4</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&status=OwnedPhysical&system=Switch">Switch</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&status=OwnedPhysical&system=Nintendo_Wii_U">Nintendo_Wii_U</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&status=OwnedPhysical&system=Nintendo_Wii">Nintendo_Wii</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&status=OwnedPhysical&system=Nintendo_3DS">Nintendo_3DS</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&status=OwnedPhysical&system=Nintendo_DS">Nintendo_DS</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&status=OwnedPhysical&system=Xbox">Xbox</a></li>
</ul>

<h3>Current Backlog</h3>
<ul>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&currentbacklog=yes">All</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&currentbacklog=yes&system=Nintendo_Wii_U">Nintendo_Wii_U</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&currentbacklog=yes&system=Nintendo_3DS">Nintendo_3DS</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&currentbacklog=yes&system=Nintendo_DS">Nintendo_DS</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&currentbacklog=yes&system=Switch">Switch</a></li>
</ul>


<h3>Key Franchises</h3>
<ul>
<li>
	<a href="index.php?brands_id=<?php echo $brands_id; ?>&franchise=Yoshi">Yoshi</a> |
	<a href="index.php?brands_id=<?php echo $brands_id; ?>&franchise=Yoshi&elite=yes">Elite</a>
</li>
<li>
	<a href="index.php?brands_id=<?php echo $brands_id; ?>&franchise=Kirby">Kirby</a> |
	<a href="index.php?brands_id=<?php echo $brands_id; ?>&franchise=Kirby&elite=yes">Elite</a>
</li>
<li>
	<a href="index.php?brands_id=<?php echo $brands_id; ?>&franchise=Mario_Kart">Mario_Kart</a> |
	<a href="index.php?brands_id=<?php echo $brands_id; ?>&franchise=Mario_Kart&elite=yes">Elite</a>
</li>
<li>
	<a href="index.php?brands_id=<?php echo $brands_id; ?>&franchise=Zelda">Zelda</a> |
	<a href="index.php?brands_id=<?php echo $brands_id; ?>&franchise=Zelda&elite=yes">Elite</a>
</li>

</ul>



<h3>Elite</h3>
<ul>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&elite=yes">All</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&eliterank=100">Ranked</a></li>
</ul>

<h3>Beaten</h3>
<ul>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&beaten=showanyvalue">All Beaten</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&beaten=showanyvalue&system=Playstation_4">Playstation_4</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&beaten=showanyvalue&system=Playstation_3">Playstation_3</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&beaten=showanyvalue&system=Nintendo_Wii_U">Nintendo_Wii_U</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&beaten=showanyvalue&system=Nintendo_Wii">Nintendo_Wii</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&beaten=showanyvalue&system=Nintendo_3DS">Nintendo_3DS</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&beaten=showanyvalue&system=Nintendo_DS">Nintendo_DS</a></li>
</ul>

<h3>Backlog</h3>
<ul>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&backlog=showanyvalue">All Backlog</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&backlog=portablepluck">Portable Pluck</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&backlog=ongoing">Ongoing</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&backlog=showanyvalue&system=Playstation_4">Playstation_4</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&backlog=showanyvalue&system=Nintendo_3DS">Nintendo_3DS</a></li>
</ul>



<h3>Lists</h3>
<ul>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&neon=showanyvalue">Neon</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&neoncade=showanyvalue">NeonCade</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&status=CollectionWant&system=Nintendo_DS">Nintendo DS Want</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&status=CollectionWant&system=Nintendo_3DS">Nintendo 3DS Want</a></li>
</ul>


<h3>Top Devs</h3>
<ul>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&developer=Housemarque">Housemarque</a></li>
<li><a href="index.php?brands_id=<?php echo $brands_id; ?>&developer=Vanillaware">Vanillaware</a></li>
</ul>



<?php
}
elseif($brands_id == 2){
?>



<?php
}
elseif($brands_id == 3){
?>


<?php
}
elseif($brands_id == 2){
?>



<?php
}
elseif($brands_id == 3){
?>


<?php
}
elseif($brands_id == 2){
?>



<?php
}
elseif($brands_id == 3){
?>


<?php
}
elseif($brands_id == 2){
?>



<?php
}
elseif($brands_id == 3){
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