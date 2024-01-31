<div id="trackSite" class="collapse" style="background-color: #efefef; padding: 1rem; border-radius: 0.5rem">
	<div id="siteList">
		<h6>
			<i class="ui-ajax ui-ajax-indicator ui-ajax-loading"></i> Loading sites
		</h6>
	</div>
</div>

<script type="text/javascript">
	$('#trackSite').on('change', ':input[data-asset]', function (event) {
		event.preventDefault();
		let checked = $(this).prop('checked');
		$(this).prop('checked', checked);
	}).one('show.bs.collapse', function () {
		apnscp.render({
			'webapps': 1,
			hostname: __WA_META.hostname,
			path: __WA_META.path
		}, '').done(function (html) {
			$('#siteList').replaceWith(html).on('click', 'button[name=update]', function (e) {
				e.stopPropagation();
			});
		})
	});
</script>