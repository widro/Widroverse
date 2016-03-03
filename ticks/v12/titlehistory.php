<?php
/*
Template Name: Title History
*/

 ?>
<?php
$titlecode = $_GET['titlecode'];


if($titlecode){


/* first query  */

$sql= "
SELECT DATE_FORMAT(date, '%m.%d.%y') as date2, winner, loser, title
FROM titles, titlecode
WHERE titlecode.titlecode = titles.titlecode
AND titles.titlecode = $titlecode
ORDER BY date DESC
";

$result = mysql_query($sql) or die("Error displaying titles article.");


while ($row = mysql_fetch_array($result)){
$title= $row['title'];
$winner= $row['winner'];
$winner = stripslashes ($winner);
$loser= $row['loser'];
$loser = stripslashes ($loser);
$date= $row['date2'];
$display_block .= "<tr><td class=article align=center>$date</td><td class=article align=center>$winner</td><td class=article align=center>$loser</td></tr>
";
}


$yup = "
<span class=headline>$title</span><br>

<table border=1 cellspacing=1 bordercolor=white cellpadding=5 width=400>
<tr><td class=article align=center><b>Date</b></td><td class=article align=center><b>Champion</b></td><td class=article align=center><b>Defeated</b></td></tr>
$display_block
</table><br><br>
";


}


else{


}









$displayText .= $yup;

$displayText .= "
<b>WWE Smackdown Titles:</b><br>
<a class=wrestling href=/title-history/?titlecode=7>World Heavyweight Title</a> |
<a class=wrestling href=/title-history/?titlecode=2>WWE Intercontinental Title </a> |
<a class=wrestling href=/title-history/?titlecode=17>WWE Tag Team Titles</a> |
<a class=wrestling href=/title-history/?titlecode=16>WWE Woman's Title </a><br><br>

<b>WWE Raw Titles:</b><br>
<a class=wrestling href=/title-history/?titlecode=1>WWE Heavyweight Title</a> |
<a class=wrestling href=/title-history/?titlecode=8>WWE United States Title </a> |
<a class=wrestling href=/title-history/?titlecode=4>World Tag Team Titles </a> |
<a class=wrestling href=/title-history/?titlecode=26>WWE Divas Title</a><br><br>

<b>ECW Titles:</b><br>
<a class=wrestling href=/title-history/?titlecode=13>ECW World Title</a><br><br>

<br>

<b>TNA Titles:</b><br>
<a class=wrestling href=/title-history/?titlecode=18>TNA World Title </a> |
<a class=wrestling href=/title-history/?titlecode=19>TNA World X Division Title </a> |
<a class=wrestling href=/title-history/?titlecode=20>TNA Tag Team Titles </a> |
<a class=wrestling href=/title-history/?titlecode=21>TNA Knockout Title </a>
<a class=wrestling href=/title-history/?titlecode=27>TNA Global Title </a>
<a class=wrestling href=/title-history/?titlecode=28>TNA Knockout Tag Team Titles </a>
<br><br>
<br>

<b>ROH Titles:</b><br>
<a class=wrestling href=/title-history/?titlecode=22>ROH World Title </a> |
<a class=wrestling href=/title-history/?titlecode=23>ROH Tag Team Titles </a> |
<a class=wrestling href=/title-history/?titlecode=29>ROH TV Title</a> |
<br><br>

<b>NWA Titles:</b><br>
<a class=wrestling href=/title-history/?titlecode=24>NWA World Title </a> |
<br><br>



<b>Inactive Titles:</b><br>
<a class=wrestling href=/title-history/?titlecode=12>WWE Cruiserweight Title</a><br><br>
<a class=wrestling href=/title-history/?titlecode=6>WWE Hardcore Title </a> |
<a class=wrestling href=/title-history/?titlecode=3>WWE European Title </a> |
<a class=wrestling href=/title-history/?titlecode=5>WWE Light Heavyweight Title </a><br><br>
<a class=wrestling href=/title-history/?titlecode=9>WCW Television Title</a> |
<a class=wrestling href=/title-history/?titlecode=10>WCW Tag Team Titles </a> |
<a class=wrestling href=/title-history/?titlecode=11>WCW Hardcore Title </a> |
<a class=wrestling href=/title-history/?titlecode=14>ECW Television Title</a> |
<a class=wrestling href=/title-history/?titlecode=15>ECW Tag Team Titles </a> |
<a class=wrestling href=/title-history/?titlecode=25>ROH Pure Wrestling Title </a> |
";


?>

<?php get_header(); ?>

	<div class=container_left>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php
$clickthru=get_permalink($post->ID);

$topstory120x120 = get_post_meta($post->ID, 'topstory120x120', true);
if($topstory120x120==""){
	$topstory120x120 = $default120avatarurl;
}
$topstory500x250 = get_post_meta($post->ID, 'topstory500x250', true);


$insider_userid = $post->post_author;
$description = get_user_meta( $insider_userid, 'description', true);
$insider_avatar120 = get_user_meta( $insider_userid, 'avatar120', true);
?>

		<div class=single_container>

			<div class=single_header>

				<div class=single_header_left>
					<img src=<?php echo $topstory120x120 ?>>
				</div>


				<div class=single_header_right>

					<div class=single_header_right_headline>
						<?php the_title(); ?>
					</div>

					<div class=single_header_right_teaser>
						by <?php the_author_posts_link(); ?> - <?php the_time('F j, Y'); ?> | <a href="mailto:<?php the_author_email(); ?>">Email the author</a> <?php edit_post_link('Edit Post','| ',' '); ?>	<?php if($show_twitter){echo $show_twitter_text;	}?>


					</div>

				</div>


			</div>






			<?php echo $displayText ?>





		</div>





<?php endwhile; else: ?>
	<p>Lost? Go back to the <a href="<?php echo get_option('home'); ?>/">home page</a>.</p>
<?php endif; ?>






	</div>

	<div class=container_right>
		<?php include('sidebar.php'); ?>
	</div>




</div>

















<?php get_footer(); ?>











<?php get_footer(); ?>