<h5>Track a site</h5>
<p>
	Select a site below to add it to Matomo.
</p>
<table class="table table-responsive">
	<thead>
	<th>
		Type
	</th>
	<th>
		Domain
	</th>
	<th>
		Path
	</th>
	<th>
		Action
	</th>
	</thead>
	@php
		$appRoot = $app->getAppRoot();
		$webapps = \cmd('webapp_list');
		$tracked = \cmd('matomo_list_tracked_sites');
	@endphp
	<tbody>
	@foreach ($webapps as $key => $webapp)
		@if($key !== $appRoot && !isset($tracked[$appRoot][$key]))
			<tr class="asset-row">
				<td class="text-center type">
					{{ $webapp['type'] }}
				</td>
				<td class="text-center hostname">
					{{ $webapp['hostname'] }}
				</td>
				<td class="text-center path">
					{{ $key }}
				</td>
				<td>
					<button title="{{ 'Track' }}"
							name="track" value="{{ $key }}"
							class="btn btn-sm btn-secondary track-button">
						<i class="fa fa-plus"></i>
					</button>
				</td>
			</tr>
		@endif
	@endforeach
	</tbody>
</table>

<h5>Tracked sites</h5>
<p>
	These are the sites currently tracked by Matomo.
</p>
<table class="table table-responsive">
	<thead>
	<th>
		Type
	</th>
	<th>
		Domain
	</th>
	<th>
		Path
	</th>
	<th>
		Matomo ID
	</th>
	<th>
		Action
	</th>
	</thead>
	<tbody>
	@foreach ($tracked[$appRoot] ?? [] as $key => $site)
		<tr class="asset-row">
			<td class="text-center tracked-type">
				{{ $webapps[$key]['type'] ?? '-' }}
			</td>
			<td class="text-center tracked-hostname">
				{{ $webapps[$key]['hostname'] ?? '-' }}
			</td>
			<td class="text-center tracked-path">
				{{ $key ?? '-' }}
			</td>
			<td class="text-center tracked-id">
				{{ $site }}
			</td>
			<td>
				<button title="{{ "Un-track" }}" data-current="{{ $key }}"
						name="untrack" value="{{ $key }}"
						class="btn btn-sm btn-secondary untrack-button">
					<i class="fa fa-times"></i>
				</button>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>

<script type="text/javascript">
	$('.track-button').on('click', function () {
		let matomoAppRoot = '{{ $appRoot }}';
		let siteAppRoot = $(this).closest('tr').find('.path').text().trim();
		let hostname = $(this).closest('tr').find('.hostname').text().trim();
		trackSite(matomoAppRoot, siteAppRoot, hostname);
	});

	$('.untrack-button').on('click', function () {
		let matomoAppRoot = '{{ $appRoot }}';
		let siteAppRoot = $(this).closest('tr').find('.tracked-path').text().trim();
		untrackSite(matomoAppRoot, siteAppRoot);
	});

	function trackSite(appRoot, siteAppRoot, hostname) {
		apnscp.cmd('matomo_track_site', {
			matomoApproot: appRoot,
			siteAppRoot: siteAppRoot,
			siteUrls: ["https://" + hostname]
		});
	}

	function untrackSite(appRoot, siteAppRoot) {
		apnscp.cmd('matomo_untrack_site', {
			matomoApproot: appRoot,
			siteAppRoot: siteAppRoot,
		});
	}
</script>