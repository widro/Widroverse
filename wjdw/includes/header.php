<?php
$thisurl =  $_SERVER['HTTP_HOST'];

if(($thisurl=="www.widroverse.com")||($thisurl=="widroverse.com")){
	$link = mysqli_connect("mysql.widroverse.com", "widroverse", "X3wmxMxgfFWWkk}", "widroverse");
}
else{
	$link = mysqli_connect("mysql.widroverse.com", "widroverse", "X3wmxMxgfFWWkk}", "widroverse");
}

// get bands
$sqlband = "
SELECT DISTINCT band
FROM playlists
ORDER BY band
";

$resultband = mysqli_query($link, $sqlband);
$i=0;
$displayband .= "<option>-- select one -- </option>";

while($rowband = mysqli_fetch_array($resultband)){
	$band = $rowband['band'];
	$displayband .= "<option>$band</option>";

}
?>



<html>
<head>
	<title>94.6 KJDW</title>
</head>


<body>

<style>
body{
	background:#000000;
	color:#ffffff;

}

a{
	color:#cccccc;
	text-decoration:none;

}

a:hover{
	color:#ff0000;
	text-decoration:underline;
}

</style>


<center>





<br>

<img src=wjdw.gif>
<br><br>

Playlists:

<a href=index.php?year=2026>2026</a> |
<a href=index.php?year=2025>2025</a> |
<a href=index.php?year=2024>2024</a> |
<a href=index.php?year=2023>2023</a> |
<a href=index.php?year=2022>2022</a> |
<a href=index.php?year=2021>2021</a> |
<a href=index.php?year=2020>2020</a> |
<a href=index.php?year=2019>2019</a> |
<a href=index.php?year=2018>2018</a> |
<a href=index.php?year=2017>2017</a> |

<a href=index.php?year=2016>2016</a> |

<a href=index.php?year=2015>2015</a> |

<a href=index.php?year=2014>2014</a> |

<a href=index.php?year=2013>2013</a> |

<a href=index.php?year=2012>2012</a> |

<a href=index.php?year=2011>2011</a> |

<a href=index.php?year=2010>2010</a> |

<a href=index.php?year=2009>2009</a> |

<a href=index.php?year=2008>2008</a> |

<a href=index.php?year=2007>2007</a> |

<a href=index.php?year=2006>2006</a> |

<a href=index.php?year=2005>2005</a> |

<a href=index.php?year=2004>2004</a> |

<a href=index.php?year=2003>2003</a> |

<a href=index.php?year=2002>2002</a> |

<a href=index.php?year=2001>2001</a> |

<a href=index.php?year=2000&active=2>2000</a> |

<a href=index.php?year=1999&active=2>1999</a>



<a href=stats.php>Stats</a>

<br><br>
Best of:

<a href=bestof.php?year=2025>2025</a> |
<a href=bestof.php?year=2024>2024</a> |
<a href=bestof.php?year=2023>2023</a> |
<a href=bestof.php?year=2022>2022</a> |
<a href=bestof.php?year=2021>2021</a> |
<a href=bestof.php?year=2020>2020</a> |
<a href=bestof.php?year=2019>2019</a> |
<a href=bestof.php?year=2018>2018</a> |
<a href=bestof.php?year=2017>2017</a> |

<a href=bestof.php?year=2016>2016</a> |

<a href=bestof.php?year=2015>2015</a> |

<a href=bestof.php?year=2014>2014</a> |

<a href=bestof.php?year=2013>2013</a> |

<a href=bestof.php?year=2012>2012</a> |

<a href=bestof.php?year=2011>2011</a> |

<a href=bestof.php?year=2010>2010</a> |

<a href=bestof.php?year=2009>2009</a> |

<a href=bestof.php?year=2008>2008</a> |

<a href=bestof.php?year=2007>2007</a> |

<a href=bestof.php?year=2006>2006</a> |

<a href=bestof.php?year=2005>2005</a> |

<a href=bestof.php?year=2004>2004</a> |

<a href=bestof.php?year=2003>2003</a> |

<a href=bestof.php?year=2002>2002</a> |

<a href=bestof.php?year=2001>2001</a> |

<a href=bestof.php?year=2000>2000</a> |

<a href=bestof.php?year=1999>1999</a> |

<a href=bestof.php?year=1998>1998</a> |

<a href="bestof.php?year=Best of Shaka 1">Best of Shaka 1</a> |

<a href="bestof.php?year=Best of Shaka 2">Best of Shaka 2</a>

<br><br>




Search by Band:

<form action=band.php method=get>

<select name=b>

<?=$displayband?>

</select>

<input type=submit name=Search>

</form>

<br><br>