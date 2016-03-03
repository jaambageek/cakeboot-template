<?php
/**
 * Initialize the SiteManager Tables
 */

use Phinx\Migration\AbstractMigration;

class Sitemgr extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('artifacts');
        $table
            ->addColumn('name', 'string', 'unique', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('content', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('artifacts');
    }
}
