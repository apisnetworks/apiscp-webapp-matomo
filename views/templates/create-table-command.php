<?php
	/**
	 * Matomo - free/libre analytics platform
	 *
	 * @link    https://matomo.org
	 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
	 */

	namespace Piwik\Plugins\CoreAdminHome\Commands;

	use Piwik\Db\Schema;
	use Piwik\Plugin\ConsoleCommand;

	/**
	 * Administration command that optimizes archive tables (even if they use InnoDB).
	 */
	class CreateTables extends ConsoleCommand
	{

		protected function configure()
		{
			$this->setName('database:create-tables');
			$this->setDescription("Create Matomo tables at install");
		}

		protected function doExecute(): int
		{
			Schema::getInstance()->createTables();

			return self::SUCCESS;
		}
	}
