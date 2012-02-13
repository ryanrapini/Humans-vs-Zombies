<?php include 'includes/header.include' ?>
<div id="page">
	<div id="page-bgtop">
		<div id="page-bgbtm">
			<div id="content">
				<div class="post">
					<h2 class="title"><a href="#">About Humans Vs Zombies </a></h2>
					<div class="entry">
						<p>
					</div>
				</div>
				<div class="post">
					<h2 class="title"><a href="#">Registration</a></h2>
					<div class="entry">
						<canvas id="pie1" width="450" height="300">[No canvas support]</canvas>

					</div>
                    <div><a href="register.php" class="links">Click Here</a></div>
				</div>
			</div>
			<!-- end #content -->
			<?php include 'includes/sidebar.include' ?>
			<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #page -->
	</div>
</div>
<script>
							window.onload = function ()
							{
								var data = [564,155,499,611,322];
							
								var pie = new RGraph.Pie('myPie', data);
								pie.Set('chart.labels', ['Abc', 'Def', 'Ghi', 'Jkl', 'Mno']);
								pie.Set('chart.linewidth', 5);
								pie.Set('chart.stroke', '#fff');
								pie.Draw();
							}
						</script>
<script src="/includes/rgraph/jsRGraph.common.core.js" ></script>
<script src="/includes/rgraph/pie.js" ></script>
<?php include 'includes/footer.include' ?>