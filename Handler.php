<?php
	/**
 * Copyright (C) Apis Networks, Inc - All Rights Reserved.
 *
 * Unauthorized copying of this file, via any medium, is
 * strictly prohibited without consent. Any dissemination of
 * material herein is prohibited.
 *
 * For licensing inquiries email <licensing@apisnetworks.com>
 *
 * Written by Matt Saladna <matt@apisnetworks.com>, August 2020
 */

	namespace Module\Support\Webapps\App\Type\Matomo;

	use Module\Support\Webapps\App\Type\Unknown\Handler as Unknown;

	class Handler extends Unknown
	{
		const NAME = 'Matomo';
		const ADMIN_PATH = "";
		const LINK = 'https://matomo.org';

		const DEFAULT_FORTIFICATION = 'max';
		const FEAT_ALLOW_SSL = true;
		const FEAT_RECOVERY = true;

		public function display(): bool
		{
			return version_compare($this->php_version(), '7', '>=');
		}

		public function handle(array $params): bool
        {
			if (isset($params['webapps'])) {
				\Lararia\Bootstrapper::minstrap();
				echo view('@webapp(matomo)::partials.webapps-list', ['app' => $this]);
				exit;
			}

			return parent::handle($params);
		}
	}