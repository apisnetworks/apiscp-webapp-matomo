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
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;

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

		protected function execute(InputInterface $input, OutputInterface $output)
		{
			Schema::getInstance()->createTables();
		}
	}
