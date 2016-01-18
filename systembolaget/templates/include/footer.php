      <div id="footer">
        Systembolaget &copy; 2015. <a href="admin.php">Admin</a>
      </div>

    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {
		$('#keyword').on('input', function() {
			var searchKeyword = $(this).val();
			if (searchKeyword.length >= 2) {
				$.post('search.php', { keywords: searchKeyword }, function(data) {
					$('table#content').empty()
					$.each(data, function() {
	$('table#content').append('<tr><td><img src="images/sortiments/thumb/'+ this.id +'.jpg"></td><td><a href=".?action=viewsortiment&amp;SortimentId=' + this.id + '">' + this.Namn + '</a> <sub>('+ this.Varnummer + ')</sub><br> <br>Tillverkad i ' + this.Ursprunglandnamn + '</td><td>'+ this.Prisinklmoms +' Kr <br><br>'+ this.Forpackning +', '+ this.Volymiml +'ml</td></tr>');
					});
				}, "json");
			}
		});
	});
	</script>
  </body>
</html>

