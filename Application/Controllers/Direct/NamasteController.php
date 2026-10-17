<?php

namespace Application\Controllers\Direct;

use Nishchay;
use PDO;
use Throwable;
use Nishchay\Http\Request\RequestStore;
use Nishchay\Attributes\Controller\Controller;
use Nishchay\Attributes\Controller\Routing;
use Nishchay\Attributes\Controller\Method\Route;

/**
 * Namaste Controller for welcome page.
 *
 */
#[Controller]
#[Routing(pattern: 'crud')]
class NamasteController
{

    /**
     * Welcome route to say namaste to an application.
     */
    #[Route(path: 'namaste', type: 'GET')]
    public function sayNamaste()
    {
        $database = $this->checkDatabase();
        RequestStore::set([
            'nishchayUrl' => 'https://nishchay.io',
            'appName' => Nishchay::getApplicationName(),
            'databaseOk' => $database === true,
            'databaseError' => $database === true ? '' : $database,
            'myEntities' => $this->getOwnEntities()
        ]);
        return 'view:namaste';
    }

    /**
     * Checks that application can connect to the default database.
     * Returns true on success otherwise reason as string.
     * 
     * @return bool|string
     */
    private function checkDatabase()
    {
        try {
            $config = Nishchay::getSetting('database.connections.' .
                            Nishchay::getSetting('database.default'));
            $dsn = 'mysql:host=' . $config->host . ';port=' . $config->port .
                    ';dbname=' . $config->dbname;
            new PDO($dsn, $config->username, $config->password,
                    [PDO::ATTR_TIMEOUT => 2, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return true;
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }

    /**
     * Returns names of entities created by developer, entities which came
     * with installation are not listed.
     * 
     * @return array
     */
    private function getOwnEntities(): array
    {
        $installed = ['User', 'RefreshToken'];
        $entities = [];
        foreach (glob(ROOT . 'Application' . DS . 'Entities' . DS . '*.php') as $file) {
            $name = basename($file, '.php');
            if (!in_array($name, $installed)) {
                $entities[] = $name;
            }
        }
        return $entities;
    }

    #[Route(path: true, incoming: false)]
    public function maintenanceRoute()
    {
        return 'error/maintenance';
    }

}
