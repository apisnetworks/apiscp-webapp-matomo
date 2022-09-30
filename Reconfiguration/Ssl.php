<?php declare(strict_types=1);
	/**
	 * Copyright (C) Apis Networks, Inc - All Rights Reserved.
	 *
	 * Unauthorized copying of this file, via any medium, is
	 * strictly prohibited without consent. Any dissemination of
	 * material herein is prohibited.
	 *
	 * For licensing inquiries email <licensing@apisnetworks.com>
	 *
	 * Written by Matt Saladna <matt@apisnetworks.com>, August 2022
	 */


	namespace Module\Support\Webapps\App\Type\Matomo\Reconfiguration;

	use Module\Support\Webapps\App\Type\Unknown\Reconfiguration\Ssl as SslParent;

	/**
	 * Change domain/path for WordPress
	 *
	 * @package Module\Support\Webapps\App\Type\Nextcloud\Reconfiguration
	 */
	class Ssl extends SslParent
	{
		public function handle(&$val): bool
		{
			if (!parent::handle($val)) {
				return false;
			}
			$this->callback(function () use ($val) {
				return $this->matomo_set_configuration($this->app->getHostname(), $this->app->getPath(), [
					'General' =>
						['force_ssl' => (bool)$val]
				]);
			});

			return true;
		}
	}